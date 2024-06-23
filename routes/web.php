<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PengembalianMobilController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware('auth');

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::singleton('profile', ProfileController::class);
    Route::resource('user', UserControler::class)->middleware('can:admin');
    Route::resource('mobil', MobilController::class);
    Route::resource('pinjam', PinjamController::class);
    Route::get('pinjam/{pinjam}/print', [PinjamController::class, 'printInvoice'])->name('pinjam.print');
    Route::resource('pengembalianmobil', PengembalianMobilController::class);
    Route::get('pengembalianmobil/detail/{id}', [PengembalianMobilController::class, 'detail'])->name('pengembalianmobil.detail');
    Route::get('pengembalianmobil/cetakInvoice/{pengembalianMobil}', [PengembalianMobilController::class, 'cetakInvoice'])->name('pengembalianmobil.cetakInvoice');
});

