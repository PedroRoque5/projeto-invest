<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LCI/LCA - Smartfy</title>
    <link rel="stylesheet" href="{{ asset('css/tesouro.css') }}" />
</head>
<body>

<header>
    <h1>LCI/LCA - Smartfy</h1>
    <p>Saiba tudo sobre investimentos em Letras de Crédito Imobiliário e do Agronegócio</p>
</header>

<div class="container">
    <h2>O que é LCI/LCA?</h2>
    <p>LCI (Letra de Crédito Imobiliário) e LCA (Letra de Crédito do Agronegócio) são títulos de renda fixa emitidos por bancos, isentos de Imposto de Renda para pessoas físicas, e garantidos pelo FGC até R$ 250.000 por CPF.</p>

    <h2>Tipos de LCI/LCA</h2>

    <div class="card"><h3>LCI</h3><p>Investimento vinculado ao setor imobiliário, com rendimento geralmente prefixado ou atrelado ao CDI.</p></div>
    <div class="card"><h3>LCA</h3><p>Investimento vinculado ao agronegócio, também com rendimento prefixado ou pós-fixado (CDI).</p></div>

    <h2>Simulador</h2>
    <p>Faça uma simulação rápida do seu investimento em LCI/LCA.</p>

    <!-- BOTÃO QUE MOSTRA A CALCULADORA -->
    <button class="btn" onclick="mostrarCalculadora()">Acessar Simulador</button>

    <!-- CALCULADORA ESCONDIDA -->
    <div id="calculadora" style="display: none; margin-top: 20px;">

        <h2>Calculadora de Rendimento LCI/LCA</h2>

        <form method="GET">
            <input type="hidden" name="form" value="lci">

            <label>Capital Inicial (R$):</label>
            <input type="number" name="capital" step="0.01" required><br><br>

            <label>Taxa de Rendimento (% ao ano):</label>
            <input type="number" name="taxa" step="0.01" required><br><br>

            <label>Prazo (meses):</label>
            <input type="number" name="tempo" required><br><br>

            <button class="calcular" type="submit">Calcular</button>
        </form>

        @if(request('form') === 'lci' && request()->has(['capital','taxa','tempo']))
            @php
                $capital = request('capital');
                $taxaAnual = request('taxa');
                $tempoMeses = request('tempo');
                $taxaMensal = pow(1 + $taxaAnual/100, 1/12) - 1;
                $montante = $capital * pow(1 + $taxaMensal, $tempoMeses);
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
