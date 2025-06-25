<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlphaVantageController;
use App\Services\AlphaVantageService;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/teste', [AlphaVantageController::class, 'teste'])->name('teste');
