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

// Route::get('/', function () {
//     return view('index');
// });
// Route::group(['middleware' => ['auth']], function () {
// Route::any('/admin', [BahanController::class, 'show'])->name('admin');
// // Route::post('/admin', [BahanController::class, 'show'])->name('show');
// Route::get('/logout', [BahanController::class, 'logout'])->name('logout');
// Route::get('/admin/take/{id}', [BahanController::class, 'take'])->name('admin_take');
// Route::get('/admin/put/{id}', [BahanController::class, 'restok'])->name('restok');
// Route::post('/saveActiveTab', function (Request $request) {
// $activeTabText = $request->input('activeTabText');
// session()->put('activeTabText', $activeTabText);
// return response()->json(['status' => 'success']);
// });
// });
// Route::post('/', [BahanController::class, 'show'])->name('show');
// Route::any('/', [BahanController::class, 'show'])->name('show');
Route::any('/', [MenuController::class, 'landing'])->name('landing');
// Route::get('/', [MahasiswaController::class, 'show'])->name('show_mahasiswa');
Route::get('/logbook', [MahasiswaController::class, 'show'])->name('show_mahasiswa');
Route::post('/import', [MahasiswaController::class, 'import'])->name('import_mahasiswa');

Route::get('/menu', [MenuController::class, 'show'])->name('show-menu');

Route::get('/cair', [BahanController::class, 'showCair'])->name('show-cair');
Route::get('/padat', [BahanController::class, 'showPadat'])->name('show-padat');
Route::get('/alat', [BahanController::class, 'showAlat'])->name('show-alat');

Route::post('/login', [MenuController::class, 'login'])->name('login');

// Route::group(['middleware' => ['guest']], function () {

Route::post('/take/{id}', [BahanController::class, 'storeTake'])->name('store_take');
Route::post('/put/{id}', [BahanController::class, 'storePut'])->name('store_put');

Route::post('/menu', [MenuController::class, 'show'])->name('show-menu');


Route::get('/transaksi', [TransaksiController::class, 'show'])->name('show-transaksi');
Route::get('/history', [TransaksiController::class, 'show'])->name('show-history');

Route::post('/logbook', [MenuController::class, 'logbook'])->name('logbook');

Route::get('/logout', [MenuController::class, 'logout'])->name('logout');

Route::get('/ss', [BahanController::class, 'showAlat']);
// });
