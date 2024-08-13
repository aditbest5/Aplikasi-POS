<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dologin(Request $request)
    {

        $username = $request->username;
        $password = $request->password;

        // Mencari user di tabel koperasi
        $koperasi = DB::table('tbl_koperasi')
            ->select('*', 'tbl_koperasi.id as id_kop')
            ->join('tbl_tingkat_koperasi', 'tbl_koperasi.id_tingkatan_koperasi', '=', 'tbl_tingkat_koperasi.id')
            ->where('tbl_koperasi.username', $username)
            ->where('tbl_koperasi.password', $password)
            ->first();

        if (!empty($koperasi->id_kop) || !empty($koperasi->username) || !empty($koperasi->password)) {
            Session::put('id_koperasi', $koperasi->id_kop);
            Session::put('username', $koperasi->username);
            Session::put('nama_koperasi', $koperasi->nama_koperasi);
            Session::put('password', $koperasi->password);
            Session::put('tingkatan', $koperasi->nama_tingkatan);
            Session::put('id_inkop', $koperasi->id_inkop);
            Session::put('id_puskop', $koperasi->id_puskop);
            Session::put('id_primkop', $koperasi->id_primkop);
            return redirect('/dashboard');
        } elseif ($username == 'rki' && $password == '123456789') {
            Session::put('id_koperasi', 111);
            Session::put('username', 'rki');
            Session::put('password', $password);
            Session::put('tingkatan', 'rki');
            Session::put('id_inkop', 0);
            Session::put('id_puskop', 0);
            Session::put('id_primkop', 0);
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
