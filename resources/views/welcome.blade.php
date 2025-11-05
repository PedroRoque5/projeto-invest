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
        <p id="slogan">Investindo com estatégia,<br> Crescendo com confiança</p>
        <img  class="moeda" src="{{ asset('images/moeda_150x150.png') }}">
        <P id="aviso"> Acesse sua conta para mais<br> informações.</P>
        <form id="Submmit">
            <label><button type="button" id="submmit">Entrar</button></label><br>
            <label id="esqueci">
                <input  type="checkbox" name="esqueci-senha" value="sim">
                Esqueci minha senha
            </label>
        </form>
    </div>
    <div class="cadastro">
        <h1 class="cadastre">Cadastre-se</h1>
        <form action="{{ route('perfil') }}" method="GET">
            <label class="cadastre">Nome</label><br>
            <input class="cadastre" type="text" placeholder="Nome"><br>
            <label class="cadastre">E-mail</label><br>
            <input class="cadastre"type="email" placeholder="E-mail"><br>
            <label class="cadastre">Senha</label><br>
            <input class="cadastre"type="senha" placeholder="Senha"><br>
            <label id="button"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="cadastre" type="submit">Perfil</button>
        </form>
    </div>
    <footer>
    <div class="rodape">
    </div>
</footer>
<button type="button" id="submmit">Entrar</button>

<script>
    document.getElementById('submmit').onclick = function() {
        window.location.href = "{{ route('login') }}";
    };
</script>

</body>
</html>
