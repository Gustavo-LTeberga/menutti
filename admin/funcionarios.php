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
    <link rel="stylesheet" href="../static/css/admin-funcionarios.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="container-fluid p-0 color-three inter-uniquifier">

    <!-- Mobile First -->



    <!-- Voltar -->

    <header id="cabecalho" class="container-fluid sticky-top color-two d-flex align-items-center justify-content-between p-4">

        <!-- Título -->

        <div class=" fs-1 ">
            <a class="ps-5 text-white" href="index.php"><i class="bi bi-arrow-left"></i></a>
        </div>


        <!-- Adicionar -->

        <button onclick="abrirCadastrar()" class="me-3  fs-1 text-white p-2 d-flex justify-content-center botao-adicionar ">
            <i class="bi bi-plus-lg"></i>
        </button>


    </header>



    <section id="listagem" class="container-fluid d-flex flex-column align-items-center justify-content-center ">

        <div class="row card-funcionarios my-4">

            <!-- IMAGEM -->
            <div class="col-12 col-md-4 p-2 text-center my-auto">
                <img class="img-fluid rounded w-50 h-50" src="../img/person-fill.svg" alt="imagem">
            </div>

            <!-- CONTEÚDO -->
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center ">

                <div class="fs-4 fw-bold">
                    Nome Completo
                </div>
                <div class="fs-6 fw-semibold">
                    admin
                </div>
                <div class="fs-4 fw-bold">
                    Email
                </div>
                <div class="fs-6 fw-semibold">
                    admin@gmail.com
                </div>
                <div class="fs-4 fw-bold">
                    Cargo
                </div>
                <div class="fs-6 fw-semibold">
                    admin
                </div>

            </div>

            <div class="col-12 col-md-3 p-3 d-flex d-flex flex-column justify-content-center align-items-center gap-2">

                <button onclick="abrirEditar()" class=" fs-1 text-white p-2 d-flex justify-content-center botao-edits color-two">
                    <i class="bi bi-pen-fill"></i>
                </button>
                <button class=" fs-1 text-white p-2 d-flex justify-content-center botao-edits bg-danger">
                    <i class="bi bi-trash3-fill"></i>
                </button>

            </div>

        </div>

    </section>

    <section id="cadastrar" class="d-flex justify-content-center my-3 hidden">

        <div class="card-cadastrar py-4">

            <!-- Cabeçalho -->
            <div class="py-4">
                <div class="fs-1 fw-bold text-center">Cadastrar Funcionário</div>
            </div>

            <!-- Formulário -->
            <form method="POST" action="" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome_completo" required class=" form-control fw-semibold">
                </div>



                <!-- Email -->
                <div class="">
                    <label class="fs-4 " for="email">Email</label>
                    <input type="email" id="email" name="email" required class=" form-control fw-semibold">
                </div>



                <!-- Senha -->
                <div class="">
                    <label class="fs-4 " for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required class=" form-control fw-semibold">
                </div>


                <!-- Cargo -->
                <div class="">
                    <label class="fs-4 " for="cargo">Cargo</label>
                    <select id="cargo" name="id_cargo" required class=" form-control fw-semibold">

                        <option value="1">Admin</option>
                        <option value="2">Chefe</option>
                        <option value="3">Caixa</option>
                        <option value="4">Gaçom</option>

                    </select>
                </div>


                <!-- Botões -->
                <div class="pt-3 d-flex flex-column flex-sm-row-reverse align-items-center justify-content-center gap-4">
                    <button class="botao-edits p-2 color-one fw-bold" type="submit">Cadastrar</button>
                    <button onclick="voltar()" class="botao-edits p-2 bg-danger fw-bold" type="reset">Cancelar</button>
                </div>

            </form>

        </div>

    </section>

    <section id="editar" class="d-flex justify-content-center my-3 hidden">

        <div class="card-cadastrar py-4">

            <!-- Cabeçalho -->
            <div class="py-4">
                <div class="fs-1 fw-bold text-center">Editar Funcionário</div>
            </div>

            <!-- Formulário -->
            <form method="POST" action="" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome_completo" value="nome" required class=" form-control fw-semibold">
                </div>



                <!-- Email -->
                <div class="">
                    <label class="fs-4 " for="email">Email</label>
                    <input type="email" id="email" name="email" value="admin@gmail.com" required class=" form-control fw-semibold">
                </div>



                <!-- Senha -->
                <div class="">
                    <label class="fs-4 " for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required class=" form-control fw-semibold">
                </div>


                <!-- Cargo -->
                <div class="">
                    <label class="fs-4 " for="cargo">Cargo</label>
                    <select id="cargo" name="id_cargo" required class=" form-control fw-semibold">

                        <option value="1">Admin</option>
                        <option value="2">Chefe</option>
                        <option value="3">Caixa</option>
                        <option value="4">Gaçom</option>

                    </select>
                </div>


                <!-- Botões -->
                <div class="pt-3 d-flex flex-column flex-sm-row-reverse align-items-center justify-content-center gap-4">
                    <button class="botao-edits p-2 color-one fw-bold" type="submit">Salvar Alteração</button>
                    <button onclick="voltar()" class="botao-edits p-2 bg-danger fw-bold" type="reset">Cancelar</button>
                </div>

            </form>

        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        function abrirCadastrar() {

            document.getElementById("cabecalho").classList.add("hidden");
            document.getElementById("listagem").classList.add("hidden");
            document.getElementById("cadastrar").classList.remove("hidden");

        }

         function abrirEditar() {

            document.getElementById("cabecalho").classList.add("hidden");
            document.getElementById("listagem").classList.add("hidden");
            document.getElementById("editar").classList.remove("hidden");

        }

        function voltar() {
            document.getElementById("cabecalho").classList.remove("hidden");
            document.getElementById("listagem").classList.remove("hidden");
            document.getElementById("cadastrar").classList.add("hidden");
            document.getElementById("editar").classList.add("hidden");
        }

    </script>
</body>

</html>