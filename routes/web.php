<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
Route::get('admin/users/edit/{user}',[App\Http\Controllers\Admin\UserController::class, 'edit'] )->name('users.edit');
Route::put('admin/users/update/{user}',[App\Http\Controllers\Admin\UserController::class, 'update'] )->name('users.update');

Route::get('admin/users/show/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');

Route::get('admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
Route::post('admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
