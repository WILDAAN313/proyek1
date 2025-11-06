<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::match(['get', 'post'], '/kalkulator', [HomeController::class, 'kalkulator'])->name('kalkulator');


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('menu', AdminMenuController::class, ['as' => 'admin']);
    Route::resource('artikel', AdminArtikelController::class, ['as' => 'admin']);
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
});
