<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),
    'verified'])->group(function () {
      Route::resource('playlists', PlaylistController::class)->except(['edit', 'update']);

      Route::get('apikey', [ApiController::class, 'index'])->name('apikey.index');
      Route::get('apikey/create', [ApiController::class, 'create'])->name('apikey.create');
      Route::post('apikey', [ApiController::class, 'store'])->name('apikey.store');


      Route::middleware(['admin'])->group(function () {
        Route::get('tracks/create', [TrackController::class, 'create'])->name('tracks.create');

        Route::post('tracks', [TrackController::class, 'store'])->name('tracks.store');
        Route::get('tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
        
        Route::put('tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
        Route::delete('tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');
    });
});
