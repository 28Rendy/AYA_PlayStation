<?php

use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataPemasukanController;
use App\Http\Controllers\DataPengeluaranController;
use App\Http\Controllers\DataPerentalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataRuangController;
use App\Http\Controllers\UlasanController;
use App\Models\DataPerental;
use App\Models\Ulasan;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend Multi-Page Routes
Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/tentang-kami', 'FrontendController@about')->name('frontend.about');
Route::get('/keunggulan', 'FrontendController@features')->name('frontend.features');
Route::get('/fasilitas', 'FrontendController@facilities')->name('frontend.facilities');
Route::get('/galeri', 'FrontendController@gallery')->name('frontend.gallery');
Route::get('/daftar-ruang', 'FrontendController@rooms')->name('frontend.rooms');
Route::get('/kontak', 'FrontendController@contact')->name('frontend.contact');

// Login routes
// Login routes
// Route::get('/login2', [LoginController::class, 'index'])->name('login');

// Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
// Route::get('/register', [LoginController::class, 'register'])->name('register');
// Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// // Admin routes with authentication middleware
// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {


//     Route::get('Dadmin', function () {
//         return view('Dadmin');
//     });
//     Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

//     Route::get('DTruang', function () {
//         return view('DTruang');
//     });

//     Route::get('pemasukan', function () {
//         return view('pemasukan');
//     });

//     Route::get('pengeluaran', function () {
//         return view('pengeluaran');
//     });

//     Route::get('DTperental', function () {
//         return view('DTperental');
//     });

//     Route::get('DTadmin', function () {
//         return view('DTadmin');
//     });
// });


Auth::routes();

// Portal Pelanggan
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/pelanggan/dashboard', 'PelangganController@index')->name('pelanggan.dashboard');
    Route::post('/pelanggan/pesan-ruang', 'PelangganController@pesanRuang')->name('pelanggan.pesanRuang');
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/DTruang', 'DataRuangController');
    Route::resource('/pemasukan', 'DataPemasukanController');
    Route::resource('/DTperental', 'DataPerentalController');
    Route::resource('/pengeluaran', 'DataPengeluaranController');
    Route::resource('/DTadmin', 'DataAdminController');
    Route::resource('/DTpelanggan', 'DataPelangganController');
    Route::resource('/DTps', 'DataPsController');
    Route::resource('/DTpenyewa', 'DataPenyewaController');
    Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::delete('ulasan/{nama}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
    Route::get('kas-masuk', [DataPerentalController::class, 'kasMasuk'])->name('kasMasuk');
    Route::get('ubah-periode/{tanggal}', [DataPerentalController::class, 'ubahPeriode'])->name('ubahPeriode');
    Route::post('ubah-periode', [DataPerentalController::class, 'ubahPeriode'])->name('ubahPeriode');
    Route::get('/pengaturan-web', 'PengaturanWebController@index')->name('pengaturan-web.index');
    Route::post('/pengaturan-web', 'PengaturanWebController@update')->name('pengaturan-web.update');
    Route::post('/konten-fasilitas', 'KontenFasilitasController@store')->name('konten-fasilitas.store');
    Route::put('/konten-fasilitas/{id}', 'KontenFasilitasController@update')->name('konten-fasilitas.update');
    Route::delete('/konten-fasilitas/{id}', 'KontenFasilitasController@destroy')->name('konten-fasilitas.destroy');
    Route::post('/galeri-foto', 'GaleriFotoController@store')->name('galeri-foto.store');
    Route::put('/galeri-foto/{id}', 'GaleriFotoController@update')->name('galeri-foto.update');
    Route::delete('/galeri-foto/{id}', 'GaleriFotoController@destroy')->name('galeri-foto.destroy');
});

Route::post('ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
Route::post('/ubahPeriode', [DataPerentalController::class, 'ubahPeriode'])->name('ubahPeriode');
