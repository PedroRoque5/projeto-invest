<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CDB - Smartfy</title>
    <link rel="stylesheet" href="{{ asset('css/tesouro.css') }}" />
</head>
<body>

<header>
    <h1>CDB - Smartfy</h1>
    <p>Entenda como funciona o Certificado de Depósito Bancário</p>
</header>

<div class="container">
    <h2>O que é um CDB?</h2>
    <p>O CDB (Certificado de Depósito Bancário) é um título emitido pelos bancos para captar recursos. 
       Em troca, você recebe juros pelo dinheiro investido.</p>

    <h2>Tipos de CDB</h2>

    <div class="card"><h3>CDB Pós-Fixado</h3><p>Rende um percentual do CDI (ex: 100% do CDI).</p></div>
    <div class="card"><h3>CDB Prefixado</h3><p>Juros fixos definidos no momento da aplicação.</p></div>
    <div class="card"><h3>CDB IPCA+</h3><p>Rende acima da inflação, combinando IPCA + juros.</p></div>

    <h2>Simulador</h2>
    <p>Faça uma simulação rápida do seu investimento em CDB.</p>

    <!-- BOTÃO QUE MOSTRA A CALCULADORA -->
    <button class="btn" onclick="mostrarCalculadora()">Acessar Simulador</button>

    <!-- CALCULADORA ESCONDIDA -->
    <div id="calculadora" style="display: none; margin-top: 20px;">

        <h2>Simulador de CDB</h2>

        <form method="GET">
            <input type="hidden" name="form" value="cdb">

            <label>Capital Inicial (R$):</label>
            <input type="number" name="capital" step="0.01" required><br><br>

            <label>Taxa (% ao ano ou CDI equivalente):</label>
            <input type="number" name="taxa" step="0.01" required><br><br>

            <label>Tempo (meses):</label>
            <input type="number" name="tempo" required><br><br>

            <button class="calcular" type="submit">Calcular</button>
        </form>

        @if(request('form') === 'cdb' && request()->has(['capital','taxa','tempo']))
            @php
                $capital = request('capital');
                $taxa = request('taxa');
                $tempo = request('tempo');

                // Usa o mesmo helper de juros compostos
                $montante = App\Helpers\FinanceHelpers::calcularJurosCompostos($capital,$taxa/12,$tempo);
            @endphp

            <h3>Resultado:</h3>
            <p>Montante final estimado:
                <strong>R$ {{ number_format($montante, 2, ',', '.') }}</strong>
            </p>

            <script>
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
