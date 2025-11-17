<?php

use App\Http\Controllers\kategoriController;
use App\Models\kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\kalkulatorController;
use App\Http\Controllers\AuthCustomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\KategoriController as AdminKategoriController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/auth', function () {
    return view('auth.index');
});

Route::get('/login', [AuthCustomController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthCustomController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthCustomController::class, 'register'])->name('auth.register');
Route::match(['GET','POST'], '/logout', [AuthCustomController::class, 'logout'])
    ->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/kalkulator', [kalkulatorController::class, 'showUser'])->name('kalkulator');
Route::get('/menu', [MenuController::class, 'showUser'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'showDetail'])->name('menu.show');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::match(['get', 'post'], '/kalkulator', [HomeController::class, 'kalkulator'])->name('kalkulator');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('menu', AdminMenuController::class);
    Route::resource('artikel', AdminArtikelController::class);
    Route::resource('User', AdminUserController::class);
    Route::resource('kategori', AdminArtikelController::class);
    
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
});
