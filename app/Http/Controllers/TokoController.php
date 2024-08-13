<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
{
    //
    public function insert_toko(Request $request)
    {

        DB::beginTransaction();

        // Konversi Base64 ke file dan simpan di public path
        try {
            $request->validate([
                'nama_toko' => 'required',
                'email_toko' => 'required',
                'alamat_toko' => 'required',
                'kelurahan' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'nomor_hp_toko' => 'required',
                'pengurusData' => 'required',
            ]);
            // Simpan logo
            $logo_base64 = $request->logo;
            $logo_extension = 'png';
            $logo_name = time() . '_logo.' . $logo_extension;
            $logo_folder = '/toko/logo/';
            $logo_path = public_path() . $logo_folder . $logo_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($logo_path, base64_decode($logo_base64));

            // URL untuk disimpan di database
            $logoUrl = $logo_folder . $logo_name;

            $no_toko = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $tokoData = [
                'nama_toko' => $request->nama_toko,
                'alamat_toko' => $request->alamat_toko,
                'email_toko' => $request->email_toko,
                'nomor_hp_toko' => $request->nomor_hp_toko,
                'id_provinsi' => $request->provinsi,
                'id_kota' => $request->kota,
                'id_kecamatan' => $request->kecamatan,
                'id_kelurahan' => $request->kelurahan,
                'no_toko' => $no_toko,
                'foto_logo' => $logoUrl,
            ];
            // Insert data toko dan mendapatkan id toko
            $tokoId = DB::table('tbl_toko')->insertGetId($tokoData);
            if (!$tokoId) {
                throw new \Exception('Gagal Tambah Koperasi!');
            }


            $pengurusData = $request->pengurusData;
            //Memasukan Id toko pada setiap array data pengurus / user
            foreach ($pengurusData as &$data) {
                $password = bin2hex(openssl_random_pseudo_bytes(10));
                $data['password'] = $password;
                $data['id_toko'] = $tokoId;
            }
            // Insert pengurusData ke tabel user
            $pengurus = DB::table('tbl_user')->insert($pengurusData);

            if (!$pengurus) {
                throw new \Exception('Gagal Tambah User!');
            }
            DB::commit();

            return response()->json([
                'response_code' => "00",
                'response_message' => 'Sukses simpan data!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 500);
        }
    }
}
