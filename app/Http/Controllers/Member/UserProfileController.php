<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserProfileController extends Controller
{
    public function index()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');

        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.user-profile.index', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }

    public function update(Request $request)
{
    DB::beginTransaction();
    $id = $request->id_anggota;

    try {
        $request->validate([
            'no_anggota' => 'required',
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'username' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'email' => 'required|email',
            'slug_url' => 'required',
            'id_role' => 'required',
            'id_koperasi' => 'required'
        ]);
        // Simpan foto selfie
        $selfieUrl = $this->saveBase64Image($request->selfie, '/anggota/selfie/');
        // Simpan foto KTP
        $ktpUrl = $this->saveBase64Image($request->ktp, '/anggota/ktp/');

        $anggotaData = [
            'no_anggota' => $request->no_anggota,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->kecamatan,
            'id_kota' => $request->kota,
            'id_provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
            'agama' => $request->agama,
            'status_pernikahan' => $request->status_pernikahan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'selfie' => $selfieUrl,
            'ktp' => $ktpUrl,
            'id_koperasi' => $request->id_koperasi,
            'id_role' => $request->id_role
        ];

        // Update data anggota
        $update_anggota = DB::table('tbl_anggota')->where('id', $id)->update($anggotaData);
        if (!$update_anggota) {
            throw new \Exception('Gagal Update Anggota!');
        }

        DB::commit();
        return response()->json([
            'response_code' => "00",
            'response_message' => 'Sukses update data!',
        ], 200);
    } catch (\Throwable $th) {
        DB::rollBack();
        return response()->json([
            'response_code' => "01",
            'response_message' => $th->getMessage(),
        ], 400);
    }
}

public function ubah_password()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.user-profile.ubah_password', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }

/**
 * Save Base64 Image
 *
 * @param string $base64Image
 * @param string $folderPath
 * @return string|null
 */
private function saveBase64Image($base64Image, $folderPath)
{
    if ($base64Image) {
        $image_parts = explode(';base64,', $base64Image);
        if (count($image_parts) == 2) {
            $image_base64 = base64_decode($image_parts[1]);
            $mime_type = finfo_buffer(finfo_open(), $image_base64, FILEINFO_MIME_TYPE);
            $extension = $this->getExtensionFromMime($mime_type);
            if ($extension) {
                $imageName = time() . 'anggota.' . $extension;
                $imagePath = public_path() . $folderPath . $imageName;
                file_put_contents($imagePath, $image_base64);
                return $folderPath . $imageName;
            }
        }
    }
    return null;
}

/**
 * Get file extension from MIME type
 *
 * @param string $mime
 * @return string|null
 */
private function getExtensionFromMime($mime)
{
    $mime_map = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
    ];
    return $mime_map[$mime] ?? null;
}

}
