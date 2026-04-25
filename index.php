<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menutti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="static/css/index.css">

</head>

<body class="container-fluid bg-black">

  <!-- Mobile First -->

  <header class="container-fluid sticky-top bg-black">

    <!-- Título -->
    <div class="text-center fs-1 text-white p-4">
      Menutti
    </div>

    <!-- Navbar -->
    <nav class="row bg-white align-items-center p-3">

      <!-- Logo -->
      <div class="col-6 col-md-2 fs-4 fw-bold">
        Logo
      </div>

      <!-- Centro (menu desktop) -->
      <div class="col-md-8 d-none d-md-flex justify-content-center">
        <ul class="d-flex list-unstyled m-0 gap-4">
          <li><a href="#" data-link="comidas" class="nav-link-custom active">Comidas</a></li>
          <li><a href="#" data-link="sobremesas" class="nav-link-custom">Sobremesas</a></li>
          <li><a href="#" data-link="bebidas" class="nav-link-custom">Bebidas</a></li>
        </ul>
      </div>

      <!-- Direita (mobile + desktop) -->
      <div class="col-6 col-md-2 d-flex justify-content-end align-items-center gap-3">

        <!-- Carrinho -->
        <a href="#" class="text-dark text-decoration-none">
          🛒
        </a>

        <!-- Botão mobile -->
        <button onclick="toggleMenu()" class="btn btn-outline-dark d-md-none">
          ☰
        </button>

      </div>

      <!-- Menu mobile (colapsado) -->
      <div id="menu" class="col-12 d-md-none d-none mt-3">
        <ul class="d-flex flex-column list-unstyled m-0 gap-3">
          <li><a href="#" data-link="comidas" class="nav-link-custom active">Comidas</a></li>
          <li><a href="#" data-link="sobremesas" class="nav-link-custom">Sobremesas</a></li>
          <li><a href="#" data-link="bebidas" class="nav-link-custom">Bebidas</a></li>
        </ul>
      </div>

    </nav>

  </header>

  <main class="container-fluid">

    <div class="row my-card my-4">

  <!-- IMAGEM -->
  <div class="col-12 col-md-4 p-2 text-center my-auto">
    <img class="img-fluid rounded" src="" alt="imagem">
  </div>

  <!-- CONTEÚDO -->
  <div class="col-12 col-md-8 p-3">

    <div class="text-center text-md-start fs-3 fs-md-1 fw-bold">
      Nome do Produto
    </div>

    <div class="fs-6 fs-md-4 tamanho-texto">
      descrição
    </div>

    <!-- PREÇO + BOTÃO -->
    <div class="row align-items-center mt-3 g-2">
      <div class="col-12 col-md-4 fs-5 fw-semibold text-center text-md-start">
        Preço: X
      </div>

      <div class="col-12 col-md-8">
        <div class="botao-pedido text-center">
          Adicionar o Pedido
        </div>
      </div>
    </div>

  </div>

</div>


    </div>








  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="static/js/navbar.js"></script>
</body>

</html>