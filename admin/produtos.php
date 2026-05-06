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
    <link rel="stylesheet" href="../static/css/admin-produtos.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="container-fluid p-0 color-three inter-uniquifier">

    <!-- Mobile First -->



    <!-- Voltar -->

    <header id="cabecalho" class="container-fluid sticky-top color-two d-flex align-items-center justify-content-between p-4">

        <!-- Título -->

        <div class=" fs-1 ">
            <a class="ps-2 ps-md-5 text-white" href="admin.php"><i class="bi bi-arrow-left"></i></a>
        </div>


        <!-- Adicionar e Gerenciar-->

        <div class="d-flex align-items-center jutify-content-center">

            <button onclick="abrirCadastrar()" class="me-3 color-one2  fs-1 text-white p-2 d-flex justify-content-center botao ">
                <i class="bi bi-plus-lg px-4 px-md-2"></i> <span class="texto">Produtos</span>
            </button>

            <button onclick="abrirCategoria()" class="me-3 color-four  fs-1 text-white p-2 d-flex justify-content-center botao ">
                <i class="bi bi-gear-fill px-4 px-md-2"></i> <span class="texto">Categorias</span>
            </button>

        </div>


    </header>



    <section id="listagem" class="container-fluid d-flex flex-column align-items-center justify-content-center ">

        <div class="row card-funcionarios my-4">

            <!-- IMAGEM -->
            <div class="col-12 col-md-4 p-3 text-center my-auto">
                <img class="img-fluid rounded " src="" alt="imagem">
            </div>

            <!-- CONTEÚDO -->
            <div class="col-12 col-md-5 ps-5 ps-md-3 p-3  d-flex flex-column justify-content-center ">

                <div class="fs-4 fw-bold">
                    Nome do produto
                </div>
                <div class="fs-6 fw-semibold">
                    nome
                </div>
                <div class="fs-4 fw-bold">
                    Preço
                </div>
                <div class="fs-6 fw-semibold">
                    X R$
                </div>
                <div class="fs-4 fw-bold">
                    Categoria
                </div>
                <div class="fs-6 fw-semibold">
                    categoria
                </div>
                <div class="fs-4 fw-bold">
                    Descrição
                </div>
                <div class="fs-6 fw-semibold">
                    ...
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
                <div class="fs-1 fw-bold text-center">Cadastrar Produto</div>
            </div>

            <!-- Formulário -->
            <form action="" method="POST" enctype="multipart/form-data" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <div>
                    <label class="fs-4" for="foto">Imagem do produto:</label>
                    <input type="file" name="foto" id="foto" required class=" form-control fw-semibold">
                </div>

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome do produto</label>
                    <input type="text" id="nome" name="nome_completo" required class=" form-control fw-semibold">
                </div>



                <!-- Preço -->
                <div class="">
                    <label class="fs-4 " for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" step="0.01" required class="form-control fw-semibold">
                </div>


                <!-- Categoria -->
                <div class="">
                    <label class="fs-4 " for="cargo">Categoria</label>
                    <select id="cargo" name="id_cargo" required class=" form-control fw-semibold">

                        <option value="">Selecione uma categoria</option>

                    </select>
                </div>

                <!-- Descrição -->

                <div class="">
                    <label class="fs-4 " for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" required class=" form-control fw-semibold">
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
                <div class="fs-1 fw-bold text-center">Editar Produto</div>
            </div>

            <!-- Formulário -->
            <form action="" method="POST" enctype="multipart/form-data" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <div>
                    <label class="fs-4" for="foto">Alterar Imagem:</label>
                    <input type="file" name="foto" id="foto" required class=" form-control fw-semibold">
                </div>

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome do produto</label>
                    <input type="text" id="nome" value="comida" name="nome_completo" required class=" form-control fw-semibold">
                </div>



                <!-- Preço -->
                <div class="">
                    <label class="fs-4 " for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" value="10.00" step="0.01" required class="form-control fw-semibold">
                </div>


                <!-- Categoria -->
                <div class="">
                    <label class="fs-4 " for="cargo">Categoria</label>
                    <select id="cargo" name="id_cargo" required class=" form-control fw-semibold">

                        <option value="">Selecione uma categoria</option>

                    </select>
                </div>

                <!-- Descrição -->

                <div class="">
                    <label class="fs-4 " for="descricao">Descrição</label>
                    <input type="text" id="descricao" value="..." name="descricao" required class=" form-control fw-semibold">
                </div>


                <!-- Botões -->
                <div class="pt-3 d-flex flex-column flex-sm-row-reverse align-items-center justify-content-center gap-4">
                    <button class="botao-edits p-2 color-one fw-bold" type="submit">Salvar Alterações</button>
                    <button onclick="voltar()" class="botao-edits p-2 bg-danger fw-bold" type="reset">Cancelar</button>
                </div>

            </form>

        </div>

    </section>

    <!-- categorias -->

    <section id="categorias" class="hidden">

        <header class="container-fluid sticky-top color-two d-flex align-items-center justify-content-between p-4">

            <!-- Título -->

            <div class=" fs-1 ">
                <a onclick="voltar()" class="ps-2 ps-md-5 text-white" href="#"><i class="bi bi-arrow-left"></i></a>
            </div>


            <!-- Adicionar -->

            <button onclick="abrirCategoriaCadastrar()" class="me-3  fs-1 text-white p-2 d-flex justify-content-center botao-adicionar ">
                <i class="bi bi-pen-fill"></i>
            </button>


        </header>

        <section class="container-fluid d-flex flex-column align-items-center card-categoria-pai mt-5">

            <!-- categorias -->

            <div class="row card-categorias my-4">

                <!-- CONTEÚDO -->
                <div class="col-12 col-md-9 ps-5 p-3  d-flex flex-column justify-content-center ">

                    <div class="fs-4 fw-bold">
                        Nome da categoria
                    </div>

                </div>

                

                <div class="col-12 col-md-3 p-3 d-flex d-flex flex-column justify-content-center align-items-center gap-2">

                    <button class=" fs-1 text-white p-2 d-flex justify-content-center botao-edits bg-danger">
                        <i class="bi bi-trash3-fill"></i>
                    </button>

                </div>

            </div>

        </section>






    </section>

    <section id="categoriaCadastrar" class="d-flex align-items-center justify-content-center vh-100  hidden">

        <div class="card-cadastrar py-4 ">

            <!-- Cabeçalho -->
            <div class="py-4">
                <div class="fs-1 fw-bold text-center">Cadastrar Categoria</div>
            </div>

            <!-- Formulário -->
            <form action="" method="POST" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome da categoria</label>
                    <input type="text" id="nome" name="nome_completo" required class=" form-control fw-semibold">
                </div>


                <!-- Botões -->
                <div class="pt-3 d-flex flex-column flex-sm-row-reverse align-items-center justify-content-center gap-4">
                    <button class="botao-edits p-2 color-one fw-bold" type="submit">Cadastrar</button>
                    <button onclick="voltarCategoria()" class="botao-edits p-2 bg-danger fw-bold" type="reset">Cancelar</button>
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
            document.getElementById("categorias").classList.add("hidden");
        }

        function abrirCategoria() {

            document.getElementById("cabecalho").classList.add("hidden");
            document.getElementById("listagem").classList.add("hidden");
            document.getElementById("categorias").classList.remove("hidden");

        }

        function abrirCategoriaCadastrar() {

            document.getElementById("categorias").classList.add("hidden");
            document.getElementById("categoriaCadastrar").classList.remove("hidden");

        }

        function voltarCategoria() {

             document.getElementById("categorias").classList.remove("hidden");
            document.getElementById("categoriaCadastrar").classList.add("hidden");

        }

        
    </script>
</body>

</html>