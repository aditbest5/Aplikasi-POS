<?php

namespace App\Http\Controllers;

use App\Mail\RejectMail;
use App\Mail\RejectPengajuanMail;
use App\Mail\VerificationPengajuanMail;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMailApproveAnggota(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $data = DB::table('tbl_anggota')->where('id', $id)->update(['approval' => 1, 'password' => $password]);
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }
            $details = [
                'title' => 'VERIFIKASI KEANGGOTAAN',
                'content' => 'Selamat! Data anda berhasil terverifikasi',
                'info' => 'Berikut akun keanggotaan yang bisa anda gunakan saat login',
                'username' => $request->username,
                'password' => $password,
                'link' => 'https://dashboard.rkicoop.co.id/member/login',
                'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
            ];
            Mail::to($request->email)->send(new VerificationMail($details));

            DB::commit();
            // return response()->json(['response_code' => '00', 'response_message' => $details]);
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }
    public function sendMailApproveKoperasi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $data = DB::table('tbl_koperasi')->where('id', $id)->update(['approval' => 1, 'password' => $password]);
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }
            $details = [
                'title' => 'VERIFIKASI KEANGGOTAAN',
                'content' => 'Selamat! Akun koperasi anda berhasil terverifikasi',
                'info' => 'Berikut akun koperasi yang bisa anda gunakan saat login',
                'username' => $request->username,
                'password' => $password,
                'link' => 'https://dashboard.rkicoop.co.id/login',
                'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
            ];
            Mail::to($request->email)->send(new VerificationMail($details));
            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    public function sendMailRejectAnggota(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = DB::table('tbl_anggota')->where('id', $id)->first();
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }

            $details = [
                'title' => 'REGISTRASI KEANGGOTAAN DITOLAK',
                'content' => 'Maaf, pengajuan Anda ditolak. Silakan periksa kembali dokumen dan persyaratan yang diperlukan, kemudian ajukan ulang setelah melakukan perbaikan yang diperlukan. Terima kasih.',
                'info' => 'Berikut alasan registrasi anda ditolak.',
                'alasan' => $request->alasan,
                'data' => $data->nama_lengkap ?? 'Undefined',
                'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
            ];
            Mail::to($request->email)->send(new RejectMail($details));
            DB::table('tbl_anggota')->where('id', $id)->delete();

            DB::commit();
            // return response()->json(['response_code' => '00', 'response_message' => $details]);
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Reject!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    public function sendMailRejectKoperasi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Hapus anggota terlebih dahulu
            $deleted_anggota = DB::table('tbl_anggota')->where('id_koperasi', $id)->delete();

            // Jika anggota berhasil dihapus atau tidak ada anggota yang berhubungan dengan koperasi tersebut
            if ($deleted_anggota !== false) {
                // Hapus koperasi
                $data = DB::table('tbl_koperasi')->where('id', $id)->first();

                $details = [
                    'title' => 'REGISTRASI KOPERASI DITOLAK',
                    'content' => 'Maaf, koperasi anda ditolak',
                    'info' => 'Berikut alasan registrasi koperasi ditolak.',
                    'alasan' => $request->alasan,
                    'data' => $data->nama_koperasi ?? 'Undefined',
                    'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                    'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
                ];
                Mail::to($request->email)->send(new RejectMail($details));
                DB::table('tbl_koperasi')->where('id', $id)->delete();

                DB::commit();
                return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Reject!']);

            } else {
                // Jika penghapusan anggota gagal
                throw new \Exception('Gagal hapus data anggota!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    // ====================================================================================================================
    // Send Mail (Aprove & Reject) Data Pengajuan
    // ====================================================================================================================

    public function sendMailApprovePengajuan(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = DB::table('tbl_pengajuan')->where('id', $id)->where('approve', 'process')->first();
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }

            $linkRegistration = '';
            switch ($data->tingkat_koperasi) {
                case 'INKOP':
                    $linkRegistration = 'https://registrasi.rkicoop.co.id/koperasi/rki/inkop';
                    break;
                case 'PUSKOP':
                    $linkRegistration = 'https://registrasi.rkicoop.co.id/koperasi/rki/puskop';
                    break;
                case 'PRIMKOP':
                    $linkRegistration = 'https://registrasi.rkicoop.co.id/koperasi/rki/primkop';
                    break;
                default:
                    throw new \Exception('Tingkat koperasi tidak valid!');
            }

            $details = [
                'title' => 'PENGAJUAN REGISTRASI KOPERASI',
                'content' => 'Selamat! Anda dapat melanjutkan registrasi koperasi. Langkah selanjutnya adalah memastikan semua persyaratan dan dokumen yang diperlukan telah lengkap dan sesuai dengan ketentuan yang berlaku.',
                'info' => 'Berikut link untuk registrasi koperasi',
                'link' => $linkRegistration,
                'data' => $data,
                'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
            ];
            Mail::to($data->email_koperasi)->send(new VerificationPengajuanMail($details));

            // Update status pengajuan menjadi 'approve'
            DB::table('tbl_pengajuan')->where('id', $id)->update(['approve' => 'Accept']);

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    public function sendMailRejectPengajuan(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = DB::table('tbl_pengajuan')->where('id', $id)->where('approve', 'Process')->first();
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }

            $details = [
                'title' => 'PENGAJUAN REGISTRASI KOPERASI DITOLAK',
                'content' => 'Maaf, pengajuan Anda ditolak. Silakan periksa kembali dokumen dan persyaratan yang diperlukan, kemudian ajukan ulang setelah melakukan perbaikan yang diperlukan. Terima kasih.',
                'info' => 'Berikut alasan anda ditolak.',
                'alasan' => $request->alasan,
                'data' => $data,
                'logo_rki' => 'https://rkicoop.co.id/assets/imgs/Logo.png',
                'logo_background' => 'https://rkicoop.co.id/assets/imgs/pattern_3.svg',
            ];

            Mail::to($data->email_koperasi)->send(new RejectPengajuanMail($details));

            // Delete data pengajuan
            DB::table('tbl_pengajuan')->where('id', $id)->delete();

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Reject!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    // ====================================================================================================================
    // End Send Mail (Aprove & Reject) Data Pengajuan
    // ====================================================================================================================
}
