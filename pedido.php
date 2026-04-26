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
    <link rel="stylesheet" href="static/css/pedido.css">

</head>

<body class="container-fluid p-0 color-four inter-uniquifier">

    <!-- Mobile First -->

    <header class="container-fluid sticky-top color-two">

        <!-- Título -->
        <div class="text-center fs-1 text-white p-4 great-vibes-regular">
            Menutti
        </div>

    </header>

    <main class="mt-3 container color-five rounded">

        <div class="row my-4">

            <!-- IMAGEM -->
            <div class="col-12 col-md-6 p-2 text-center my-auto">
                <img class="img-fluid  rounded w-75" src="" alt="imagem">
            </div>

            <!-- CONTEÚDO -->
            <div class="col-12 col-md-6 p-3">

                <div class="text-center text-md-start fs-3 fs-md-1 fw-bold">
                    Nome do Produto
                </div>

                <div class="fs-6 fs-md-4 tamanho-texto2">
                    descrição
                </div>

                <!-- PREÇO -->
                <div class="row align-items-center mt-lg-5 mt-3 g-2">
                    <div class="col-12 col-md-4 fs-5 fw-semibold text-center text-md-start">
                        Preço: X
                    </div>

                    <!-- CONTADOR -->

                    <div class="col-12 col-md-8 col-lg-12 mt-lg-5 mt-3">
                        <div class="row align-items-center text-center">

                            <div class="col-4 d-flex justify-content-center">
                                <input class="botao-redondo" type="button" value="-">
                            </div>

                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <span class="fs-5 fw-bold">1</span>
                            </div>

                            <div class="col-4 d-flex justify-content-center">
                                <input class="botao-redondo" type="button" value="+">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12 my-2">
                <div class="botao ">
                    Complemento
                </div>
            </div>

        </div>

        <div class="row my-4">

            <div class="col-12 fs-1 fw-bold ps-5">
                Observação
            </div>

            <div class="col-12 d-flex justify-content-center">
                <textarea placeholder="Ex: sem cebola, molho à parte..."></textarea>
            </div>

            <div class="botao mt-4">
                Adicionar No Carrinho
            </div>

        </div>










    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="static/js/navbar.js"></script>
</body>

</html>