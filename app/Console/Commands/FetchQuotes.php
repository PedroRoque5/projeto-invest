<?php

namespace App\console\commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Quote;
use Illuminate\Support\Facades\Log;

class FetchQuotes extends Command
{
    protected $signature = 'smartfy:fetch-quates';
    protected $description = 'Busca cotações na Alpha Vantage para a lista de símbolos (B3 +US).';

    public function handle()
    {
        $apiKey = env('ALPHA_VANTAGE_API_KEY');
        if (!$apiKey) {
            $this->error('Chave da API Alpha Vantage não está definida.');
            return 1;
        }
        $symbols = [
            'AAPL',
            'MSFT',
            'GOOGL',
            'AMZN',
            'META',
            'TSLA',
            'NVDA',
            'NFLX',
            'DIS',
            'BABA',
            'PETR4.SA',
            'VALE3.SA',
            'ITUB4.SA',
            'BBDC4.SA',
            'ABEV3.SA'
        ];

        foreach ($symbols as $symbol) {
            try {
                $response = Http::acceptJson()->get('https://www.alphavantage.co/query', [
                    'function' => 'GLOBAL_QUOTE',
                    'symbol' => $symbol,
                    'apikey' => $apiKey,
                ]);
                $data = $response->json();
                $quote = $data['Global Quote'] ?? null;

                if ($quote && isset($quote['05. price'])) {
                    $price = (float)($quote['05. price'] ?? 0);
                    $change = (float)($quote['09. change'] ?? 0);
                    $changePercent = $quote['10. change percent'] ?? null;

                    Quote::updateOrCreate(
                        ['symbol' => $symbol],
                        [
                            'price' => $price,
                            'change' => $change,
                            'change_percent' => $changePercent,
                            'fetched_at' => now(),
                        ]
                    );

                    $this->info("OK: {$symbol} -> {$price}");
                } else {
                    $this->warn("Sem dados(ou limite) para: {$symbol}");
                }
                sleep(12);
            } catch (\Exception $e) {
                log::error("FetchQuotes error for {$symbol}: " . $e->getMessage());
                $this->error("Erro ao buscar dados para: {$symbol} - " . $e->getMessage());
            }
        }
    }
}
