<?php

session_start();

require_once('../model/Produto.php');

$produto = new Produto();
$listar_produto = $produto->listar();
$dados = $produto->listar_por_id();

require_once('../model/Categoria.php');


$categoria = new Categoria();
$listar_categoria = $categoria->listar();

// print_r($produto);





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
    <link rel="stylesheet" href="../static/css/styleprodutos.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- ══ HEADER ══ -->
    <header class="admin-header" id="cabecalho">
        <a href="admin.php" class="btn-icon" aria-label="Voltar">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span class="admin-header-title">Produtos</span>
        <div class="d-flex gap-2">
            <!-- PHP: onclick="abrirCadastrar()" -->
            <button class="btn-icon" onclick="abrirCadastrar()" aria-label="Novo produto" title="Novo produto">
                <i class="bi bi-plus-lg"></i>
            </button>
            <!-- PHP: onclick="abrirCategoria()" -->
            <button class="btn-icon" onclick="abrirCategoria()" aria-label="Gerenciar categorias" title="Categorias">
                <i class="bi bi-tag-fill"></i>
            </button>
        </div>
    </header>

    <!-- ══ LISTAGEM ══ -->
    <main class="admin-main" id="listagem">

        <p class="section-label mt-2">Cardápio cadastrado</p>

        <?php foreach ($listar_produto as $p) { ?>

            <!-- Produto 1 -->
            <div class="list-card">
                <img class="list-card-img" src="../img/<?= $p['foto'] ?>" alt="sem imagem">
                <div class="list-card-body">
                    <p class="list-card-title"><?= $p['nome_produto'] ?></p>
                    <p class="list-card-meta">
                         · 
                        <?= $p['id_categoria'] ?> · <span class="price-tag">R$ <?= number_format($p['preco'], 2, ',', '.') ?></span>
                    </p>
                    <p class="list-card-meta" style="margin-top:3px;-webkit-line-clamp:1;display:-webkit-box;-webkit-box-orient:vertical;overflow:hidden;">
                        <?= $p['descricao'] ?>

                    </p>
                </div>
                <div class="list-card-actions">

                    <a href="produtoseditar.php?id=<?= $p['id'] ?>" class="action-btn edit" aria-label="Editar">
                        <i class="bi bi-pen-fill"></i>
                    </a>

                    <a href="../actions/produto_remover.php?id=<?= $p['id'] ?>" class="action-btn del" aria-label="Excluir">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </div>
            </div>


        <?php } ?>

    </main>

    <!-- ══ CADASTRAR PRODUTO ══ -->
    <section class="admin-main hidden" id="cadastrar">
        <div class="form-panel">
            <p class="form-panel-title">
                <i class="bi bi-plus-circle-fill me-2" style="color:var(--c-mid)"></i>
                Cadastrar produto
            </p>

            <form PHP: action="../actions/produto_cadastrar.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">

                <div>
                    <label class="form-label-brand" for="fotoCadastrar">Imagem do produto</label>
                    <input type="file" id="fotoCadastrar" name="foto" accept="image/*"
                        class="form-control-brand" style="padding:7px 12px;" required>
                </div>

                <div>
                    <label class="form-label-brand" for="nomeCadastrar">Nome do produto</label>
                    <input type="text" id="nomeCadastrar" name="nome"
                        placeholder="Ex: Filé ao molho madeira"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="precoCadastrar">Preço (R$)</label>
                    <input type="number" id="precoCadastrar" name="preco"
                        placeholder="0,00" step="0.01" min="0"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="categoriaCadastrar">Categoria</label>
                    <select id="categoriaCadastrar" name="id_categoria" class="form-control-brand" required>

                        <?php foreach ($listar_categoria as $c) { ?>
                            <option value="<?= $c['id'] ?>"><?= $c['categoria'] ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div>
                    <label class="form-label-brand" for="descricaoCadastrar">Descrição</label>
                    <textarea id="descricaoCadastrar" name="descricao"
                        placeholder="Descreva o prato brevemente..."
                        class="form-control-brand" rows="3"
                        style="resize:none;"></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-danger-brand" onclick="voltar()">
                        <i class="bi bi-x-lg"></i> Cancelar
                    </button>
                    <button type="submit" class="btn-primary-brand">
                        <i class="bi bi-check-lg"></i> Cadastrar
                    </button>
                </div>

            </form>
        </div>
    </section>

    <!-- ══ CATEGORIAS ══ -->
    <section class="hidden" id="categorias">

        <header class="admin-header" id="cabecalhoCategorias">
            <button class="btn-icon" onclick="voltar()" aria-label="Voltar">
                <i class="bi bi-arrow-left"></i>
            </button>
            <span class="admin-header-title">Categorias</span>
            <button class="btn-icon" onclick="abrirCategoriaCadastrar()" aria-label="Nova categoria">
                <i class="bi bi-plus-lg"></i>
            </button>
        </header>

        <div class="admin-main">
            <p class="section-label mt-2">Categorias cadastradas</p>

            <?php foreach ($listar_categoria as $c) { ?>

                <div class="cat-list-card">
                    <?= $c['categoria'] ?>
                    <span class="cat-list-card-name">Entradas</span>

                    <a href="../actions/categoria_remover.php?id=<?= $c['id'] ?>" class="action-btn del" aria-label="Excluir">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </div>

            <?php } ?>

        </div>
    </section>

    <!-- ══ CADASTRAR CATEGORIA ══ -->
    <section class="hidden" id="categoria-cadastro" >

        <header class="admin-header">
            <button class="btn-icon" onclick="voltarCategoria()" aria-label="Voltar">
                <i class="bi bi-arrow-left"></i>
            </button>
            <span class="admin-header-title">Nova categoria</span>
            <div style="width:40px"></div>
        </header>

        <div class="admin-main">

            <div class="form-panel">
                <p class="form-panel-title">
                    <i class="bi bi-tag-fill me-2" style="color:var(--c-mid)"></i>
                    Nova categoria
                </p>

                <form action="../actions/categoria_cadastrar.php" method="POST" class="d-flex flex-column gap-3">

                    <div>
                        <label class="form-label-brand" for="nomeCategoria">Nome da categoria</label>
                        <input type="text" id="nomeCategoria" name="nome_categoria"
                            placeholder="Ex: Grelhados"
                            class="form-control-brand" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-danger-brand" onclick="voltarCategoria()">
                            <i class="bi bi-x-lg"></i> Cancelar
                        </button>
                        <button type="submit" class="btn-primary-brand">
                            <i class="bi bi-check-lg"></i> Cadastrar
                        </button>
                    </div>

                </form>
            </div>
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

        function voltar() {
            document.getElementById("cabecalho").classList.remove("hidden");
            document.getElementById("listagem").classList.remove("hidden");
            document.getElementById("cadastrar").classList.add("hidden");
            document.getElementById("categorias").classList.add("hidden");
        }

        function abrirCategoria() {

            document.getElementById("cabecalho").classList.add("hidden");
            document.getElementById("listagem").classList.add("hidden");
            document.getElementById("categorias").classList.remove("hidden");

        }

        function abrirCategoriaCadastrar() {

            document.getElementById("categorias").classList.add("hidden");
            document.getElementById("categoria-cadastro").classList.remove("hidden");

        }

        function voltarCategoria() {

            document.getElementById("categorias").classList.remove("hidden");
            document.getElementById("categoria-cadastro").classList.add("hidden");

        }
    </script>

    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>