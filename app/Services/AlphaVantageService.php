<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AlphaVantageService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('ALPHA_VANTAGE_KEY');
    }

    public function getCotacao($ticker)
    {
        $url = "https://www.alphavantage.co/query";

        $response = Http::get($url, [
            'function' => 'GLOBAL_QUOTE',
            'symbol'   => $ticker,
            'apikey'   => $this->apiKey
        ]);

        $data = $response->json();

        // DEBUG: Verifica a resposta da API
        if (!isset($data['Global Quote'])) {
            return ['error' => 'Não foi possível obter a cotação.', 'debug' => $data];
        }

        return [
            'ticker' => $data['Global Quote']['01. symbol'] ?? $ticker,
            'preco'  => $data['Global Quote']['05. price'] ?? null,
            'moeda'  => 'USD'
        ];
    }
}

