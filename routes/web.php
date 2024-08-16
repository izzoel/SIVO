<?php

use App\Models\Transaksi;
use App\Models\Laboratorium;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaboratoriumController;

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



Route::get('/cair', [BahanController::class, 'showCair'])->name('show-cair');
Route::get('/padat', [BahanController::class, 'showPadat'])->name('show-padat');
Route::get('/alat', [BahanController::class, 'showAlat'])->name('show-alat');

Route::get('/bahan/{jenis}', [BahanController::class, 'showBahan'])->name('show-bahan');
Route::get('/setting/{jenis}', [BahanController::class, 'showSetting'])->name('show-setting');
Route::post('/take', [BahanController::class, 'take'])->name('take');
Route::post('/put', [BahanController::class, 'put'])->name('put');
Route::post('/set', [BahanController::class, 'set'])->name('set');



Route::get('/transaksi', [TransaksiController::class, 'show'])->name('show-transaksi');
Route::get('/history', [TransaksiController::class, 'show'])->name('show-history');

Route::post('/purge/cari', [MenuController::class, 'purge'])->name('purge-cari');

// Route::get('/menu/', [MenuController::class, 'show'])->name('show-menu');
// Route::post('/menu', [MenuController::class, 'show'])->name('show-menu');

Route::post('/store/{jenis}', [BahanController::class, 'store'])->name('store-bahan');

Route::get('/menu/cair', [MenuController::class, 'showCair'])->name('menu-cair');
Route::put('/menu/cair/update/{id}', [BahanController::class, 'updateCair'])->name('update-cair');
Route::get('/menu/cair/destroy/{id}', [BahanController::class, 'destroyCair'])->name('destroy-cair');

Route::get('/menu/padat', [MenuController::class, 'showPadat'])->name('menu-padat');
Route::put('/menu/padat/update/{id}', [BahanController::class, 'updatePadat'])->name('update-padat');
Route::get('/menu/padat/destroy/{id}', [BahanController::class, 'destroyPadat'])->name('destroy-padat');

Route::get('/menu/alat', [MenuController::class, 'showAlat'])->name('menu-alat');
Route::put('/menu/alat/update/{id}', [BahanController::class, 'updateAlat'])->name('update-alat');
Route::get('/menu/alat/destroy/{id}', [BahanController::class, 'destroyAlat'])->name('destroy-alat');

Route::get('/menu/kerusakan', [MenuController::class, 'showKerusakan'])->name('menu-kerusakan');
Route::post('/menu/kerusakan/store', [KerusakanController::class, 'store'])->name('store-kerusakan');
Route::put('/menu/kerusakan/update/{id}', [KerusakanController::class, 'update'])->name('update-kerusakan');
Route::get('/menu/kerusakan/destroy/{id}', [KerusakanController::class, 'destroy'])->name('destroy-kerusakan');


// Route::get('/setting/', [MenuController::class, 'setting'])->name('show-setting');

Route::get('/setting/satuan/', [MenuController::class, 'settingSatuan'])->name('setting-satuan');
Route::post('/setting/satuan/store', [SatuanController::class, 'store'])->name('store-satuan');
Route::put('/setting/satuan/update/{id}', [SatuanController::class, 'update'])->name('update-satuan');
Route::get('/setting/satuan/destroy/{id}', [SatuanController::class, 'destroy'])->name('destroy-satuan');

Route::get('/setting/lokasi/', [MenuController::class, 'settingLokasi'])->name('setting-lokasi');
Route::post('/setting/lokasi/store', [LokasiController::class, 'store'])->name('store-lokasi');
Route::put('/setting/lokasi/update/{id}', [LokasiController::class, 'update'])->name('update-lokasi');
Route::get('/setting/lokasi/destroy/{id}', [LokasiController::class, 'destroy'])->name('destroy-lokasi');

Route::get('/setting/laboratorium/', [MenuController::class, 'settingLaboratorium'])->name('setting-laboratorium');
Route::post('/setting/laboratorium/store', [LaboratoriumController::class, 'store'])->name('store-laboratorium');
Route::put('/setting/laboratorium/update/{id}', [LaboratoriumController::class, 'update'])->name('update-laboratorium');
Route::get('/setting/laboratorium/destroy/{id}', [LaboratoriumController::class, 'destroy'])->name('destroy-laboratorium');


Route::get('/logout', [MenuController::class, 'logout'])->name('logout');


// Route::post('/import/bahan/{padat}', [BahanController::class, 'import'])->name('import-padat');

Route::post('/import/bahan/{jenis}', [BahanController::class, 'import'])->name('import-bahan');
Route::post('/import/kerusakan', [KerusakanController::class, 'import'])->name('import-kerusakan');
