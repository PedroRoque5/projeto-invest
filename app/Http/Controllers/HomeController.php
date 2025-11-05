<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MarketDataHelper;

class HomeController extends Controller
{
    public function index()
{
    // --- Simulação temporária ---
    $ranking = [
        ['simbolo' => 'AAPL', 'preco' => '270.37', 'variacao' => '-1.03', 'percentual' => '-0.37%', 'atualizado_em' => '2025-10-31'],
        ['simbolo' => 'MSFT', 'preco' => '330.15', 'variacao' => '+2.12', 'percentual' => '+0.65%', 'atualizado_em' => '2025-10-31'],
        ['simbolo' => 'TSLA', 'preco' => '210.44', 'variacao' => '+5.20', 'percentual' => '+2.53%', 'atualizado_em' => '2025-10-31'],
        ['simbolo' => 'PETR4.SA', 'preco' => '38.70', 'variacao' => '+0.25', 'percentual' => '+0.65%', 'atualizado_em' => '2025-10-31'],
        ['simbolo' => 'VALE3.SA', 'preco' => '67.80', 'variacao' => '-0.40', 'percentual' => '-0.59%', 'atualizado_em' => '2025-10-31'],
    ];

    // ordena por melhor variação %
    usort($ranking, fn($a, $b) => (float) str_replace('%','',$b['percentual']) <=> (float) str_replace('%','',$a['percentual']));

    return view('home', compact('ranking'));
}
}