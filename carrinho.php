<?php

// require_once('model/Pedido.php');
// $pedido = new Pedido();
// $pedido->id = $_GET['id'];
// $p = $produto->listar_por_id();

// print_r($pedido);

// $listar_produtos = $produto->listar();

// verificar se a sessão do carrinho existe:
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array(); // criar um carrinho vazio
    }
    print_r($_SESSION['carrinho']); // exibir o conteúdo do carrinho para teste
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menutti</title>

    <!-- fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- styles -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/carrinho.css">

      <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="container-fluid p-0 color-four inter-uniquifier">

    <!-- Mobile First -->

    <header class="container-fluid sticky-top color-two d-flex align-items-center">

        <!-- Título -->

        <div class="col-md-5 fs-1 ">
            <a class="ps-3 text-white" href="index.php"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="ps-lg-5 col-md-7 fs-1 text-white p-4 great-vibes-regular">
            Menutti
        </div>


    </header>

    <main class="container-fluid">

    <?php // foreach ($pedido as $p) { ?>
        <div class="row my-card2 my-4">

            <!-- IMAGEM -->
            <div class="col-12 col-md-4 p-2 text-center my-auto">
                <img class="img-fluid rounded" src="" alt="imagem">
            </div>

            <!-- CONTEÚDO -->
            <div class="col-12 col-md-8 p-3">

                <div class="text-center text-md-start fs-3 fs-md-1 fw-bold">
                    Nome do Produto
                </div>

                <!-- PREÇO + BOTÃO -->
                <div class="row align-items-center mt-4 g-2">
                    <div class="col-4 fs-5 fw-semibold text-center text-md-start">
                        Preço: X
                    </div>

                    <div class="col-8 mt-lg-5 mt-3">
                     <div class="contador row align-items-center text-center">

                            <div class="col-4 d-flex justify-content-center">
                                <button class="botao-redondo btn-minus">-</button>
                            </div>

                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <span class="fs-5 fw-bold quantidade">1</span>
                            </div>

                            <div class="col-4 d-flex justify-content-center">
                                <button class="botao-redondo btn-plus">+</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="botao2 mt-4">
            Finalizar o Pedido
        </div>
        <?php // } ?>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="static/js/contador.js"></script>
</body>

</html>