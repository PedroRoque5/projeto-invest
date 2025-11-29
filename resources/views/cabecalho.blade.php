<header class="cabecalho">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#105F00;">
    <div class="container-fluid">

      <!-- LOGO -->
      <a class="navbar-brand" href="{{ route('home') }}">
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

          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('grafico') }}">
                Ações
              </a>
            </li>


            <!-- DROPDOWN FIIS -->
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('grafico') }}">
                FIIs
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('tesouro') }}">Tesouro Direto</a>
            </li>

            <!-- DROPDOWN RENDA FIXA -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="rendaFixaMenu" role="button" data-bs-toggle="dropdown">
                Renda Fixa
              </a>
              <ul class="dropdown-menu" aria-labelledby="rendaFixaMenu">
                <li><a class="dropdown-item" href="{{ route('cdb') }}">CDB</a></li>
                <li><a class="dropdown-item" href="{{ route('lci_lca') }}">LCI/LCA</a></li>
              </ul>
            </li>

          </ul>

          <!-- PESQUISA CENTRAL -->
         
        <form class="d-flex mx-auto" style="max-width: 300px;"method="GET" action="{{ route('home') }}">
            <input class="form-control me-2" type="text" id="ticker" name="ticker" required placeholder="Ex: AAPL">
            <button class="btn btn-outline-light" type="submit"><i class= "fas fa-search"></i></button>
        </form>

          <!-- CARTEIRA -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('carteira') }}">
                <i class="fas fa-wallet"></i> Carteira
              </a>
            </li>

            <!-- PERFIL USUÁRIO -->
            <li class="nav-item dropdown ms-3">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="perfilMenu" role="button" data-bs-toggle="dropdown">
                <i class="fa fa-user"></i>&nbsp;
                <strong>{{ Auth::user()->nome ?? 'Usuário' }}</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilMenu">
                <li><a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Sair</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>

      </div>
    </div>
  </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>