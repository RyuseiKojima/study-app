<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\ProfileController as ProfileOfAdminController;

Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->middleware(['auth:admin', 'verified'])->name('dashboard');

  Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
  });

  require __DIR__ . '/admin.php';
});
