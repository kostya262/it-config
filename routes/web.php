<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('/email-check', [App\Http\Controllers\Auth\RegisterController::class, 'checkEmailUnique'])->name('checkEmailUnique');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
