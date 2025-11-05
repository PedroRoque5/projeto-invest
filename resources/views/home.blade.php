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
        <h3 class="section-title">🏆 Ranking Smartfy (B3 + EUA)</h3>

        @if(!empty($ranking))
            <div class="table-responsive">
                <table class="ranking-table">
                    <thead>
                        <tr>
                            <th>Pos</th>
                            <th>Símbolo</th>
                            <th>Últ. Preço</th>
                            <th>Variação</th>
                            <th>%</th>
                            <th>Atualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking as $i => $q)
                            @php
                                $pct = floatval(str_replace('%','',$q['percentual'] ?? '0'));
                                $isUp = $pct >= 0;
                            @endphp
                            <tr class="{{ $isUp ? 'up' : 'down' }}">
                                <td>{{ $i + 1 }}</td>
                                <td><strong>{{ $q['simbolo'] }}</strong></td>
                                <td>R$ {{ number_format($q['preco'], 2, ',', '.') }}</td>
                                <td>{{ $q['variacao'] }}</td>
                                <td>{{ $q['percentual'] }}</td>
                                <td>{{ $q['atualizado_em'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-muted mt-4">
                Nenhum dado disponível no momento. Aguarde atualização automática.
            </p>
        @endif
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
