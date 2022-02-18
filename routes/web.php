<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/golongan', [AdminController::class, 'golongan'])->name('golongan');
    Route::post('/golongan', [AdminController::class, 'golonganTambah'])->name('golongan.tambah');
    Route::delete('/golongan/{id}', [AdminController::class, 'golonganHapus'])->name('golongan.hapus');

    Route::get('/tipe-golongan', [AdminController::class, 'tipeGolongan'])->name('tipe.golongan');
    Route::post('/tipe-golongan', [AdminController::class, 'tipeGolonganTambah'])->name('tipe.golongan.tambah');
    Route::delete('/tipe-golongan/{id}', [AdminController::class, 'tipeGolonganHapus'])->name('tipe.golongan.hapus');

    Route::get('/stok-darah', [AdminController::class, 'stokDarah'])->name('stok.darah');
    Route::post('/stok-darah', [AdminController::class, 'stokDarahTambah'])->name('stok.darah.tambah');
    Route::get('/stok-darah/{id}', [AdminController::class, 'stokDarahEdit'])->name('stok.darah.edit');
    Route::put('/stok-darah/{id}', [AdminController::class, 'stokDarahUpdate'])->name('stok.darah.update');
    Route::delete('/stok-darah/{id}', [AdminController::class, 'stokDarahHapus'])->name('stok.darah.hapus');

    Route::get('/data-pendonor', [AdminController::class, 'dataPendonor'])->name('data.pendonor');
    Route::delete('/data-pendonor/{id}', [AdminController::class, 'dataPendonorHapus'])->name('data.pendonor.hapus');

    Route::get('/jadwal-donor', [AdminController::class, 'jadwalDonor'])->name('jadwal.donor');
    Route::post('/jadwal-donor', [AdminController::class, 'jadwalDonorTambah'])->name('jadwal.donor.tambah');
    Route::delete('/jadwal-donor/{id}', [AdminController::class, 'jadwalDonorHapus'])->name('jadwal.donor.hapus');

    Route::get('/chat', [AdminController::class, 'chat'])->name('chat');
    Route::get('/chat/{id}', [AdminController::class, 'chatUser'])->name('chat-user');

    Route::get('/manajemen-user', [AdminController::class, 'manajemenUser'])->name('manajemen.user');
    Route::get('/manajemen-user/edit/{id}', [AdminController::class, 'manajemenUserEdit'])->name('manajemen.user.edit');
    Route::put('/manajemen-user/update/{id}', [AdminController::class, 'manajemenUserUpdate'])->name('manajemen.user.update');

    Route::delete('/manajemen-user/{id}', [AdminController::class, 'manajemenUserHapus'])->name('manajemen.user.hapus');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile.update');



    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// hashed url for ajax
Route::middleware('auth')->group(function () {
    Route::get('/' . md5('chat') . '/data', [AdminController::class, 'chatUserData'])->name('chat-user-data');
    Route::post('/' . md5('chat') . '/{id}', [AdminController::class, 'chatSend'])->name('chat-send');
    Route::get('/' . md5('chat') . '/{id}/data', [AdminController::class, 'chatData'])->name('chat-data');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
});
