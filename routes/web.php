<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperAdmin_dashboardController;
use App\Http\Controllers\SuperAdmin_adminController;
use App\Http\Controllers\SuperAdmin_masyarakatController;
use App\Http\Controllers\SuperAdmin_beritaController;
use App\Http\Controllers\SuperAdmin_pengaduanController;
use App\Http\Controllers\Admin_beritaController;
use App\Http\Controllers\Admin_PengaduanController;
use App\Http\Controllers\Admin_dashboardController;
use App\Http\Controllers\Masyarakat_pengaduanController;
use App\Http\Controllers\Masyarakat_dashboardController;
use App\Http\Controllers\Masyarakat_profileController;

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

Route::group(['prefix'=> 'superadmin',  'middleware'=> 'auth:superadmin'], function(){
    Route::resource('admin',SuperAdmin_adminController::class);
    Route::resource('masyarakat',SuperAdmin_masyarakatController::class);
    Route::resource('berita',SuperAdmin_beritaController::class);
    Route::resource('pengaduan',SuperAdmin_pengaduanController::class);
    Route::resource('dashboard',SuperAdmin_dashboardController::class);
});

Route::group(['prefix'=> 'masyarakat',  'middleware'=> 'auth:masyarakat'], function() {
    Route::resource('pengaduan-ms',Masyarakat_pengaduanController::class);
    Route::resource('profile-masyarakat',Masyarakat_profileController::class);
    
});

//ADMIN
Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()  {
    Route::resource('berita',Admin_beritaController::class);
    Route::resource('pengaduan',Admin_PengaduanController::class);
    Route::resource('dashboard',Admin_dashboardController::class);
   });

Route::get('login', function () {
    return view('login');
})->middleware('guest');

Route::post('/kirimdata',[LoginController::class,'masuk'])->name('login');
Route::get('/keluar',[LoginController::class,'keluar']);

// MENU HOME UTAMA
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentangkami', [HomeController::class, 'tentangkami'])->name('tentangkami');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

