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
