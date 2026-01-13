<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KerjaanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('landing-page.index');
// });
// ubah ke dashboardcontroller
Route::get('/', [DashboardController::class, 'landingPage'])->name('landingPage');

// route login menggunakan authcontroller
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout']);

// contact.send (Pindahkan keluar dari auth agar tamu bisa kirim pesan)
Route::post('/contact', [DashboardController::class, 'send'])->name('contact.send');

// newsletter.subscribe
    Route::post('/newsletter/subscribe', [DashboardController::class, 'subscribe'])->name('newsletter.subscribe');

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
    Route::post('/kerjaan/store', [KerjaanController::class, 'store'])->name('admin.kerjaan.store');
    // detail
    Route::get('/kerjaan/detail/{id}', [KerjaanController::class, 'show'])->name('admin.kerjaan.show');
    Route::get('/kerjaan/{id}/edit', [KerjaanController::class, 'edit'])->name('admin.kerjaan.edit');
    Route::put('/kerjaan/{id}', [KerjaanController::class, 'update'])->name('admin.kerjaan.update');
    Route::delete('/kerjaan/{id}', [KerjaanController::class, 'destroy'])->name('admin.kerjaan.destroy');
    Route::get('/kerjaan/proses', [KerjaanController::class, 'proses'])->name('admin.proses');
    Route::get('/kerjaan/selesai', [KerjaanController::class, 'selesai'])->name('admin.selesai');
    Route::get('/kerjaan/batal', [KerjaanController::class, 'batal'])->name('admin.batal');
    Route::post('/kerjaan/{id}/update-status', [KerjaanController::class, 'updateStatus'])->name('admin.kerjaan.update-status');
    // admin.kerjaan.revisi
    Route::post('/kerjaan/revisi/{id}', [KerjaanController::class, 'revisi'])->name('admin.kerjaan.revisi');
    
    


    Route::get('/testimoni', [KerjaanController::class, 'testimoni'])->name('admin.testimoni');
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('admin.testimoni.create');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('admin.testimoni.store');
    Route::get('/testimoni/{id}/edit', [TestimoniController::class, 'edit'])->name('admin.testimoni.edit');
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update'])->name('admin.testimoni.update');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');

    Route::get('/portofolio', [KerjaanController::class, 'portofolio'])->name('admin.portofolio');
    Route::get('/portofolio/create', [PortofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('/', [PortofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::get('/portofolio/{id}/edit', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('/portofolio/{id}', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('/portofolio/{id}', [PortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');
    
    
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('admin.subscribers');
    Route::get('/subscribers/create', [SubscriberController::class, 'create'])->name('admin.subscribers.create');
    Route::post('/subscribers/store', [SubscriberController::class, 'store'])->name('admin.subscribers.store');
    Route::get('/subscribers/{id}/edit', [SubscriberController::class, 'edit'])->name('admin.subscribers.edit');
    Route::put('/subscribers/update/{id}', [SubscriberController::class, 'update'])->name('admin.subscribers.update');
    Route::delete('/subscribers/destroy/{id}', [SubscriberController::class, 'destroy'])->name('admin.subscribers.destroy');
    

});
