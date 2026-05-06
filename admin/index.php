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

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="color-four">

    <main>

        <!-- selecionar cargo -->

        <section id="tela-cargo">

            <div class="main-cargo container color-five py-5">

                <header class="text-center mb-5">
                    <h1 class="fw-bold">Qual seu cargo?</h1>
                </header>

                <form action="" method="POST">
                    <div class="row ">

                        <!-- CARD -->
                        <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center ">
                            <button type="button" onclick="abrirLogin('Admin')" class="user-card color-one">
                                <img src="../img/person-fill.svg" class="user-img">
                                <span class="fs-3 fw-semibold">Admin</span>
                            </button>
                        </div>

                        <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                            <button type="button" onclick="abrirLogin('Chefe')" class="user-card">
                                <img src="../img/person-fill.svg" class="user-img">
                                <span class="fs-3 fw-semibold">Chefe</span>
                            </button>
                        </div>

                        <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                            <button type="button" onclick="abrirLogin('Garçom')" class="user-card">
                                <img src="../img/person-fill.svg" class="user-img">
                                <span class="fs-3 fw-semibold">Garçom</span>
                            </button>
                        </div>

                        <div class="col-12 col-sm-6 mb-4 d-flex justify-content-center">
                            <button type="button" onclick="abrirLogin('Caixa')" class="user-card">
                                <img src="../img/person-fill.svg" class="user-img">
                                <span class="fs-3 fw-semibold">Caixa</span>
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </section>

        <!-- Login -->

        <section id="tela-login" class="d-flex justify-content-center align-items-center vh-100 hidden">

            <div class="container login-card mx-auto color-five">
                <form class="h-100  row">
                    <!-- topo do card -->
                    <div class="col-12 col-md-6">

                        <a href="#" onclick="voltarIndex()" class="text-black fs-1 ps-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <div class="pb-md-4 h-75 d-flex flex-column justify-content-center align-items-center">
                            <span id="cargo-nome" class="fw-bold fs-2">Admin</span>
                            <img src="../img/person-fill.svg" class="img-fluid login-img" alt="login">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center gap-4 my-md-3">
                        <!-- conteúdo -->
                        <input type="text" class="w-75 form-control" placeholder="Email">
                        <input type="password" class="w-75 form-control" placeholder="Senha">
                        <button class="login-botao mb-3 mb-md-0">Entrar</button>
                    </div>
                </form>
            </div>

        </section>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        function abrirLogin(cargo) {
            document.getElementById("tela-cargo").classList.add("hidden");
            document.getElementById("tela-login").classList.remove("hidden");

            document.getElementById("cargo-nome").innerText = cargo;
        }

        function voltarIndex() {
            document.getElementById("tela-login").classList.add("hidden");
            document.getElementById("tela-cargo").classList.remove("hidden");
        }
    </script>
</body>

</html>