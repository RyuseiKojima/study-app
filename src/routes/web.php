<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClipController;

include __DIR__ . '/admin.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Clip
Route::prefix('clips')->group(function () {
  Route::get('/', [ClipController::class, 'index'])->name('clips.index');
  Route::get('/create', [ClipController::class, 'create'])->name('clips.create');
  Route::post('/store', [ClipController::class, 'store'])->name('clips.store');
  Route::get('/{id}', [ClipController::class, 'detail'])->name('clips.detail');
  Route::get('/{id}/edit', [ClipController::class, 'edit'])->name('clips.edit');
  Route::patch('/{id}/update', [ClipController::class, 'update'])->name('clips.update');
  Route::delete('/{id}/destroy', [ClipController::class, 'destroy'])->name('clips.destroy');
});
