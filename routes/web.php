<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* 
    Register Routes 
*/
Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('registerProses', [RegisterController::class, 'create'])->name('registerProses');
});


/* 
    Login Routes 
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('loginProses', [LoginController::class, 'loginProses'])->name('loginProses');
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

/* 
    Admin Routes 
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'userAkses:admin'], 'as' => 'admin/'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran');
});

/* 
    User Routes 
*/

Route::middleware(['auth', 'userAkses:user'])->group(function () {
    Route::get('dashboard', [UsersController::class, 'dashboard'])->name('dashboard');

    Route::get('pendaftaran', [UsersController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('createPendaftaran', [UsersController::class, 'create'])->name('createPendaftaran');
    Route::post('storePendaftaran', [UsersController::class, 'store'])->name('storePendaftaran');
    
});