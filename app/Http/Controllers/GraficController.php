<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficController extends Controller
{
    public function show(Request $request)
    {
        $symbol = $request->input('symbol', 'AAPL');

        // Caminhos absolutos
        $pythonPath = '/usr/bin/python3'; // verifique com 'which python3'
        $pythonScript = base_path('app/Python/stock_controller.py'); 

        $command = escapeshellcmd("$pythonPath $pythonScript $symbol");
        $output = shell_exec($command);

        if (!$output) {
            return "⚠️ Nenhum retorno do Python. Verifique permissões e caminhos.";
        }

        $data = json_decode($output, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return "❌ Erro ao decodificar JSON: " . json_last_error_msg();
        }

        return view('grafico', [
            'symbol' => $data['symbol'] ?? $symbol,
            'chart' => $data['chart'] ?? null,
            'error' => $data['error'] ?? null
        ]);
    }
}
