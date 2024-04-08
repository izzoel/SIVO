<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TransaksiController;

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

Route::any('/', [MenuController::class, 'landing'])->name('landing');

Route::get('/logbook', [MahasiswaController::class, 'show'])->name('show_mahasiswa');
Route::post('/logbook', [MenuController::class, 'logbook'])->name('logbook');

Route::post('/login', [MenuController::class, 'login'])->name('login');
// Route::post('/import', [MahasiswaController::class, 'import'])->name('import_mahasiswa');

Route::middleware('check.user.activity')->group(function () {

    Route::get('/cair', [BahanController::class, 'showCair'])->name('show-cair');
    Route::get('/padat', [BahanController::class, 'showPadat'])->name('show-padat');
    Route::get('/alat', [BahanController::class, 'showAlat'])->name('show-alat');

    // Route::group(['middleware' => ['guest']], function () {

    Route::post('/take/{id}', [BahanController::class, 'storeTake'])->name('store_take');
    Route::post('/put/{id}', [BahanController::class, 'storePut'])->name('store_put');

    Route::get('/menu', [MenuController::class, 'show'])->name('show-menu');
    Route::post('/menu', [MenuController::class, 'show'])->name('show-menu');

    Route::get('/transaksi', [TransaksiController::class, 'show'])->name('show-transaksi');
    Route::get('/history', [TransaksiController::class, 'show'])->name('show-history');


    Route::get('/logout', [MenuController::class, 'logout'])->name('logout');

    // Route::get('/ss', [BahanController::class, 'showAlat']);
});
// });
