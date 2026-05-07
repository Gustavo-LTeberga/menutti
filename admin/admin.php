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
    <link rel="stylesheet" href="../static/css/admin-index.css">
    <link rel="stylesheet" href="../static/css/admin-admin.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="color-four">

    <header id="cabecalho" class="container-fluid sticky-top color-two d-flex align-items-center p-5">

        <!-- Título -->

        <div class=" fs-1 ">
            <a class="ps-2 ps-md-5 text-white" href="admin.php"><i class="bi bi-arrow-left"></i></a>
        </div>

    </header>

    <main class="d-flex justify-content-center  m-5">

        <div class="main-admin container color-five py-5 d-flex justify-content-center align-items-center">

            <div class="row ">

                <!-- CARD -->
                <div class="col-12 col-md-6 mb-2 d-flex justify-content-center ">
                    <a href="funcionarios.php" class="user-card color-one">
                        <img src="../img/person-fill.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Funcionarios</span>
                    </a>
                </div>

                <div class="col-12 col-md-6 mb-2 d-flex justify-content-center">
                    <a href="produtos.php" type="button" onclick="abrirLogin('Chefe')" class="user-card">
                        <img src="../img/fork-knife.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Produtos</span>
                    </a>
                </div>

            </div>

        </div>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>