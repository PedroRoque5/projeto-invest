<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlphaVantageController;
use App\Services\AlphaVantageService;
use App\Http\Controllers\GraficController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/teste', [AlphaVantageController::class, 'teste'])->name('teste');


Route::get('/grafico', [GraficController::class, 'show']) -> name('grafico');