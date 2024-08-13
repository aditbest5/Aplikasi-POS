<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    public function get_product($id)
    {
        try {
            $products = DB::table('tbl_produk')->where('id_koperasi', $id)->get();
            if (!$products) {
                throw new \Exception('Gagal Mendapatkan Produk');
            }
            return response()->json(['response_code' => '00', 'response_message' => $products], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '00', 'response_message' => $th->getMessage()], 500);
        }
    }
    public function detail_product($id_koperasi, $id_produk)
    {
        try {
            $products = DB::table('tbl_produk')->where('id_koperasi', $id_koperasi)->where('id', $id_produk)->get();
            if (!$products) {
                throw new \Exception('Gagal Mendapatkan Produk');
            }
            return response()->json(['response_code' => '00', 'response_message' => $products], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '00', 'response_message' => $th->getMessage()], 500);
        }
    }

    public function insert(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'nama_produk' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'kategori' => 'required',
                'uom' => 'required',
            ]);

            // Simpan foto selfie
            $product_base64 = $request->image_produk;
            $product_extension = $request->type;
            $product_name = time() . '_produk.' . $product_extension;
            $product_folder = "/produk/image/";
            $product_path =  public_path()  . $product_folder . $product_name;
            $product_url = $product_folder . $product_name;
            file_put_contents($product_path, base64_decode($product_base64));
            $products = DB::table('tbl_produk')->where('id_koperasi', $id)->insert([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'uom' => $request->uom,
                'image_produk' => $product_url,
                'barcode'=>$request->barcode,
                'id_kategori' => $request->kategori,
                'id_koperasi' => $id,
            ]);
            if (!$products) {
                throw new \Exception('Gagal Tambah!');
            }
            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Tambah Produk!'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'nama_produk' => 'required',
                'harga' => 'required',
                // 'stok' => 'required',
                'kategori' => 'required',
                'barcode' => 'required',
                'uom' => 'required',
            ]);

            // Simpan foto selfie

            // Simpan foto produk
            if ($request->has('image_produk')) {
                $product_base64 = $request->image_produk;
                $product_extension = 'jpg';
                $product_name = time() . '_produk.' . $product_extension;
                $product_folder = "/produk/image/";
                $product_path = public_path() . $product_folder . $product_name;
                $product_url = $product_folder . $product_name;
                file_put_contents($product_path, base64_decode($product_base64));
            }
            $product_data = [
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                // 'stok' => $request->stok,
                'uom' => $request->uom,
                'barcode' => $request->barcode,
                'id_kategori' => $request->kategori,
            ];

            if (isset($product_path)) {
                $product_data['image_produk'] = $product_url;
            }

            $update = DB::table('tbl_produk')->where('id', $id)->update($product_data);

            if (!$update) {
                throw new \Exception('Gagal Update!');
            }

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Update Produk!'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }

    public function add_stock(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'stok' => 'required',
            ]);

            // Simpan foto selfie

            // Simpan foto produk
            $stock = DB::table('tbl_produk')->where('id', $id)->select('tbl_produk.stok')->first();
            $new_stock = $stock->stok + $request->stok;
            $product_data = [
                'stok' => $new_stock,
            ];
            $update = DB::table('tbl_produk')->where('id', $id)->update($product_data);

            if (!$update) {
                throw new \Exception('Gagal tambah stok!');
            }

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil tambah stok!'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $delete_category = DB::table('tbl_produk')->where('id', $id)->delete();

            if (!$delete_category) {
                throw new \Exception('Gagal delete!');
            }
            DB::commit();
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Berhasil hapus produk!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => '01',
                'response_message' => $th->getMessage(),
            ]);
        }
    }

    public function list_kategori_produk(){
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');

        $kategori = DB::table('tbl_kategori_produk')->where('id_koperasi', $id)->get();
        return view('dashboard.data.produk.kategori.index', compact('id', 'username', 'password', 'tingkatan', 'kategori'));
    }

    public function list_produk(){

        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $categories = DB::table('tbl_kategori_produk')->where('id_koperasi', $id)->get();
        $edit_state = false;
        $products = DB::table('tbl_produk')->join('tbl_kategori_produk', 'tbl_produk.id_kategori', '=', 'tbl_kategori_produk.id')->where('tbl_produk.id_koperasi', $id)->select('*', 'tbl_produk.id as id_produk', 'tbl_kategori_produk.id as id_kategori')->get();
        return view('dashboard.data.produk.inventory.index', compact('id', 'username', 'password', 'tingkatan', 'products', 'categories', 'edit_state'));

    }
}
