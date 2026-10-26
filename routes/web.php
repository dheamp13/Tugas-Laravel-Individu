<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman utama langsung diarahkan ke Master Meja
Route::get('/', [MejaController::class, 'index'])->name('home');

// Resource route untuk Meja
Route::resource('meja', MejaController::class);
