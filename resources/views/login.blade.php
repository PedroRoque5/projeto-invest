<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartfy Invest - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="site">

    <header class="cabecalho">
        <div class="logo">
            <img src="{{ asset('images/Smartfy_invest_60x60.png') }}">
        </div>
    </header>

    {{-- Lado esquerdo --}}
    <div class="BemVindo">
        <p id="introduction">Faça seu login<br>
            E encontre a<br>melhor estratégia<br>para o seu interesse <br>de investimento!<br>
        </p>
        <img class="grafico" src="{{ asset('images/grafico.png') }}">
    </div>


    {{-- Formulário de login --}}
    <div class="paginalogin">
        <h1 class="login">Login</h1>

        {{-- Mensagens de erro --}}
        @if ($errors->any())
        <div style="color:red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <label class="login">E-mail</label>
            <input class="login" type="email" name="email" value="{{ old('email') }}" placeholder="Digite seu email">

            <label class="login">Senha</label>
            <input class="login" type="password" name="password" placeholder="Digite sua senha">

            <button type="submit" class="login">Entrar</button>
        </form>

        {{-- Link para cadastro --}}
        <div class="Cadastre">
            <p>Não tem conta?
                <button id="cadastre" onclick="window.location.href='{{ route('welcome') }}'">Cadastre-se</button>
            </p>
        </div>
    </div>

    <footer class="rodape"></footer>

</body>

</html>