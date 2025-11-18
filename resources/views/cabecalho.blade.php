<header class="cabecalho">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#105F00;">
    <div class="container-fluid">

      <!-- LOGO -->
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/Smartfy_invest_60x60.png') }}" height="50">
      </a>

      <!-- BOTÃO TOGGLER MOBILE -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENU COLAPSÁVEL -->
      <div class="collapse navbar-collapse" id="menuPrincipal">

        <!-- MENU ESQUERDA -->
        <ul class="navbar-nav me-auto">

          <!-- DROPDOWN AÇÕES -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="acoesMenu" role="button" data-bs-toggle="dropdown">
              Ações
            </a>
            <ul class="dropdown-menu" aria-labelledby="acoesMenu">
              <li><a class="dropdown-item" href="#">AAPL34 - Apple</a></li>
              <li><a class="dropdown-item" href="#">MSFT34 - Microsoft</a></li>
              <li><a class="dropdown-item" href="#">AMZO34 - Amazon</a></li>
              <li><a class="dropdown-item" href="#">GOGL34 - Google</a></li>
              <li><a class="dropdown-item" href="#">META34 - Meta</a></li>
            </ul>
          </li>

          <!-- DROPDOWN FIIS -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="fiisMenu" role="button" data-bs-toggle="dropdown">
              FIIs
            </a>
            <ul class="dropdown-menu" aria-labelledby="fiisMenu">
              <li><a class="dropdown-item" href="#">Tijolo</a></li>
              <li><a class="dropdown-item" href="#">Papel</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Tesouro Direto</a>
          </li>

          <!-- DROPDOWN RENDA FIXA -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="rendaFixaMenu" role="button" data-bs-toggle="dropdown">
              Renda Fixa
            </a>
            <ul class="dropdown-menu" aria-labelledby="rendaFixaMenu">
              <li><a class="dropdown-item" href="#">CDB</a></li>
              <li><a class="dropdown-item" href="#">LCI/LCA</a></li>
            </ul>
          </li>

        </ul>

        <!-- PESQUISA CENTRAL -->
        <form class="d-flex mx-auto" style="max-width: 300px;">
          <input class="form-control me-2" type="search" placeholder="Buscar">
          <button class="btn btn-outline-light" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>

        <!-- CARTEIRA -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carteira') }}">
              <i class="fas fa-wallet"></i> Carteira
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>