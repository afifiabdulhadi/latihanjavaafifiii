<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SpesifikasiController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\User2Controller;
 

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
    return view('welcome');
});

Route::get('/home', [ContenController::class, 'index']);
Route::resource('transaksi', TransaksiController::class);
Route::get('transaksi/pdf', [TransaksiController::class, 'generatePDF'])->name('transaksi.pdf');

Route::resource('foto', FotoController::class);
Route::get('spesifikasi/pdf', [SpesifikasiController::class, 'pdf'])->name('spesifikasi.pdf');
Route::resource('spesifikasi', SpesifikasiController::class)->except(['show']);
Route::put('spesifikasi/{id}', [SpesifikasiController::class, 'update'])->name('spesifikasi.update');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [ContenController::class, 'index'])->name('home.index')->middleware('auth');

Route::get('/changepassword',[UserController::class,'showChangePasswordForm'])->middleware('auth');
Route::post('/changepassword',[UserController::class,'changepassword'])->name('changepassword')->middleware('auth');

Route::resource('user', User2Controller::class);
Route::get('/user', [User2Controller::class, 'index'])->name('user.index');
