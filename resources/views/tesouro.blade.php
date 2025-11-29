<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tesouro Direto - Smartfy</title>
    <link rel="stylesheet" href="{{ asset('css/tesouro.css') }}" />
</head>
<body>

<header>
    <h1>Tesouro Direto - Smartfy</h1>
    <p>Saiba tudo sobre investimentos em títulos públicos</p>
</header>

<div class="container">
    <h2>O que é o Tesouro Direto?</h2>
    <p>O Tesouro Direto é um programa do governo federal que permite que pessoas físicas invistam em títulos públicos.</p>

    <h2>Tipos de Títulos</h2>

    <div class="card"><h3>Tesouro Selic</h3><p>Indicado para liquidez e segurança.</p></div>
    <div class="card"><h3>Tesouro IPCA+</h3><p>Protege contra inflação.</p></div>
    <div class="card"><h3>Tesouro Prefixado</h3><p>Juros definidos na data da compra.</p></div>

    <h2>Simulador</h2>
    <p>Faça uma simulação rápida do seu investimento.</p>

    <!-- BOTÃO QUE MOSTRA A CALCULADORA -->
    <button class="btn" onclick="mostrarCalculadora()">Acessar Simulador</button>

    <!-- CALCULADORA ESCONDIDA -->
    <div id="calculadora" style="display: none; margin-top: 20px;">

        <h2>Calculadora de Juros Compostos</h2>

        <form method="GET">
            <input type="hidden" name="form" value="juros">

            <label>Capital Inicial (R$):</label>
            <input type="number" name="capital" step="0.01" required><br><br>

            <label>Taxa de Juros (% ao mês):</label>
            <input type="number" name="taxa" step="0.01" required><br><br>

            <label>Tempo (meses):</label>
            <input type="number" name="tempo" required><br><br>

            <button class="calcular" type="submit">Calcular</button>
        </form>

        @if(request('form') === 'juros' && request()->has(['capital','taxa','tempo']))
            @php
                $capital = request('capital');
                $taxa = request('taxa');
                $tempo = request('tempo');
                $montante = App\Helpers\FinanceHelpers::calcularJurosCompostos($capital,$taxa,$tempo);
            @endphp

            <h3>Resultado:</h3>
            <p>Montante final:
                <strong>R$ {{ number_format($montante, 2, ',', '.') }}</strong>
            </p>

            <script>
                // Mostra automaticamente a calculadora após calcular
                document.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('calculadora').style.display = 'block';
                });
            </script>
        @endif

    </div>
</div>

<script>
function mostrarCalculadora() {
    document.getElementById('calculadora').style.display = 'block';
}
</script>

</body>
</html>
