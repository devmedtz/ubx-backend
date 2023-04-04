<?php

use App\Http\Controllers\DiamondController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DiamondController::class, 'index'])->name('home');

Route::get('/diamonds', [DiamondController::class, 'getDiamonds'])->name('get_diamonds');

Route::post('/import', [DiamondController::class, 'import'])->name('import');

Route::get('/export', [DiamondController::class, 'export'])->name('export');

