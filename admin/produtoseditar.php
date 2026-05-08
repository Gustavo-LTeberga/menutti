<?php
// Verificar se o id está na URL:
if(!isset($_GET['id'])){
    echo "O id precisa estar setado na URL";
    exit;
}else{
    require_once('../model/Produto.php');
    require_once('../model/Categoria.php');

    $p = new Produto();
    $p->id = $_GET['id'];

    $dados = $p->listar_por_id();

    // Buscar categorias
    $categoria = new Categoria();
    $listar_categoria = $categoria->listar();
}
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
    <link rel="stylesheet" href="../static/css/admin-index.css">
    <link rel="stylesheet" href="../static/css/admin-funcionarios.css">
    <link rel="stylesheet" href="../static/css/admin-produtos.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="container-fluid p-0 color-three inter-uniquifier">


    <section id="editar" class="d-flex justify-content-center my-3">

        <div class="card-cadastrar py-4">

            <!-- Cabeçalho -->
            <div class="py-4">
                <div class="fs-1 fw-bold text-center">Editar Produto</div>
            </div>

            <!-- Formulário -->
            <form action="../actions/produto_editar.php" method="POST" enctype="multipart/form-data" class=" d-flex flex-column justify-content-center pb-5 px-5 gap-3 fw-semibold">

                <input type="hidden" name="id" value="<?= $dados['id']; ?>">

                <div>
                    <label class="fs-4" for="foto">Alterar Imagem:</label>
                    <input type="file" name="foto" id="fotoProdutoEditar" class=" form-control fw-semibold">
                </div>

                <!-- Nome -->
                <div class="">
                    <label class="fs-4 " for="nome">Nome do produto</label>
                    <input type="text" id="nomeProdutoEditar" value="<?= $dados['nome_produto']; ?>" name="nome" required class=" form-control fw-semibold">
                </div>



                <!-- Preço -->
                <div class="">
                    <label class="fs-4 " for="preco">Preço</label>
                    <input type="number" name="preco" id="precoProdutoEditar" value="<?= $dados['preco']; ?>" step="0.01" required class="form-control fw-semibold">
                </div>


                <!-- Categoria -->
                <div class="">
                    <label class="fs-4 " for="cargo">Categoria</label>
                    <select id="cargoProdutoEditar" name="id_categoria" required class=" form-control fw-semibold">

                        <?php foreach($listar_categoria as $c){ ?>

                            <option value="<?= $c['id']; ?>"
                                <?= ($c['id'] == $dados['id_categoria']) ? 'selected' : ''; ?>>

                                <?= $c['categoria']; ?>

                            </option>

                        <?php } ?>


                    </select>
                </div>

                <!-- Descrição -->

                <div class="">
                    <label class="fs-4 " for="descricao">Descrição</label>
                    <input type="text" id="descricaoProdutoEditar" value="<?= $dados['descricao']; ?>" name="descricao" required class=" form-control fw-semibold">
                </div>


                <!-- Botões -->
                <div class="pt-3 d-flex flex-column flex-sm-row-reverse align-items-center justify-content-center gap-4">
                    <button class="botao-edits p-2 color-one fw-bold" type="submit">Salvar Alterações</button>
                    <a href="produtos.php"  class="botao-edits p-2 bg-danger fw-bold text-center text-black text-decoration-none" type="reset">Cancelar</a>
                </div>

            </form>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>