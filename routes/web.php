<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PembimbingLapanganController;
use App\Http\Controllers\SiswaController;
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
    return view('index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){return view('dashboard.index');})->name('dashboard');
    Route::resource('/absensi', AbsensiController::class);
    Route::get('siswa/edit/{id}','App\Http\Controllers\SiswaController@edit');
    Route::post('siswa/update','App\Http\Controllers\SiswaController@update');
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/pembimbing-lapangan', PembimbingLapanganController::class);
    Route::get('pembimbing-lapangan/edit/{id}','App\Http\Controllers\PembimbingLapanganController@edit');
    Route::post('pembimbing-lapangan/update','App\Http\Controllers\PembimbingLapanganController@update');
    Route::resource('/nilai', NilaiController::class);
    Route::resource('/logbook', LogbookController::class);
});