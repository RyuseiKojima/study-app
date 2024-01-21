<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;

Route::prefix('admin')->middleware('admins:admins')->group(function () {
  Route::get('/', [HomeController::class, 'home'])->name('admin.home');
  Route::get('logout', [LoginController::class, 'logout'])->name('admin.login.logout');
});

Route::prefix('admin')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('admin.login.index');
  Route::post('login', [LoginController::class, 'login'])->name('admin.login.login');
});
