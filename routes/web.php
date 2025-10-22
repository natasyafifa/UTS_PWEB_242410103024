<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login.form');
Route::post('/login', [PageController::class, 'handleLogin'])->name('login.handle');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/album/{id}', [PageController::class, 'album'])->name('album.show');

Route::match(['get', 'post'], '/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/logout', [PageController::class, 'logout'])->name('logout');

    