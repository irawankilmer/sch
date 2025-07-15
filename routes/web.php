<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group( function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Hello World';
    });
});
