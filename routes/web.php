<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Member\UserProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PosController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

if (config('app.env') === 'production') {
    if (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])) {
        Route::get('/login', function () {
            return view('dashboard.auth.login');
        })->name('login');

        Route::post('/dologin', [LoginController::class, 'dologin']);

        // Route::get('/dashboard', [HomeController::class, 'index']);

        Route::get('/tambah_anggota', [AnggotaController::class, 'create']);
        Route::get('/tambah_primkop', [KoperasiController::class, 'primkop']);
        Route::get('/tambah_puskop', [KoperasiController::class, 'puskop']);
        Route::get('/tambah_inkop', [KoperasiController::class, 'inkop']);

        Route::get('/logout', function () {
            Session::flush('id_koperasi');
            Session::flush('username');
            Session::flush('password');
            Session::flush('tingkatan');
            Session::flush('id_inkop');
            Session::flush('id_puskop');
            Session::flush('id_primkop');
            return redirect('/login');
        });

        Route::get('/dashboard-new', function () {
            return view('dashboard.index');
        });

        Route::get('/dashboard', function () {
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
        })->name('overview');


        Route::get('/list_inkop', function () {
            $id = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $tingkatan = Session::get('tingkatan');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $list_inkop =  DB::table('tbl_koperasi')->where('id_tingkatan_koperasi', '=', 1)->get();
            return view('dashboard.data.koperasi.inkop.index', compact('id', 'username', 'password', 'tingkatan', 'list_inkop'));
        })->name('view-inkop');

        Route::get('/list_puskop', function () {
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
        })->name('view-puskop');

        Route::get('/list_puskop_inkop/{id}', function ($id) {
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
        })->name('view-puskop');

        Route::get('/list_primkop', function () {
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
        })->name('view-primkop');

        Route::get('/list_primkop_puskop/{id}', function ($id) {
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
        })->name('view-primkop');

        Route::get('/list_anggota', function () {
            $id = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $tingkatan = Session::get('tingkatan');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $primkop_anggota = DB::table('tbl_anggota')->where('id_koperasi', $id)->get();
            return view('dashboard.data.koperasi.anggota.index', compact('id', 'username', 'password', 'tingkatan', 'primkop_anggota'));
        })->name('view-anggota');

        Route::get('/list_anggota_primkop/{id}', function ($id) {
            $id_prim = Session::get('id_koperasi');
            $username = Session::get('username');
            $password = Session::get('password');
            $tingkatan = Session::get('tingkatan');
            $id_inkop = Session::get('id_inkop');
            $id_puskop = Session::get('id_puskop');
            $id_primkop = Session::get('id_primkop');
            $primkop_anggota = DB::table('tbl_anggota')->where('id_koperasi', $id)->where('approval', '=', 1)->get();
            return view('dashboard.data.koperasi.anggota.index', compact('id_prim', 'username', 'password', 'tingkatan', 'primkop_anggota'));
        })->name('view-anggota-primkop');



        Route::get('/', function () {
            return redirect()->route('login');
        })->name('home');
    } else if ($_SERVER['HTTP_HOST'] == 'registrasi.rkicoop.co.id') {
        Route::get('rki/primkop', function (Request $request) {
            return "OK";
        });

        // Routing anggota melalui primkopnya
        Route::get('/anggota/primkop/{name}', function ($name) {
            $koperasi = DB::table('tbl_koperasi')->select('nama_koperasi', 'id')->where('slug', $name)->get();
            // return dd(is_bool($koperasi));
            // return dd($tingkat_koperasi);
            if ($koperasi->isEmpty()) {
                return view('error');
            } else {
                return view('registrasi.registrasi-anggota', ['name' => $name, 'nama_koperasi' => $koperasi[0]->nama_koperasi, 'id_koperasi' => $koperasi[0]->id]);
            }
        })->name('anggota.primkop');

        // Routing registrasi koperasi melalui RKI
        Route::get('/koperasi/rki/{tingkat}', function ($tingkat) {
            $tingkat_koperasi = DB::table('tbl_tingkat_koperasi')->where('nama_tingkatan', $tingkat)->get();
            if ($tingkat_koperasi->isEmpty()) {
                return view('error');
            } else {
                return view('registrasi.registrasi-koperasi-rki', ['tingkat' => $tingkat]);
            }
        })->name('koperasi.rki');

        // Routing registrasi koperasi melalui koperasi diatasnya
        Route::get('/koperasi/{tingkat}/{name}', function ($tingkat, $name) {
            $koperasi = DB::table('tbl_koperasi')->select('*', 'tbl_koperasi.id as id_kop')
                ->join('tbl_tingkat_koperasi', 'tbl_koperasi.id_tingkatan_koperasi', '=', 'tbl_tingkat_koperasi.id')
                ->where('tbl_koperasi.slug', $name)
                ->where('tbl_tingkat_koperasi.nama_tingkatan', $tingkat)
                ->get();
            // return dd($koperasi);
            if ($koperasi->isEmpty()) {
                return view('error');
            } elseif ($koperasi[0]->id_tingkatan_koperasi > 2) {
                return view('error');
            } elseif ($koperasi[0]->id_tingkatan_koperasi < 3) {
                $tingkatan = $koperasi[0]->id_tingkatan_koperasi + 1;
                $tingkat_atas = DB::table('tbl_tingkat_koperasi')->where('id', $tingkatan)->get();
                $tingkat_bawah = DB::table('tbl_tingkat_koperasi')->where('id', $koperasi[0]->id_tingkatan_koperasi)->get();

                // return dd($tingkat_atas);
                return view('registrasi.registrasi-koperasi', ['tingkat_bawah' => $tingkat_atas[0]->nama_tingkatan, "tingkat_atas" => $tingkat_bawah[0]->nama_tingkatan, 'id_koperasi' => $koperasi[0]->id_kop, 'nama_koperasi' => $koperasi[0]->nama_koperasi, 'id_tingkat' => $tingkatan]);
            }
        })->name('koperasi');
    }
} else {
    Route::get('/login', function () {
        return view('dashboard.auth.login');
    })->name('login');

    Route::post('/dologin', [LoginController::class, 'dologin']);


    // Route::get('/dashboard', [HomeController::class, 'index']);

    Route::get('/tambah_anggota', [AnggotaController::class, 'create']);
    Route::get('/tambah_primkop', [KoperasiController::class, 'primkop']);
    Route::get('/tambah_puskop', [KoperasiController::class, 'puskop']);
    Route::get('/tambah_inkop', [KoperasiController::class, 'inkop']);

    Route::get('/simpanan', [KoperasiController::class, 'simpanan']);
    Route::get('/pinjaman', [KoperasiController::class, 'pinjaman']);
    Route::get('/tambah_simpanan', [KoperasiController::class, 'tambah_simpanan']);

    Route::get('/logout', [KoperasiController::class, 'logout']);

    Route::get('/dashboard-new', function () {
        return view('dashboard.index');
    });

    Route::get('/dashboard', [KoperasiController::class, 'dashboard'])->name('overview');

    Route::get('/list_inkop', [KoperasiController::class, 'list_inkop'])->name('view-inkop');

    Route::get('/list_puskop', [KoperasiController::class, 'list_puskop'])->name('view-puskop');

    Route::get('/list_puskop_inkop/{id}', [KoperasiController::class, 'list_puskop_inkop'])->name('view-puskop');

    Route::get('/list_primkop', [KoperasiController::class, 'list_primkop'])->name('view-primkop');

    Route::get('/list_primkop_puskop/{id}', [KoperasiController::class, 'list_primkop_puskop'])->name('view-primkop');

    Route::get('/list_anggota', [AnggotaController::class, 'list_anggota'])->name('view-anggota');

    Route::get('/list_anggota_primkop/{id}', [AnggotaController::class, 'list_anggota_primkop'])->name('view-anggota-primkop');

    Route::get('/list_pengajuan', [AnggotaController::class, 'list_pengajuan'])->name('view-pengajuan');

    Route::get('/list_kategori_produk', [ProductController::class, 'list_kategori_produk'])->name('view-kategori');

    Route::get('/list_produk', [ProductController::class, 'list_produk'])->name('view-produk');

    Route::get('/pos', [PosController::class, 'pos'])->name('view-pos');

    Route::get('/checkout/{id_order}', [PosController::class, 'checkout'])->name('view-pos');
    Route::get('/detail-order/{id_order}', [PosController::class, 'detail_order'])->name('view-detail-order');

    Route::get('/history-pos', [PosController::class, 'history_pos'])->name('view-history-pos');


    Route::get('/', function () {
        return redirect()->route('login');
    })->name('home');

    // Routing registrasi POS

    Route::get('/registrasi', function () {
        return view('registrasi.registrasi');
    })->name('registrasi');

    // =========================================================================================================================================================
    // Member Routing
    // =========================================================================================================================================================
    Route::prefix('member')->name('member.')->group(function () {
        // Authentication
        Route::get('/login', [MemberController::class, 'loginform'])->name('login');
        Route::post('/dologin', [MemberController::class, 'loginprocess'])->name('login');
        Route::get('/logout', [MemberController::class, 'logout'])->name('logout');
        Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile');
        Route::get('/ubah_password', [UserProfileController::class, 'ubah_password'])->name('ubah_password');
        // Dashboard
        Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('overview');

        // Simpanan
        Route::get('/simpanan', [MemberController::class, 'simpanan'])->name('simpanan');

        // Pinjaman
        Route::get('/pinjaman', [MemberController::class, 'pinjaman'])->name('pinjaman');
        Route::get('/tambah_pinjaman', [MemberController::class, 'tambah_pinjaman'])->name('tambah.pinjaman');
        Route::post('/insert/pinjaman', [MemberController::class, 'create'])->name('store.pinjaman');
        Route::get('/delete/pinjaman/{id}', [MemberController::class, 'destroy'])->name('delete.pinjaman');
    });
    // =========================================================================================================================================================
    // End Member Routing
    // =========================================================================================================================================================

}
