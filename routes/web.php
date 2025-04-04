<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlphaVantageController;
use App\Services\AlphaVantageService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/teste', [AlphaVantageController::class, 'teste'])->name('teste');
