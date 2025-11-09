<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthCustomController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/auth', function () {
    return view('auth.auth');
});

Route::post('/auth/login', [AuthCustomController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthCustomController::class, 'register'])->name('auth.register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'showUser'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'showDetail'])->name('menu.show');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::match(['get', 'post'], '/kalkulator', [HomeController::class, 'kalkulator'])->name('kalkulator');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('menu', AdminMenuController::class);
    Route::resource('artikel', AdminArtikelController::class);
    
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
});