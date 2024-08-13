<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Session;

class PosController extends Controller
{
    //
    public function insert_pos(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'items' => 'required|array',
                'data_customer' => 'required|array',
                'grandTotal' => 'required',
                'invoiceNumber' => 'required',
                'tax' => 'required',
                'subTotal' => 'required',
                'items' => 'required',
                'id_koperasi' => 'required',
                'totalQty' => 'required',
                'discount' => 'required'

            ]);
            $orderId = 0;
            if (!$request->id_anggota) {
                $customerId = DB::table('tbl_customer')->insertGetId($request->data_customer);
                if (!$customerId) {
                    throw new \Exception('Gagal Menambah customer!');
                }
                $orderId = DB::table('tbl_order')->insertGetId([
                    'id_customer' => $customerId,
                    'sub_total' => $request->subTotal,
                    'id_koperasi' => $request->id_koperasi,
                    'tax' => $request->tax,
                    'discount' => $request->discount,
                    'total_amount' => $request->grandTotal,
                    'invoice_number' => $request->invoiceNumber,
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                ]);
                if (!$orderId) {
                    throw new \Exception('Gagal Menambah Order!');
                }
                $items = $request->items;
                foreach ($items as &$item) {
                    $item['id_order'] = $orderId;
                }
                $orderDetail = DB::table('tbl_order_detail')->insert($items);
                if (!$orderDetail) {
                    throw new \Exception('Gagal Checkout');
                }
            } else {
                $orderId = DB::table('tbl_order')->insertGetId([
                    'id_anggota' => $request->id_anggota,
                    'sub_total' => $request->subTotal,
                    'id_koperasi' => $request->id_koperasi,
                    'invoice_number' => $request->invoiceNumber,
                    'tax' => $request->tax,
                    'discount' => $request->discount,
                    'total_amount' => $request->grandTotal,
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                ]);
                if (!$orderId) {
                    throw new \Exception('Gagal Menambah Order!');
                }
                $items = $request->items;
                foreach ($items as &$item) {
                    $item['id_order'] = $orderId;
                }
                $orderDetail = DB::table('tbl_order_detail')->insert($items);
                if (!$orderDetail) {
                    throw new \Exception('Gagal Checkout');
                }
            }

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Checkout', 'order_id' => $orderId], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['repsonse_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }
    public function insert_payment(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'amount_value' => 'required',
                'change_value' => 'required',
                'id_koperasi' => 'required',
                'id_order' => 'required',
                'id_payment_method' => 'required',
                'paid_value' => 'required',
                'status' => 'required',
            ]);

            $paymentId = DB::table('tbl_payments')->insertGetId([
                'amount_value' => $request->amount_value,
                'change_value' => $request->change_value,
                'id_koperasi' => $request->id_koperasi,
                'id_order' => $request->id_order,
                'id_payment_method' => $request->id_payment_method,
                'paid_value' => $request->paid_value,
                'status' => $request->status,
                'created_by' => 'admin',
                'updated_by' => 'admin'
            ]);
            if (!$paymentId) {
                throw new \Exception('Gagal Bayar!');
            }
            // Fetch order details
            $orderDetails = DB::table('tbl_order_detail')->where('id_order', $request->id_order)->get();
            foreach ($orderDetails as $detail) {
                // Update product stock
                $product = DB::table('tbl_produk')->where('id', $detail->id_product)->first();
                if ($product) {
                    $newStock = $product->stok - $detail->quantity;
                    if ($newStock < 0) {
                        throw new \Exception('Stok produk ' . $product->nama_produk . ' tidak mencukupi!');
                    }
                    DB::table('tbl_produk')->where('id', $detail->id_product)->update(['stok' => $newStock]);
                } else {
                    throw new \Exception('Produk dengan ID ' . $detail->id_product . ' tidak ditemukan!');
                }
            }

            $orderUpdate = DB::table('tbl_order')->where('id', $request->id_order)->update(['status' => 'completed']);
            if (!$orderUpdate) {
                throw new \Exception('Gagal Checkout');
            }
            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Bayar'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['repsonse_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }

    public function destroy($order_id)
    {
        DB::beginTransaction();

        try {

            $cancel_order_detail = DB::table('tbl_order_detail')->where('id_order', $order_id)->delete();

            if (!$cancel_order_detail) {
                throw new \Exception('Galat!');
            }
            $cancel_order = DB::table('tbl_order')->where('id', $order_id)->update(['status' => 'failed']);
            if (!$cancel_order) {
                throw new \Exception('Galat!');
            }
            DB::commit();
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Pembatalan Berhasil!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => '01',
                'response_message' => $th->getMessage(),
            ]);
        }
    }

    public function pos()
    {

        $tingkatan = Session::get('tingkatan');
        if ($tingkatan == 'anggota') {
            $id = Session::get('id');
            $id_koperasi = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $no_anggota = Session::get('no_anggota');
            $edit_state = false;
            $orderCount = DB::table('tbl_order')->where('id_koperasi', $id)->count();
            $categories = DB::table('tbl_kategori_produk')->where('id_koperasi', $id_koperasi)->get();
            $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id_koperasi)->first();
            $products = DB::table('tbl_produk')->join('tbl_kategori_produk', 'tbl_produk.id_kategori', '=', 'tbl_kategori_produk.id')->where('tbl_produk.id_koperasi', $id_koperasi)->select('*', 'tbl_produk.id as id_produk', 'tbl_kategori_produk.id as id_kategori')->get();
            return view('dashboard.sales.pos', compact('id', 'username', 'password', 'tingkatan', 'orderCount', 'products', 'categories', 'edit_state', 'koperasi'));
        } else {

            $id = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $categories = DB::table('tbl_kategori_produk')->where('id_koperasi', $id)->get();
            $edit_state = false;
            $orderCount = DB::table('tbl_order')->where('id_koperasi', $id)->count();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
            $products = DB::table('tbl_produk')->join('tbl_kategori_produk', 'tbl_produk.id_kategori', '=', 'tbl_kategori_produk.id')->where('tbl_produk.id_koperasi', $id)->select('*', 'tbl_produk.id as id_produk', 'tbl_kategori_produk.id as id_kategori')->get();
            return view('dashboard.sales.pos', compact('id', 'username', 'password', 'tingkatan', 'orderCount', 'products', 'categories', 'edit_state', 'koperasi'));
        }
    }
    public function history_pos()
    {
        $tingkatan = Session::get('tingkatan');
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $order = DB::table('tbl_order')->where('tbl_order.id_koperasi', $id)->get();
        // return dd($order);
        return view('dashboard.sales.history_pos', compact('id', 'username', 'password', 'tingkatan', 'order'));
    }
    public function checkout(String $id_order)
    {

        $tingkatan = Session::get('tingkatan');
        if ($tingkatan == 'anggota') {
            $id = Session::get('id');
            $id_koperasi = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $no_anggota = Session::get('no_anggota');
            $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id_koperasi)->first();
            $order = DB::table('tbl_order')->where('tbl_order.id', $id_order)->first();
            if (!$order) {
                return view('error');
            }
            $order_detail = DB::table('tbl_order_detail')->join("tbl_produk", 'tbl_order_detail.id_product', '=', 'tbl_produk.id')->where('tbl_order_detail.id_order', $id_order)->select('tbl_produk.nama_produk', 'tbl_order_detail.quantity', 'tbl_order_detail.price', 'tbl_order_detail.total', 'tbl_produk.id as id_produk', 'tbl_order_detail.id as id_detail_order')->get();
            return view('dashboard.sales.checkout', compact('id', 'username', 'password', 'tingkatan', 'order', 'order_detail', 'koperasi'));
        } else {

            $id = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $payment_method = DB::table('tbl_payment_method')->where('status', 1)->get();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
            $order = DB::table('tbl_order')->where('tbl_order.id', $id_order)->first();
            if (!$order) {
                return view('error');
            }
            if (is_null($order->id_customer)) {
                $order = DB::table('tbl_order')
                    ->join('tbl_anggota', 'tbl_order.id_anggota', '=', 'tbl_anggota.id')
                    ->where('tbl_order.id', $id_order)->where('tbl_order.status', 'pending')
                    ->select('*', 'tbl_order.id as id_order', 'tbl_anggota.id as id_anggota')
                    ->first();
            } else {
                $order = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.id_customer', '=', 'tbl_customer.id')
                    ->where('tbl_order.id', $id_order)
                    ->where('tbl_order.id', $id_order)->where('tbl_order.status', 'pending')
                    ->select('*', 'tbl_order.id as id_order', 'tbl_customer.id as id_customer')
                    ->first();
            }
            $order_detail = DB::table('tbl_order_detail')->join("tbl_produk", 'tbl_order_detail.id_product', '=', 'tbl_produk.id')
                ->where('tbl_order_detail.id_order', $id_order)
                ->select('tbl_produk.nama_produk', 'tbl_order_detail.quantity', 'tbl_order_detail.price', 'tbl_order_detail.total', 'tbl_produk.id as id_produk', 'tbl_order_detail.id as id_detail_order')->get();
            // return dd($order_detail);
            // return dd($order);
            return view('dashboard.sales.checkout', compact('id', 'username', 'password', 'tingkatan', 'order', 'order_detail', 'koperasi', 'payment_method'));
        }
    }

    public function detail_order(String $id_order)
    {

            $id = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $tingkatan = Session::get('tingkatan');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $payment_method = DB::table('tbl_payment_method')->where('status', 1)->get();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
            $order = DB::table('tbl_order')->where('tbl_order.id', $id_order)->first();
            if (!$order) {
                return view('error');
            }
            if (is_null($order->id_customer)) {
                if($order->status == 'completed'){
                    $order = DB::table('tbl_order')
                    ->join('tbl_anggota', 'tbl_order.id_anggota', '=', 'tbl_anggota.id')
                    ->join('tbl_payments', 'tbl_payments.id_order', '=', 'tbl_order.id')
                    ->where('tbl_order.id', $id_order)
                    ->select('*', 'tbl_order.id as id_order', 'tbl_anggota.id as id_anggota', 'tbl_payments.id as id_payment')
                    ->first();
                } else{
                    $order = DB::table('tbl_order')
                    ->join('tbl_anggota', 'tbl_order.id_anggota', '=', 'tbl_anggota.id')
                    ->where('tbl_order.id', $id_order)
                    ->select('*', 'tbl_order.id as id_order', 'tbl_anggota.id as id_anggota')
                    ->first();
                }
            } else {
                if($order->status == 'completed'){
                    $order = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.id_customer', '=', 'tbl_customer.id')
                    ->join('tbl_payments', 'tbl_payments.id_order', '=', 'tbl_order.id')
                    ->where('tbl_order.id', $id_order)
                    ->select('*', 'tbl_order.id as id_order', 'tbl_customer.id as id_customer', 'tbl_payments.id as id_payment')
                    ->first();
                } else{
                    $order = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.id_customer', '=', 'tbl_customer.id')
                    ->where('tbl_order.id', $id_order)
                    ->select('*', 'tbl_order.id as id_order', 'tbl_customer.id as id_customer', 'tbl_payments.id as id_payment')
                    ->first();
                }

            }

            $order_detail = DB::table('tbl_order_detail')->join("tbl_produk", 'tbl_order_detail.id_product', '=', 'tbl_produk.id')
                ->where('tbl_order_detail.id_order', $id_order)
                ->select('tbl_produk.nama_produk', 'tbl_order_detail.quantity', 'tbl_order_detail.price', 'tbl_order_detail.total', 'tbl_produk.id as id_produk', 'tbl_order_detail.id as id_detail_order')->get();
            // return dd($order);
            return view('dashboard.sales.detail_order', compact('id', 'username', 'password', 'tingkatan', 'order', 'order_detail', 'koperasi', 'payment_method'));
    }
}
