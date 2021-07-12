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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\BookController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('create');
Route::post('/store',  [App\Http\Controllers\BookController::class, 'store'])->name('store');
Route::get('/delete/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}',   [App\Http\Controllers\BookController::class, 'edit'])->name('edit');
Route::put('/update/{id}',    [App\Http\Controllers\BookController::class, 'update'])->name('update');


//jenis buku
Route::get('/layouts2/index', [App\Http\Controllers\DBookController::class, 'index'])->name('index');
