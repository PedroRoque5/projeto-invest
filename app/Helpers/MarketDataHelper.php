<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MarketDataHelper
{
    public static function getQuote($symbol)
    {
        // cache evita refazer requisições e bloqueio da API
        return Cache::remember("quote_$symbol", now()->addMinutes(30), function () use ($symbol) {
            $apikey = env('ALPHAVANTAGE_API_KEY');
            $url = "https://www.alphavantage.co/query";

            try {
                // 🔹 respeita o limite de 5 chamadas por minuto
                sleep(12);

                $response = Http::timeout(10)->get($url, [
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => $symbol,
                    'apikey' => $apikey
                ]);

                if (!$response->successful()) {
                    return ['error' => 'Falha na conexão com a API'];
                }

                $data = $response->json();

                // 🔹 dados válidos
                if (isset($data['Global Quote']) && !empty($data['Global Quote'])) {
                    $quote = $data['Global Quote'];

                    return [
                        'simbolo'       => $quote['01. symbol'] ?? $symbol,
                        'preco'         => $quote['05. price'] ?? '0.00',
                        'variacao'      => $quote['09. change'] ?? '0.00',
                        'percentual'    => $quote['10. change percent'] ?? '0%',
                        'atualizado_em' => $quote['07. latest trading day'] ?? now()->toDateString(),
                    ];
                }

                // 🔹 resposta de erro da API
                if (isset($data['Note']) || isset($data['Error Message'])) {
                    return ['error' => 'limite de requisições da API atingido ou símbolo inválido'];
                }

                return ['error' => 'Ação não encontrada'];
            } catch (\Exception $e) {
                return ['error' => 'Erro ao conectar à API: ' . $e->getMessage()];
            }
        });
    }
}
