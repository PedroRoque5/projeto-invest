<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BolsaController;

Route::get('/cotacao/{ticker?}', [BolsaController::class, 'getCotacoes']);

Route::get('/teste-api', function () {
    return response()->json(['message' => 'Rota API funcionando!']);
});