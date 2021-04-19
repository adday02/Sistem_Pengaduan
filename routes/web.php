<?php

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
    return view('welcome');
});
Route::prefix('superadmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/admin', function () {
        return view('admin/admin');
    });
    Route::get('/masyarakat', function () {
        return view('admin/masyarakat');
    });
    Route::get('/pengaduan', function () {
        return view('admin/pengaduan');
    });
    Route::get('/berita', function () {
        return view('admin/berita');
    });
});

Route::prefix('masyarakat')->group(function () {
    Route::get('/pengaduan', function () {
        return view('masyarakat/pengaduan');
    });
    Route::get('/profile', function () {
        return view('masyarakat/profile');
    });
});

//ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    
    Route::get('/berita', function () {
        return view('admin/berita');
    });
    
    Route::get('/pengaduan', function () {
        return view('admin/pengaduan');
    });
   });


// MENU HOME UTAMA
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentangkami', [HomeController::class, 'tentangkami'])->name('tentangkami');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

