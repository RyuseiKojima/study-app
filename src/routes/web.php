<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClipController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// 記事CRUD
Route::resource('clips', ClipController::class);

// いいねの作成と削除
Route::post('/like/{clipId}', [LikeController::class, 'store'])->name('likes.store');
Route::delete('/like/{clipId}', [LikeController::class, 'destroy'])->name('likes.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\Admin\ProfileController as ProfileOfAdminController;

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

// Language Switcher Route 言語切替用ルート
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
