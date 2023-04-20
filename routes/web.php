<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
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
    Route::post('/absensi',[AbsensiController::class, 'store']);
});