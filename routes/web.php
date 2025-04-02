<?php

use Illuminate\Support\Facades\Route;
use App\Services\AlphaVantageService;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/teste',  function () {
    return view('teste');
});

Route::get('/todas-cotacoes', function () {
    $service = new AlphaVantageService();
    return response()->json($service->getTodasCotacoes());
});
