<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoController;

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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('user/login', [MainController::class, 'login'])->name('login');
Route::get('user/logout', [MainController::class, 'logout'])->name('logout')->middleware('logged');
Route::resource('producto', ProductoController::class);
Route::resource('tipo', TipoController::class);