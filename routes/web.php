<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\Laporan;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use App\Livewire\User;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\NewsController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user', User::class)->middleware(['auth'])->name('user');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);
Route::get('/myPDF', [PDFController::class, 'generatePDF']);
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/news', [NewsController::class, 'GetNews']);
