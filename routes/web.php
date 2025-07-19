<?php

use App\Http\Controllers\Master\ProfilSekolahController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['guest'])->group(function () {
  Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.store');
  });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard.home');
  })->name('dashboard');

  Route::name('master.')->group(function() {
    Route::controller(ProfilSekolahController::class)->group(function() {
      Route::get('/profil-sekolah', 'index')->name('profilSekolah');
      Route::post('/profil-sekolah', 'update')->name('profilSekolahUpdate');
    })->middleware(RoleMiddleware::class.'role:Super Admin,Admin');
  });
});