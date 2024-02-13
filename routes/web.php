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
Route::group(['middleware' => ['auth']], function () {
    Route::any('/admin', [BahanController::class, 'show'])->name('admin');
    // Route::post('/admin', [BahanController::class, 'show'])->name('show');
    Route::get('/logout', [BahanController::class, 'logout'])->name('logout');
    Route::get('/admin/take/{id}', [BahanController::class, 'take'])->name('admin_take');
    Route::get('/admin/put/{id}', [BahanController::class, 'restok'])->name('restok');
    // Route::post('/saveActiveTab', function (Request $request) {
    // $activeTabText = $request->input('activeTabText');
    // session()->put('activeTabText', $activeTabText);
    // return response()->json(['status' => 'success']);
    // });
});
// Route::post('/', [BahanController::class, 'show'])->name('show');
Route::any('/', [BahanController::class, 'show'])->name('show');
Route::group(['middleware' => ['guest']], function () {
    // Route::get('/take/{id}', [BahanController::class, 'upCair'])->name('takeCair');
    Route::get('/take/{id}', [BahanController::class, 'take'])->name('take');
    Route::get('/login', [BahanController::class, 'login'])->name('login');
    Route::post('/login', [BahanController::class, 'login'])->name('login');
    // Route::post('/login', [BahanController::class, 'login'])->name('login');
});
