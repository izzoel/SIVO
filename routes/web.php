<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [BahanController::class, 'showCair']);
Route::get('/take/{id}', [BahanController::class, 'upCair'])->name('takeCair');
Route::get('/login', [BahanController::class, 'login'])->name('login');
// Route::post('/login', [BahanController::class, 'login'])->name('login');
