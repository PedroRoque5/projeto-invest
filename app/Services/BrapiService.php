<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrapiService
{
    protected $token;

    public function __construct()
    {
        $this->token = env('BRAPI_TOKEN');
    }

    public function getCotacoes(array $tickers)
    {
        $symbols = implode(',', $tickers);
        $url = "https://brapi.dev/api/quote/{$symbols}?token={$this->token}";

        $response = Http::get($url);
        $data = $response->json();

        if (!isset($data['results'])) {
            return ['error' => 'Não foi possível obter as cotações.', 'debug' => $data];
        }

        $cotacoes = [];

        foreach ($data['results'] as $result) {
            $cotacoes[] = [
                'ticker' => $result['symbol'] ?? 'N/A',
                'nome' => $result['longName'] ?? 'Desconhecido',
                'preco' => $result['regularMarketPrice'] ?? 0.00,
                'variacao' => ($result['regularMarketChangePercent'] ?? 0) . '%',
                'moeda' => $result['currency'] ?? 'BRL' 
            ];
        }

        return $cotacoes;
        
    }
}
