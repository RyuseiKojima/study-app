<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Mypage\HomeController;

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

Route::prefix('mypage')->group(function () {
  Route::get('/', [HomeController::class, 'dashboard'])->name('mypage.dashboard');
});

Route::prefix('mypage')->middleware('auth.members:members')->group(function () {
  Route::get('/', [HomeController::class, 'dashboard'])->name('mypage.dashboard');
});
