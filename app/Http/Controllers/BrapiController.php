<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrapiService;

class BrapiController extends Controller
{
    protected $brapiService;

    public function __construct(BrapiService $brapiService)
    {
        $this->brapiService = $brapiService;
    }

    /**
     * Obtém as cotações de ações da B3 e retorna um JSON
     */
    public function getCotacoes()
    {
        // Lista de ativos que queremos consultar
        $tickers = ["PETR4", "VALE3", "ITUB4", "BBDC4"];

        // Busca as cotações usando o Service
        $cotacoes = $this->brapiService->getCotacoes($tickers);

        return response()->json($cotacoes);
    }
}
