<?php

use Illuminate\Support\Facades\Route;
use App\Services\AlphaVantageService;
use App\Http\Controllers\AlphaVantageController;
use App\Http\Controllers\BrapiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', [AlphaVantageController::class, 'teste'])->name('teste');

Route::get('/cotacoes', [BrapiController::class, 'getCotacoes']);
