<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome')->name('home');
Route::view('/', 'landing')->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('dashboard', 'pages::dashboard')->name('dashboard');

    route::prefix('persediaan')
        ->name('persediaan.')
        ->group(function () {
            Route::livewire('/alat', 'pages::persediaan.alat')->name('alat');
            Route::livewire('/cair', 'pages::persediaan.cair')->name('cair');
            Route::livewire('/gas', 'pages::persediaan.gas')->name('gas');
            Route::livewire('/padat', 'pages::persediaan.padat')->name('padat');
        });

    route::prefix('laporan')
        ->name('laporan.')
        ->group(function () {
            Route::livewire('/kerusakan', 'pages::laporan.kerusakan')->name('kerusakan');
        });

    route::prefix('settings')
        ->name('setting.')
        ->group(function () {
            Route::livewire('/laboratorium', 'pages::settings.laboratorium')->name('laboratorium');
            Route::livewire('/satuan', 'pages::settings.satuan')->name('satuan');
        });
});

require __DIR__ . '/settings.php';
