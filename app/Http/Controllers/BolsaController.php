<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BolsaService;

class BolsaController extends Controller
{
    protected $bolsaService;

    public function __construct(BolsaService $bolsaService)
    {
        $this->bolsaService = $bolsaService;
    }

    public function getCotacoes($ticker = null)
    {
        if ($ticker) {
            // Se passar um ticker, busca apenas esse ativo
            return response()->json($this->bolsaService->getCotacao($ticker));
        }

        // Caso contrário, busca múltiplas ações
        return response()->json($this->bolsaService->getTodasCotacoes());
    }
}
