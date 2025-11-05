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
            'preco'  => isset($data['Global Quote']['05. price']) 
                ? number_format((float)$data['Global Quote']['05. price'], 2, ',', '') 
                : null,
            'moeda'  => 'USD'
        ];
        
    }

    /**
     * Retorna o Overview da empresa (market cap, lucro, etc.)
     */
    public function getOverview(string $ticker): array
    {
        $url = "https://www.alphavantage.co/query";

        $response = Http::get($url, [
            'function' => 'OVERVIEW',
            'symbol'   => $ticker,
            'apikey'   => $this->apiKey
        ]);

        $data = $response->json();

        if (!is_array($data) || empty($data) || isset($data['Note'])) {
            return ['error' => 'Não foi possível obter o overview.', 'debug' => $data];
        }

        return $data;
    }

    /**
     * Retorna a série mensal ajustada para calcular crescimento anual
     */
    public function getMonthlyAdjusted(string $ticker): array
    {
        $url = "https://www.alphavantage.co/query";

        $response = Http::get($url, [
            'function' => 'TIME_SERIES_MONTHLY_ADJUSTED',
            'symbol'   => $ticker,
            'apikey'   => $this->apiKey
        ]);

        $data = $response->json();

        if (!isset($data['Monthly Adjusted Time Series'])) {
            return ['error' => 'Não foi possível obter a série mensal.', 'debug' => $data];
        }

        return $data['Monthly Adjusted Time Series'];
    }

    /**
     * Calcula crescimento em 12 meses a partir da série mensal ajustada
     */
    public function calculateAnnualGrowthPercent(array $monthlySeries): ?float
    {
        if (isset($monthlySeries['error'])) {
            return null;
        }

        // Ordena por data desc
        $dates = array_keys($monthlySeries);
        rsort($dates);

        if (count($dates) < 13) {
            return null;
        }

        $latest = (float)($monthlySeries[$dates[0]]['5. adjusted close'] ?? 0);
        $yearAgo = (float)($monthlySeries[$dates[12]]['5. adjusted close'] ?? 0);

        if ($latest <= 0 || $yearAgo <= 0) {
            return null;
        }

        return (($latest / $yearAgo) - 1) * 100.0;
    }
}

