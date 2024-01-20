<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClipController;

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

Route::get('/', static function () {
  return view('welcome');
});

// Route::get('/admin/login', function () {
//   return view('admin/login');
// })->middleware('guest:admin');

// Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');
// Route::post('/admin/logout', [\App\Http\Controllers\LoginController::class, 'adminLogout'])->name('admin.logout');

// Route::get('/admin/dashboard', function () {
//   return view('admin/dashboard');
// })->middleware('auth:admin');

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
  Route::get('/', function () {
    return view('admin.welcome');
  });

  Route::get('login', 'Admin\Auth\LoginController')->name('admin.login');
  Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');

  Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
  Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');

  Route::get('password/rest', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
  Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
  Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

// Clip
Route::get('/clips', [ClipController::class, 'index'])->name('clips.index');
Route::get('/clips/create', [ClipController::class, 'create'])->name('clips.create');
Route::post('/clips/store', [ClipController::class, 'store'])->name('clips.store');
Route::get('/clips/{id}', [ClipController::class, 'detail'])->name('clips.detail');
Route::get('/clips/{id}/edit', [ClipController::class, 'edit'])->name('clips.edit');
Route::patch('/clips/{id}/update', [ClipController::class, 'update'])->name('clips.update');
Route::delete('/clips/{id}/destroy', [ClipController::class, 'destroy'])->name('clips.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
