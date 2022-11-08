<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'login']);
Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
Route::get('/show-table', [BookController::class, 'showTable'])->name('show-table');
Route::get('/show-menu', [BookController::class, 'showMenu'])->name('show-menu');

Route::post('/tambah-buku', [BookController::class, 'tambahBuku']);
Route::delete('/hapus-buku', [BookController::class, 'hapusBuku']);
Route::post('/edit-buku', [BookController::class, 'editBuku']);
