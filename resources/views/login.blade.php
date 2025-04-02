<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smartfy Invest</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body class="site">
    <header class="cabecalho">
        <div class="logo">
        <img src="{{ asset('images/Smartfy_invest_60x60.png') }}">
        </div>
    </header>
    <div class="BemVindo">
       <p id="introduction">Faça seu login<br>
       E encontre a<br>melhor estratégia<br>para o seu interesse <br>de investimento!<br>
</p>
<img  class="grafico" src="{{ asset('images/grafico.png') }}">
    </div>
    <div class="paginalogin">
        <h1 class="login">LOGIN</h1>
        <form action="">
            <label class="login">E-mail</label><br>
            <input class="login"type="email" placeholder="E-mail"><br>
            <label class="login">Senha</label><br>
            <input class="login"type="senha" placeholder="Senha"><br>
            <label id="button"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="login" type="submit">LOGIN</button></label><br>
        </form>
    </div>
    <div class="Cadastre">
        <button id="cadastre" type="submit">Cadastre-se</button>
    </div>
    <div class="google">
    <img class="google-login" src="{{ asset('images/google-icon.png') }}">
    </div>
    <footer>
    <div class="rodape">
    </div>
</footer>
</body>
</html>
