<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BolsaController;
use App\Services\AlphaVantageService;


Route::get('/teste-api', function () {
    return response()->json(['message' => 'Rota API funcionando!']);
});

