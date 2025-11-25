<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartfy Invest</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="site">

    <header class="cabecalho">
        <div class="logo">
            <img src="{{ asset('images/Smartfy_invest_60x60.png') }}">
        </div>
    </header>

    <div class="BemVindo">
        <h1 id="welcome">Bem-Vindo</h1>
        <p id="slogan">Investindo com estratégia,<br> Crescendo com confiança</p>

        <img class="moeda" src="{{ asset('images/moeda_150x150.png') }}">

        <p id="aviso">Acesse sua conta para mais<br> informações.</p>

        {{-- Botão Entrar com mesmo estilo dos botões do form --}}
        <button type="button" id="btnEntrar" class="cadastre">Entrar</button>

        <label id="esqueci">
            <input type="checkbox" name="esqueci-senha">
            Esqueci minha senha
        </label>
    </div>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <div class="alert alert-danger" style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensagem de sucesso --}}
    @if (session('sucesso'))
        <div class="alert alert-success" style="color:green;">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="cadastro">
        <h1 class="cadastre">Cadastre-se</h1>

        <form action="{{ route('cadastro.salvar') }}" method="POST">
            @csrf

            <label class="cadastre">Nome</label><br>
            <input class="cadastre" type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome"><br>

            <label class="cadastre">E-mail</label><br>
            <input class="cadastre" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail"><br>

            <label class="cadastre">Senha</label><br>
            <input class="cadastre" type="password" name="senha" placeholder="Senha"><br>

            <button class="cadastre" type="submit">Cadastrar</button>
        </form>
    </div>

    <footer>
        <div class="rodape"></div>
    </footer>

<script>
    // Botão de entrar leva para rota login
    document.getElementById('btnEntrar').onclick = function() {
        window.location.href = "{{ route('login') }}";
    };
</script>

</body>
</html>
