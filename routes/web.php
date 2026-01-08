<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KerjaanController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page.index');
});

// route login menggunakan authcontroller
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout']);

// contact.send (Pindahkan keluar dari auth agar tamu bisa kirim pesan)
Route::post('/contact', [DashboardController::class, 'send'])->name('contact.send');

// midleware auth groub didalemmnya dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    // admin
    Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

    Route::get('/kerjaan/create', [KerjaanController::class, 'create'])->name('admin.kerjaan.create');
    Route::post('/kerjaan', [KerjaanController::class, 'store'])->name('admin.kerjaan.store');
    Route::get('/kerjaan/{id}/edit', [KerjaanController::class, 'edit'])->name('admin.kerjaan.edit');
    Route::put('/kerjaan/{id}', [KerjaanController::class, 'update'])->name('admin.kerjaan.update');
    Route::delete('/kerjaan/{id}', [KerjaanController::class, 'destroy'])->name('admin.kerjaan.destroy');
    Route::get('/kerjaan/proses', [KerjaanController::class, 'proses'])->name('admin.proses');
    Route::get('/kerjaan/selesai', [KerjaanController::class, 'selesai'])->name('admin.selesai');
    Route::get('/kerjaan/batal', [KerjaanController::class, 'batal'])->name('admin.batal');
    Route::get('/testimoni', [KerjaanController::class, 'testimoni'])->name('admin.testimoni');
    Route::get('/portofolio', [KerjaanController::class, 'portofolio'])->name('admin.portofolio');
     

    

});
