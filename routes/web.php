<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\TempatMakan;
use App\Models\Kategori;
use App\Models\Promo;
use App\Models\Ulasan;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TempatMakanController;
use App\Http\Controllers\UlasanController;

// Halaman beranda
Route::get('/', function () {
    // Counts for stats section
    $tempatMakanCount = TempatMakan::count();
    $kategoriCount = Kategori::count();
    $ulasanCount = Ulasan::count();
    $promoCount = Promo::count();

    return view('welcome', compact('tempatMakanCount', 'kategoriCount', 'ulasanCount', 'promoCount'));
})->name('home');

// Auth login/logout
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Halaman dashboard
Route::get('/dashboard', function () {
    // Load data untuk dashboard
    $tempatMakans = TempatMakan::with('kategori')->latest()->take(6)->get();
    $kategoris = Kategori::latest()->take(8)->get();
    $promos = Promo::with('tempatMakan')->latest()->take(6)->get();
    $ulasans = Ulasan::with('tempatMakan')->latest()->take(6)->get();
    
    // Counts
    $tempatMakanCount = TempatMakan::count();
    $kategoriCount = Kategori::count();
    $ulasanCount = Ulasan::count();
    $promoCount = Promo::count();
    
    return view('dashboard', compact('tempatMakans', 'kategoris', 'promos', 'ulasans', 'tempatMakanCount', 'kategoriCount', 'ulasanCount', 'promoCount'));
})->name('dashboard');

// Route public untuk tempat makan 
Route::resource('tempat-makan', TempatMakanController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy', 'show'
]);

// Route public untuk kategori, promo, ulasan
Route::resource('kategori', KategoriController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('promo', PromoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('ulasan', UlasanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

// Middleware untuk route yang butuh login
Route::middleware(['auth'])->group(function () {
    // Admin/pemilik dapat mengakses selain index dan show (sudah diatur di atas)
    Route::resource('tempat-makan', TempatMakanController::class)->except(['index', 'show']);
    Route::resource('kategori', KategoriController::class)->except(['index', 'show']);
    Route::resource('promo', PromoController::class)->except(['index', 'show']);

    // Ulasan hanya bisa diedit/dihapus oleh user yang login
    Route::resource('ulasan', UlasanController::class)->only(['edit', 'update', 'destroy']);
});

