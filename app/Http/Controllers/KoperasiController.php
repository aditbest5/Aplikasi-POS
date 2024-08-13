<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Session;

class KoperasiController extends Controller
{
    //
    public function update_koperasi_rki(Request $request, $id_koperasi)
    {

        DB::beginTransaction();

        // Konversi Base64 ke file dan simpan di public path
        try {
            $request->validate([
                'nama_koperasi' => 'required',
                'singkatan_koperasi' => 'required',
                'email' => 'required|email',
                'no_telp' => 'required',
                'no_wa' => 'required',
                'bidang_koperasi' => 'required',
                'alamat' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'pengurusData' => 'required|array',
                'pengawasData' => 'required|array',
                'provinsi' => 'required',
                'kode_pos' => 'required',
                'no_akta' => 'required',
                'tanggal_akta' => 'required|date',
                'no_skk' => 'required',
                'tanggal_skk' => 'required|date',
                'no_akta_perubahan' => 'required',
                'masa_berlaku_perubahan' => 'required|date',
                'no_spkk' => 'required',
                'tanggal_spkk' => 'required|date',
                'no_siup' => 'required',
                'masa_berlaku_siup' => 'required|date',
                'no_skdu' => 'required',
                'masa_berlaku_skdu' => 'required|date',
                'no_npwp' => 'required',
                'no_pkp' => 'required',
                'no_sertifikat' => 'required',
            ]);

            // Simpan logo
            $logo_base64 = $request->logo;
            $logo_extension = 'png';
            $logo_name = time() . '_logo.' . $logo_extension;
            $logo_folder = '/koperasi/logo/';
            $logo_path = public_path() . $logo_folder . $logo_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($logo_path, base64_decode($logo_base64));



            // Simpan NPWP
            $npwp_base64 = $request->image_npwp;
            $npwp_extension = 'png';
            $npwp_name = time() . '_npwp.' . $npwp_extension;
            $npwp_folder = '/koperasi/npwp/';
            // $npwp_path = public_path($npwp_folder . $npwp_name);
            $npwp_path = public_path() . $npwp_folder . $npwp_name;
            file_put_contents($npwp_path, base64_decode($npwp_base64));

            // Simpan dokumen PDF Akta Pendirian
            $dokumen_akta_pendirian_base64 = $request->doc_akta_pendirian;
            $dokumen_akta_pendirian_extension = 'pdf';
            $dokumen_akta_pendirian_name = time() . '_dokumen.' . $dokumen_akta_pendirian_extension;
            $dokumen_akta_pendirian_folder = '/koperasi/akta_pendirian/';
            // $dokumen_akta_pendirian_path = public_path($dokumen_akta_pendirian_folder . $dokumen_akta_pendirian_name);
            $dokumen_akta_pendirian_path = public_path() . $dokumen_akta_pendirian_folder . $dokumen_akta_pendirian_name;
            file_put_contents($dokumen_akta_pendirian_path, base64_decode($dokumen_akta_pendirian_base64));


            // Simpan dokumen PDF Akta Perubahan
            $dokumen_akta_perubahan_base64 = $request->doc_akta_perubahan;
            $dokumen_akta_perubahan_extension = 'pdf';
            $dokumen_akta_perubahan_name = time() . '_dokumen.' . $dokumen_akta_perubahan_extension;
            $dokumen_akta_perubahan_folder = '/koperasi/akta_perubahan/';
            // $dokumen_akta_perubahan_path = public_path($dokumen_akta_perubahan_folder . $dokumen_akta_perubahan_name);
            $dokumen_akta_perubahan_path = public_path() . $dokumen_akta_perubahan_folder . $dokumen_akta_perubahan_name;
            file_put_contents($dokumen_akta_perubahan_path, base64_decode($dokumen_akta_perubahan_base64));

            // Simpan dokumen PDF SIUP
            $dokumen_siup_base64 = $request->doc_siup;
            $dokumen_siup_extension = 'pdf';
            $dokumen_siup_name = time() . '_dokumen.' . $dokumen_siup_extension;
            $dokumen_siup_folder = '/koperasi/siup/';
            // $dokumen_siup_path = public_path($dokumen_siup_folder . $dokumen_siup_name);
            $dokumen_siup_path = public_path() . $dokumen_siup_folder . $dokumen_siup_name;
            file_put_contents($dokumen_siup_path, base64_decode($dokumen_siup_base64));

            // Simpan dokumen PDF SK Kemenkumham
            $dokumen_skk_base64 = $request->doc_sk_kemenkumham;
            $dokumen_skk_extension = 'pdf';
            $dokumen_skk_name = time() . '_dokumen.' . $dokumen_skk_extension;
            $dokumen_skk_folder = '/koperasi/sk_kemenkumham/';
            // $dokumen_skk_path = public_path($dokumen_skk_folder . $dokumen_skk_name);
            $dokumen_skk_path = public_path() . $dokumen_skk_folder . $dokumen_skk_name;
            file_put_contents($dokumen_skk_path, base64_decode($dokumen_skk_base64));

            // Simpan dokumen PDF SPKUM
            $dokumen_spkum_base64 = $request->doc_spkum;
            $dokumen_spkum_extension = 'pdf';
            $dokumen_spkum_name = time() . '_dokumen.' . $dokumen_spkum_extension;
            $dokumen_spkum_folder = '/koperasi/spkum/';
            // $dokumen_spkum_path = public_path($dokumen_spkum_folder . $dokumen_spkum_name);
            $dokumen_spkum_path = public_path() . $dokumen_spkum_folder . $dokumen_spkum_name;
            file_put_contents($dokumen_spkum_path, base64_decode($dokumen_spkum_base64));


            // Simpan dokumen PDF SK Domisili
            $dokumen_sk_domisili_base64 = $request->doc_sk_domisili;
            $dokumen_sk_domisili_extension = 'pdf';
            $dokumen_sk_domisili_name = time() . '_dokumen.' . $dokumen_sk_domisili_extension;
            $dokumen_sk_domisili_folder = '/koperasi/sk_domisili/';
            // $dokumen_sk_domisili_path = public_path($dokumen_sk_domisili_folder . $dokumen_sk_domisili_name);
            $dokumen_sk_domisili_path = public_path() . $dokumen_sk_domisili_folder . $dokumen_sk_domisili_name;
            file_put_contents($dokumen_sk_domisili_path, base64_decode($dokumen_sk_domisili_base64));

            // Simpan dokumen PDF Sertifikat Koperasi
            $dokumen_sertifikat_base64 = $request->doc_sertifikat_koperasi;
            $dokumen_sertifikat_extension = 'pdf';
            $dokumen_sertifikat_name = time() . '_dokumen.' . $dokumen_sertifikat_extension;
            $dokumen_sertifikat_folder = '/koperasi/sertifikat_koperasi/';
            // $dokumen_sertifikat_path = public_path($dokumen_sertifikat_folder . $dokumen_sertifikat_name);
            $dokumen_sertifikat_path = public_path() . $dokumen_sertifikat_folder . $dokumen_sertifikat_name;
            file_put_contents($dokumen_sertifikat_path, base64_decode($dokumen_sertifikat_base64));

            // URL untuk disimpan di database
            $logoUrl = $logo_folder . $logo_name;

            $npwpUrl = $npwp_folder . $npwp_name;
            $dokumenSIUPUrl = $dokumen_siup_folder . $dokumen_siup_name;
            $dokumenAktaPendirianUrl = $dokumen_akta_pendirian_folder . $dokumen_akta_pendirian_name;
            $dokumenAktaPerubahanUrl = $dokumen_akta_perubahan_folder . $dokumen_akta_perubahan_name;
            $dokumenSKKUrl = $dokumen_skk_folder . $dokumen_skk_name;
            $dokumenSPKUMUrl = $dokumen_spkum_folder . $dokumen_spkum_name;
            $dokumenSKDomisiliUrl = $dokumen_sk_domisili_folder . $dokumen_sk_domisili_name;
            $dokumenSertifikatUrl = $dokumen_sertifikat_folder . $dokumen_sertifikat_name;

            $koperasiData = [
                'nama_koperasi' => $request->nama_koperasi,
                'singkatan_koperasi' => $request->singkatan_koperasi,
                'email_koperasi' => $request->email,
                'no_phone' => $request->no_telp,
                'hp_wa' => $request->no_wa,
                'hp_fax' => $request->no_fax,
                'url_website' => $request->web,
                'bidang_koperasi' => $request->bidang_koperasi,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->kelurahan,
                'id_kecamatan' => $request->kecamatan,
                'id_kota' => $request->kota,
                'id_provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'approval' => 1,
                'no_akta_pendirian' => $request->no_akta,
                'tanggal_akta_pendirian' => $request->tanggal_akta,
                'no_sk_kemenkumham' => $request->no_skk,
                'tanggal_sk_kemenkumham' => $request->tanggal_skk,
                'no_akta_perubahan' => $request->no_akta_perubahan,
                'tanggal_akta_perubahan' => $request->masa_berlaku_perubahan,
                'no_spkum' => $request->no_spkk,
                'tanggal_spkum' => $request->tanggal_spkk,
                'no_siup' => $request->no_siup,
                'masa_berlaku_siup' => $request->masa_berlaku_siup,
                'no_sk_domisili' => $request->no_skdu,
                'masa_berlaku_sk_domisili' => $request->masa_berlaku_skdu,
                'no_npwp' => $request->no_npwp,
                'no_pkp' => $request->no_pkp,
                'no_sertifikat_koperasi' => $request->no_sertifikat,
                'image_logo' => $logoUrl,
                'image_npwp' => $npwpUrl,
                'doc_siup' => $dokumenSIUPUrl,
                'doc_akta_pendirian' => $dokumenAktaPendirianUrl,
                'doc_akta_perubahan' => $dokumenAktaPerubahanUrl,
                'doc_sk_kemenkumham' => $dokumenSKKUrl,
                'doc_spkum' => $dokumenSPKUMUrl,
                'doc_sk_domisili' => $dokumenSKDomisiliUrl,
                'doc_sertifikat_koperasi' => $dokumenSertifikatUrl,
            ];

            $koperasiId = DB::table('tbl_koperasi')->where('id', $id_koperasi)->update($koperasiData);
            if (!$koperasiId) {
                throw new \Exception('Gagal Tambah Koperasi!');
            }


            $pengurus = DB::table('tbl_pengurus')->insert($request->pengurusData);
            $pengawas = DB::table('tbl_pengawas')->insert($request->pengawasData);

            if (!$pengurus || !$pengawas) {
                throw new \Exception('Gagal Tambah Anggota!');
            }
            DB::commit();

            return response()->json([
                'response_code' => "00",
                'response_message' => 'Sukses Simpan Data',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 400);
        }
    }
    public function verifikasi_nis($nis)
    {
        try {
            $koperasi = DB::table('tbl_koperasi')->join('tbl_pengurus', 'tbl_pengurus.id_koperasi', '=', 'tbl_koperasi.id')->where('nis', $nis)->where('approval', 0)->select('*', 'tbl_koperasi.id as id_koperasi')->first();
            if (!$koperasi) {
                return response()->json([
                    'response_code' => "01",
                    'response_message' => 'Kode NIS Salah',
                ], 400);
            }
            return response()->json([
                'response_code' => "00",
                'response_message' => $koperasi,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 500);
        }
    }

    public function insert_koperasi(Request $request, $id_koperasi, $id_tingkat)
    {

        DB::beginTransaction();

        // Konversi Base64 ke file dan simpan di public path
        try {
            $request->validate([
                'namaKoperasi' => 'required',
                'password' => 'required',
                'username' => 'required',
                'nomerKetua' => 'required',
                'namaKetua' => 'required',
                'nis' => 'required',
                'confirmPassword' => 'required',
            ]);
            if ($request->password != $request->confirmPassword) {
                return response()->json([
                    'response_code' => "01",
                    'response_message' => 'Password Tidak Sama!',
                ], 200);
            }
            $nis = $request->nis . '-' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            if ($id_tingkat == 2) {
                $koperasiData = [
                    'nama_koperasi' => $request->namaKoperasi,
                    'password' => $request->password,
                    'username' => $request->username,
                    'id_inkop' => $id_koperasi,
                    'id_tingkatan_koperasi' => $id_tingkat,
                    'nis' => $nis
                ];
            } else if ($id_tingkat == 3) {
                $koperasiData = [
                    'nama_koperasi' => $request->namaKoperasi,
                    'password' => $request->password,
                    'username' => $request->username,
                    'id_puskop' => $id_koperasi,
                    'id_tingkatan_koperasi' => $id_tingkat,
                    'nis' => $nis
                ];
            }

            $koperasiId = DB::table('tbl_koperasi')->insertGetId($koperasiData);
            if (!$koperasiId) {
                throw new \Exception('Gagal Tambah Koperasi!');
            }
            $pengurusData = [
                'nama_pengurus' => $request->namaKetua,
                'nomor_hp' => $request->nomerKetua,
                'jabatan' => 'ketua',
                'id_koperasi' => (int)$koperasiId,
            ];

            $pengurus = DB::table('tbl_pengurus')->insert($pengurusData);

            if (!$pengurus) {
                throw new \Exception('Gagal Tambah Ketua!');
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


    public function dashboard()
    {

        $id = Session::get('id_koperasi');
        if (!empty($id)) {
            $username = Session::get('username');
            $password = Session::get('password');
            $tingkatan = Session::get('tingkatan');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $inkop_count = DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '=', 1)->count();
            $puskop_count = DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '!=', 3)->count();
            $primkop_count = DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '!=', 2)->count();
            $anggota_count = DB::table('tbl_anggota')->where('id_koperasi', $id)->count();
            $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
            // return dd($koperasi);
            return view('dashboard.overview.index', compact('id', 'username', 'password', 'tingkatan', 'inkop_count', 'puskop_count', 'primkop_count', 'anggota_count', 'koperasi'));
        } else {
            return redirect('/login');
        }
    }

    public function list_inkop()
    {

        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $list_inkop =  DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '=', 1)->get();
        return view('dashboard.data.koperasi.inkop.index', compact('id', 'username', 'password', 'tingkatan', 'list_inkop'));
    }

    public function list_puskop()
    {

        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        if ($tingkatan == 'rki') {
            $puskop = DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '=', 2)->get();
        } else {
            $puskop = DB::table('tbl_koperasi')->where('id_inkop',  $id)->get();
        }
        return view('dashboard.data.koperasi.puskop.index', compact('id', 'username', 'password', 'tingkatan', 'puskop'));
    }

    public function list_puskop_inkop(String $id)
    {

        // return dd($id);
        $id_ink = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $puskop = DB::table('tbl_koperasi')->where('id_inkop',  $id)->where('approval', '=', 1)->get();
        return view('dashboard.data.koperasi.puskop.index', compact('id_ink', 'username', 'password', 'tingkatan', 'puskop'));
    }


    public function list_primkop_puskop(String $id)
    {

        $id_pus = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        // return dd($tingkatan);

        $primkop = DB::table('tbl_koperasi')->where('id_puskop', $id)->where('approval', '=', 1)->get();
        return view('dashboard.data.koperasi.primkop.index', compact('id_pus', 'username', 'password', 'tingkatan', 'primkop'));
    }

    public function list_primkop()
    {

        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        // return dd($tingkatan);
        if ($tingkatan == 'rki') {
            $primkop = DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '=', 3)->get();
            // return dd($primkop);
        } else {
            $primkop = DB::table('tbl_koperasi')->where('id_puskop', $id)->get();
        }
        return view('dashboard.data.koperasi.primkop.index', compact('id', 'username', 'password', 'tingkatan', 'primkop'));
    }

    public function primkop()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
        // return dd($koperasi);
        return view('dashboard.data.koperasi.primkop.create', compact('id', 'username', 'password', 'tingkatan', 'koperasi'));
    }

    public function puskop()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $koperasi = DB::table('tbl_koperasi')->where('id', $id)->first();
        // return dd($koperasi);
        return view('dashboard.data.koperasi.puskop.create', compact('id', 'username', 'password', 'tingkatan', 'koperasi'));
    }

    public function inkop()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        return view('dashboard.data.koperasi.inkop.create', compact('id', 'username', 'password', 'tingkatan'));
    }

    public function pinjaman()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $list_pinjaman =  DB::table('tbl_pinjaman')->where('id_koperasi', '=', $id)->get();
        return view('dashboard.data.koperasi.simpin.pinjaman', compact('id', 'username', 'password', 'tingkatan', 'list_pinjaman'));
    }

    public function simpanan()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $list_simpanan =  DB::table('tbl_simpanan')->where('id_koperasi', '=', $id)->get();
        return view('dashboard.data.koperasi.simpin.simpanan', compact('id', 'username', 'password', 'tingkatan', 'list_simpanan'));
    }

    public function tambah_simpanan()
    {
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $id_koperasi = $id;
        return view('dashboard.data.koperasi.simpin.tambah_simpanan', compact('id', 'username', 'password', 'tingkatan', 'id_koperasi'));
    }


    public function insert_simpanan(Request $request)
    {

        DB::beginTransaction();

        try {
            $request->validate([
                'simpanan_pokok' => 'required',
                'id_koperasi' => 'required',
                'no_anggota' => 'required',
                'simpanan_wajib' => 'required',
                'simpanan_sukarela' => 'required',
                'keterangan' => 'required',
                'tanggal_simpanan' => 'required'
            ]);

            $simpananData = [
                'simpanan_pokok' => $request->simpanan_pokok,
                'id_koperasi' => $request->id_koperasi,
                'no_anggota' => $request->no_anggota,
                'simpanan_wajib' => $request->simpanan_wajib,
                'simpanan_sukarela' => $request->simpanan_sukarela,
                'keterangan' => $request->keterangan,
                'tanggal_simpanan' => $request->tanggal_simpanan
            ];
            // Insert into tbl_anggota
            $insert_simpanan = DB::table('tbl_simpanan')->insert($simpananData);
            if (!$insert_simpanan) {
                throw new \Exception('Gagal Tambah Simpanan!');
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

    public function logout()
    {

        Session::flush('id_koperasi');
        Session::flush('username');
        Session::flush('password');
        Session::flush('tingkatan');
        Session::flush('id_inkop');
        Session::flush('id_puskop');
        Session::flush('id_primkop');
        return redirect('/login');
    }
}
