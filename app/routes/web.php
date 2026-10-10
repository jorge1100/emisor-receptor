<?php

use App\Events\RemoteStyleUpdate;
use App\Http\Controllers\RemoteStyleController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/emisor'));
Route::get('/emisor', [RemoteStyleController::class,'emisor'])->name('emisor');
Route::post('/emitir', [RemoteStyleController::class,'emitir'])->name('emitir');
Route::get('/receptor', [RemoteStyleController::class, 'receptor'])->name('receptor');

// Prueba automatizada del broadcasting (dev): dispara el evento real.
Route::get('/broadcast-test', function () {
    broadcast(new RemoteStyleUpdate('Hola Reverb', 'color:red'));
    return response()->json(['ok' => true, 'channel' => 'style-channel']);
});
