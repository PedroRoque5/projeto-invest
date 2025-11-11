<header class="cabecalho">
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">

      <!-- LOGO -->
      <div class="logo">
        <img src="{{ asset('images/Smartfy_invest_60x60.png') }}">
      </div>

      <!-- BOTÃO TOGGLER (necessário para dropdowns e mobile) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- CONTEÚDO DO MENU -->
      <div class="collapse navbar-collapse" id="navbarNav">

        <!-- Menu à esquerda -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ações
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">AAPL34 - Apple</a></li>
              <li><a class="dropdown-item" href="#">MSFT34 - Microsoft</a></li>
              <li><a class="dropdown-item" href="#">AMZO34 - Amazon</a></li>
              <li><a class="dropdown-item" href="#">GOGL34 - Google</a></li>
              <li><a class="dropdown-item" href="#">META34 - Meta (Facebook)</a></li>
              <li><a class="dropdown-item" href="#">TSLA34 - Tesla</a></li>
              <li><a class="dropdown-item" href="#">NFLX34 - Netflix</a></li>
              <li><a class="dropdown-item" href="#">DISB34 - Disney</a></li>
              <li><a class="dropdown-item" href="#">NVDL34 - Nvidia</a></li>
              <li><a class="dropdown-item" href="#">BABA34 - Alibaba</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              FIIs
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tijolo</a></li>
              <li><a class="dropdown-item" href="#">Papel</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Tesouro Direto</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Renda Fixa
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">CDB</a></li>
              <li><a class="dropdown-item" href="#">LCI/LCA</a></li>
            </ul>
          </li>
        </ul>

        <!-- Pesquisa centralizada -->
        <div class="mx-auto">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>

        <!-- Carteira no canto direito -->
        <div class="ms-auto">
          <a class="nav-link" href="{{ route('carteira') }}"><i class="fas fa-wallet"></i> Carteira</a>
        </div>

      </div>
    </div>
  </nav>
</header>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
