<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');

        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.overview.dashboard', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loginprocess(Request $request)
    {
        $ulogin = DB::table('tbl_anggota')->where('username', $request->username)->where('password', $request->password);
        if($ulogin->count() > 0){
            $data = $ulogin->first();
            Session::put('id', $data->id);
            Session::put('id_koperasi', $data->id_koperasi);
            Session::put('username', $data->username);
            Session::put('password', $data->password);
            Session::put('no_anggota', $data->no_anggota);
            Session::put('tingkatan', 'anggota');
            return redirect('/member/dashboard');
        }else{
            return redirect('/member/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loginform()
    {
        return view('member.loginform');
    }

    public function create(Request $request)
    {

        
            DB::beginTransaction();

            try {
                $request->validate([
                    'jenis_pinjaman' => 'required',
                    'id_koperasi' => 'required',
                    'no_anggota' => 'required',
                    'nominal' => 'required',
                    'lama_angsuran' => 'required',
                    'keterangan' => 'required',
                    'alasan' => 'required',
                    'tanggal_pinjaman' => 'required|date'
                ]);

                $pinjamanData = [
                    'jenis_pinjaman' => $request->jenis_pinjaman,
                    'id_koperasi' => $request->id_koperasi,
                    'no_anggota' => $request->no_anggota,
                    'nominal' => $request->nominal,
                    'lama_angsuran' => $request->lama_angsuran,
                    'keterangan' => $request->keterangan,
                    'tanggal_pinjaman' => $request->tanggal_pinjaman,
                    'alasan' => $request->alasan
                ];
                // Insert into tbl_anggota
                $insert_pinjaman = DB::table('tbl_pinjaman')->insert($pinjamanData);
                if (!$insert_pinjaman) {
                    throw new \Exception('Gagal Tambah Pinjaman!');
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
                ], 400);
            }

    }

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

        DB::beginTransaction();

        try {

            $delete_pinjaman = DB::table('tbl_pinjaman')->where('id', $id)->delete();

            if (!$delete_pinjaman) {
                throw new \Exception('Gagal delete!');
            }

            DB::commit();

            return redirect('/member/pinjaman');

        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect('/member/pinjaman');
        }

    }
    public function logout(){
        Session::flush('id');
        Session::flush('id_koperasi');
        Session::flush('username');
        Session::flush('password');
        Session::flush('no_anggota');
        return redirect('/member/login');
    }

    public function simpanan()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        $list_simpanan =  DB::table('tbl_simpanan')->where('no_anggota', '=', $no_anggota)->get();
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.simpanan', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan','list_simpanan'));
    }

    public function pinjaman()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        $list_pinjaman =  DB::table('tbl_pinjaman')->where('no_anggota', '=', $no_anggota)->get();
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.pinjaman', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan','list_pinjaman'));
    }

    public function tambah_pinjaman()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.tambah_pinjaman', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }
}
