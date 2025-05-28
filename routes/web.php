<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdresController;

Route::middleware('auth')->group(function () {
    Route::resource('adressen', AdresController::class)->parameters(['adressen' => 'adres']);
});

Auth::routes();

Route::get('/', fn () => redirect()->route('adressen.index'));
Route::get('/home', fn () => redirect()->route('adressen.index'));
