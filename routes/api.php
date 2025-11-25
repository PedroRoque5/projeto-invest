<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// imports removidos: BolsaController inexistente e serviço não utilizado


Route::get('/teste-api', function () {
    return response()->json(['message' => 'Rota API funcionando!']);
});

