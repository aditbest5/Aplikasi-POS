<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    //
    public function store(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'nama_kategori' => 'required',
                'deskripsi' => 'required'
            ]);
            $data = [
                'nama_kategori' => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
                'id_koperasi' => $id
            ];
            $insert_category = DB::table('tbl_kategori_produk')->insert($data);

            if (!$insert_category) {
                throw new \Exception('Gagal menambahkan kategori!');
            }
            DB::commit();
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Berhasil menambahkan kategori!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => '01',
                'response_message' => $th->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $delete_category = DB::table('tbl_kategori_produk')->where('id', $id)->delete();

            if (!$delete_category) {
                throw new \Exception('Gagal delete kategori!');
            }
            DB::commit();
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Berhasil hapus kategori!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => '01',
                'response_message' => $th->getMessage(),
            ]);
        }
    }
}
