<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;

Route::middleware(['guest'])->group(function() {
    Route::controller(AuthController::class)->group( function() {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('login.store');
    });
});

Route::post('/logout', [AuthCOntroller::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard');
});
