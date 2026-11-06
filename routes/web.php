<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('students', StudentController::class)
        ->except(['show', 'destroy']);

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('students.destroy');
});