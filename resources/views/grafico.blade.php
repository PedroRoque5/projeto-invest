<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Ações - {{ $symbol }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f4f6f8;
            margin: 50px;
            color: #333;
        }
        .card {
            display: inline-block;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            padding: 20px 40px;
        }
        img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }
        .error {
            color: red;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Gráfico de {{ $symbol }}</h1>

        <form method="GET" action="{{ route('grafico') }}">
            <input type="text" name="symbol" placeholder="Ex: AAPL, MSFT, TSLA" value="{{ $symbol ?? '' }}">
            <button type="submit">Gerar Gráfico</button>
        </form>

        @if(isset($chart))
            <img src="data:image/png;base64,{{ $chart }}" alt="Gráfico de {{ $symbol }}">
        @elseif(isset($error))
            <p class="error">{{ $error }}</p>
        @else
            <p class="error">Não foi possível gerar o gráfico.</p>
        @endif
    </div>
</body>
</html>
