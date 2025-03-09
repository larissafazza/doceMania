<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">

    <title>Doce Mania | @yield('title', '')</title>

    <!-- Link para o Bootswatch baixado -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Adicionar seu CSS personalizado, se houver -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar (opcional) -->
    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href=""><img class="nav-img" src="{{ asset('img/logo-nav.png') }}" alt="logo da loja">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sales.index') }}">Vendas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Relatórios</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('reports.missing') }}">Lista de Faltas</a>
            <a class="dropdown-item" href="{{ route('reports.expiration') }}">Lista de Validades</a>
            <a class="dropdown-item" href="#">Relatório Diário</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a> -->
          </div>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Scripts do Bootstrap (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
