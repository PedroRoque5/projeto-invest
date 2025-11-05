<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏆 Ranking Smartfy</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<body>
    <header>
          @include('cabecalho')
    </header>

    <section class="ranking section">
          <h1 class="section-title">🏆 Ranking Smartfy</h1>

        @if(count($dados) > 0)
        <table class="ranking-table mt-4">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Preço</th>
                    <th>Variação</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $acao)
                <tr class="{{ $acao['percentual'] >= 0 ? 'up' : 'down' }}">
                    <td>{{ $acao['acao'] }}</td>
                    <td>R$ {{ number_format($acao['preco'], 2, ',', '.') }}</td>
                    <td>{{ $acao['variacao'] >= 0 ? '+' : '' }}{{ number_format($acao['variacao'], 2, ',', '.') }}</td>
                    <td>{{ $acao['percentual'] >= 0 ? '+' : '' }}{{ number_format($acao['percentual'], 2, ',', '.') }}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center text-danger mt-5">Nenhum dado encontrado.</p>
        @endif
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
