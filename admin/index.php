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
    <link rel="stylesheet" href="../static/css/index.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="color-one inter-uniquifier">

    <main class="container color-three py-5">

        <header class="text-center mb-5">
            <h1 class="fw-bold">Qual seu cargo?</h1>
        </header>

        <form action="" method="POST">
            <div class="row justify-content-center">

                <!-- CARD -->
                <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                    <button type="submit" name="user_id" value="1" class="user-card">
                        <img src="../img/person-fill.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Admin</span>
                    </button>
                </div>

                <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                    <button type="submit" name="user_id" value="2" class="user-card">
                        <img src="../img/person-fill.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Chefe</span>
                    </button>
                </div>

                <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                    <button type="submit" name="user_id" value="3" class="user-card">
                        <img src="../img/person-fill.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Garçom</span>
                    </button>
                </div>

                <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                    <button type="submit" name="user_id" value="4" class="user-card">
                        <img src="../img/person-fill.svg" class="user-img">
                        <span class="fs-3 fw-semibold">Caixa</span>
                    </button>
                </div>

            </div>
        </form>

    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="static/js/contador.js"></script>
</body>

</html>