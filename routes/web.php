<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiPbsController;
use App\Http\Controllers\NilaiTkjController;
use App\Http\Controllers\NilaiTkroController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PembimbingLapanganController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\siprakerin\AbsensiSiswaController;
use App\Http\Controllers\siprakerin\BeritaController as SiprakerinBeritaController;
use App\Http\Controllers\siprakerin\DownloadController;
use App\Http\Controllers\siprakerin\HistoryController;
use App\Http\Controllers\siprakerin\HomeController;
use App\Http\Controllers\siprakerin\LaporanController as SiprakerinLaporanController;
use App\Http\Controllers\siprakerin\LogbookController as SiprakerinLogbookController;
use App\Http\Controllers\siprakerin\MitraController as SiprakerinMitraController;
use App\Http\Controllers\siprakerin\NilaiSiswaController;
use App\Http\Controllers\siprakerin\PendaftaranController;
use App\Http\Controllers\siprakerin\PrakerinController as SiprakerinPrakerinController;
use App\Http\Controllers\siprakerin\ProfilController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::resource('/register',RegisterController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::resource('/home',HomeController::class);
Route::resource('/berita',SiprakerinBeritaController::class);
Route::resource('/mitra',SiprakerinMitraController::class);

Route::group(['middleware' => ['admin']], function(){
    Route::get('/dashboard', function(){return view('dashboard.index');})->name('dashboard');
    Route::resource('/absensi', AbsensiController::class);
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/pembimbing-lapangan', PembimbingLapanganController::class);
    Route::resource('/nilai-tkj', NilaiTkjController::class);
    Route::resource('/nilai-tkro', NilaiTkroController::class);
    Route::resource('/nilai-pbs', NilaiPbsController::class);
    Route::resource('/data-guru', GuruController::class);
    Route::resource('/logbook', LogbookController::class);
    Route::resource('/data-prakerin', PrakerinController::class);
    Route::resource('/data-berita', BeritaController::class);
    Route::resource('/data-mitra', MitraController::class);
    Route::resource('/berkas', BerkasController::class);
    Route::resource('/status',StatusController::class);
    Route::resource('/kelas',KelasController::class);
    Route::resource('/data-laporan',LaporanController::class);
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/ubah-password', 'App\Http\Controllers\ChangePasswordController@showChangePasswordForm')->name('password.change');
    Route::post('/ubah-password', 'App\Http\Controllers\ChangePasswordController@changePassword')->name('password.update');
    Route::resource('/profil',ProfilController::class);
    Route::resource('/daftar-prakerin',PendaftaranController::class);
    Route::resource('/logbooks',SiprakerinLogbookController::class);
    Route::resource('/absensi-siswa',AbsensiSiswaController::class);
    Route::resource('/history',HistoryController::class);
    Route::resource('/download',DownloadController::class);
    Route::resource('/nilai-siswa',NilaiSiswaController::class);
    Route::resource('/laporan-akhir',SiprakerinLaporanController::class);
});
