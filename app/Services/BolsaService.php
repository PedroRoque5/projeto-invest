<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BolsaService
{
    public function getCotacao($ticker)
    {
        $url = "https://query1.finance.yahoo.com/v7/finance/quote?symbols={$ticker}";

        $response = Http::get($url);
        $data = $response->json();

        if ($response->failed() || empty($data['quoteResponse']['result'])) {
            return ['error' => 'Dados não encontrados'];
        }

        return [
            'ticker' => $ticker,
            'preco' => $data['quoteResponse']['result'][0]['regularMarketPrice'] ?? null,
            'moeda' => $data['quoteResponse']['result'][0]['currency'] ?? 'BRL'
        ];
    }

    public function getTodasCotacoes()
    {
        // Lista de tickers das ações principais da B3
        $tickers = [
            "PETR4.SA", "VALE3.SA", "ITUB4.SA", "BBDC4.SA", "ABEV3.SA",
            "WEGE3.SA", "MGLU3.SA", "BBAS3.SA", "B3SA3.SA", "RENT3.SA"
        ];

        $url = "https://query1.finance.yahoo.com/v7/finance/quote?symbols=" . implode(",", $tickers);
        $response = Http::get($url);
        $data = $response->json();

        if ($response->failed() || empty($data['quoteResponse']['result'])) {
            return ['error' => 'Não foi possível obter as cotações.'];
        }

        $cotacoes = [];
        foreach ($data['quoteResponse']['result'] as $acao) {
            $cotacoes[] = [
                'ticker' => $acao['symbol'],
                'preco' => $acao['regularMarketPrice'] ?? null,
                'moeda' => $acao['currency'] ?? 'BRL'
            ];
        }

        return $cotacoes;
    }
}
