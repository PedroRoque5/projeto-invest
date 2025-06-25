<?php 

use App\Helpers\FinanceHelpers;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste API Alpha Vantage</title>
    <link rel="stylesheet" href="{{ asset('css/teste.css') }}">
</head>
<body class="site">
      <div class="logo">
        <img src="{{ asset('images/Smartfy_invest_60x60.png') }}">
        </div>
    <div class="container">
        <h2>Teste da API Alpha Vantage</h2>

        <form method="GET" action="{{ route('teste') }}">
            <label for="ticker">Digite o código da ação:</label>
            <input type="text" id="ticker" name="ticker" required placeholder="Ex: AAPL">
            <button class="busca" type="submit">Buscar</button>
        </form>

        @if(isset($cotacao))
            @if(isset($cotacao['error']))
                <p style="color: red;">{{ $cotacao['error'] }}</p>
            @else
                <table>
                    <tr>
                        <th>Ticker</th>
                        <th>Preço</th>
                        <th>Moeda</th>
                    </tr>
                    <tr>
                        <td>{{ $cotacao['ticker'] }}</td>
                        <td>{{ $cotacao['preco'] }}</td>
                        <td>{{ $cotacao['moeda'] }}</td>
                    </tr>
                </table>
            @endif
        @endif

        <hr>
        
<h2>Calculadora de Juros Compostos</h2>

<form method="GET" action="{{ route('teste') }}">
    <input type="hidden" name="form" value="juros">
    <label>Capital Inicial (R$):</label>
    <input type="number" name="capital" step="0.01" required><br><br>

    <label>Taxa de Juros (% ao mês):</label>
    <input type="number" name="taxa" step="0.01" required><br><br>

    <label>Tempo (meses):</label>
    <input type="number" name="tempo" required><br><br>

    <button class="calcular" type="submit">Calcular</button>
</form>

@if(request('form') === 'juros' && request()->has(['capital', 'taxa', 'tempo']))
    @php
        $capital = request('capital');
        $taxa = request('taxa');
        $tempo = request('tempo');
        $montante = App\Helpers\FinanceHelpers::calcularJurosCompostos($capital, $taxa, $tempo);
    @endphp

    <h3>Resultado:</h3>
    <p>Montante final: <strong>R$ {{ number_format($montante, 2, ',', '.') }}</strong></p>
@endif

    </div>
</body>
</html>