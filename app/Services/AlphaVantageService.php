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

    public function getTodasCotacoes()
    {
        // Lista de algumas ações da B3
        $tickers = [
            "PETR4.SA", "VALE3.SA", "ITUB4.SA", "BBDC4.SA", "ABEV3.SA",
            "WEGE3.SA", "MGLU3.SA", "BBAS3.SA", "B3SA3.SA", "RENT3.SA"
        ];

        $cotacoes = [];

        foreach ($tickers as $ticker) {
            $url = "https://www.alphavantage.co/query";
            $response = Http::get($url, [
                'function' => 'GLOBAL_QUOTE',
                'symbol'   => $ticker,
                'apikey'   => $this->apiKey
            ]);

            $data = $response->json();

            if (!$response->failed() && !empty($data['Global Quote'])) {
                $cotacoes[] = [
                    'ticker' => $data['Global Quote']['01. symbol'] ?? $ticker,
                    'preco'  => $data['Global Quote']['05. price'] ?? null,
                    'moeda'  => 'R$'
                ];
            }
        }

        return $cotacoes;
    }
}
