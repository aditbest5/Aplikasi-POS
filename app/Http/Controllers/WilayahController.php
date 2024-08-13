<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    //
    public function province()
    {
        try {
            $province = DB::table('tbl_provinces')->select('prov_id', 'prov_name')->get();
            if ($province->isEmpty()) {
                throw new Error('Gagal Mendapatkan Provinsi!');
            }
            return response()->json(['response_code' => '00', 'data' => $province], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '01', 'message' => $th->getMessage()], 500);
        }
    }
    public function city($id)
    {
        try {
            $city = DB::table('tbl_cities')->select('city_id', 'city_name')->where('prov_id', $id)->get();
            // return dd($city);
            if ($city->isEmpty()) {
                throw new Error('Gagal Mendapatkan Kota!');
            }
            return response()->json(['response_code' => '00', 'data' => $city], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '01', 'message' => $th->getMessage()], 500);
        }
    }
    public function district($id)
    {
        try {
            $district = DB::table('tbl_districts')->select('dis_id', 'dis_name')->where('city_id', $id)->get();
            // return dd($district);
            if ($district->isEmpty()) {
                throw new Error('Gagal Mendapatkan Kota!');
            }
            return response()->json(['response_code' => '00', 'data' => $district], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '01', 'message' => $th->getMessage()], 500);
        }
    }
    public function subdistrict($id)
    {
        try {
            $subdistrict = DB::table('tbl_subdistrics')->where('dis_id', $id)->get();
            // return dd($subdistrict);
            if ($subdistrict->isEmpty()) {
                throw new Error('Gagal Mendapatkan Kota!');
            }
            return response()->json(['response_code' => '00', 'data' => $subdistrict], 200);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '01', 'message' => $th->getMessage()], 500);
        }
    }
}
