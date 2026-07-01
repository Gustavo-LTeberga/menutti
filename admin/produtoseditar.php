<?php
// Verificar se o id está na URL:
if (!isset($_GET['id'])) {
    echo "O id precisa estar setado na URL";
    exit;
} else {
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
    <link rel="stylesheet" href="../static/css/styleprodutoeditar.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    <header class="admin-header">

        <a href="produtos.php" class="btn-icon" aria-label="Voltar">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span class="admin-header-title">Editar produto</span>
        <div style="width:40px"></div>
    </header>

    <main class="admin-main">

        <!-- Preview da imagem atual -->
        <div class="form-panel" style="padding:1rem; margin-bottom:0.75rem;">
            <p class="form-label-brand mb-2">Imagem atual</p>
            <div style="width:100%; height:180px; border-radius:var(--radius); overflow:hidden; background:linear-gradient(135deg,#F2C6A0,#c8914e);">
             
        <img src="../img/<?= $dados['foto'] ?>" alt="sem imagem"
             style="width:100%;height:100%;object-fit:cover;">
      
            </div>
        </div>

        <div class="form-panel">
            <p class="form-panel-title">
                <i class="bi bi-pen-fill me-2" style="color:var(--c-mid)"></i>
                Dados do produto
            </p>

            <form action="../actions/produto_editar.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">

            <input type="hidden" name="id" value="<?= $dados['id'] ?>">

                <div>
                    <label class="form-label-brand" for="fotoProdutoEditar">Alterar imagem</label>
                    <input type="file" id="fotoProdutoEditar" name="foto" accept="image/*"
                        class="form-control-brand" style="padding:7px 12px;">
                    <small style="font-size:11px;color:#b0a090;margin-top:4px;display:block;">
                        Deixe em branco para manter a imagem atual
                    </small>
                </div>

                <div>
                    <label class="form-label-brand" for="nomeEditar">Nome do produto</label>
                    <input type="text" id="nomeEditar" name="nome"
                        value="<?= $dados['nome_produto'] ?>"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="precoEditar">Preço (R$)</label>
                    
                    <input type="number" id="precoEditar" name="preco"
                        value="<?= $dados['preco'] ?>" step="0.01" min="0"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="categoriaEditar">Categoria</label>
                    <select id="categoriaEditar" name="id_categoria" class="form-control-brand" required>

                        <?php foreach ($listar_categoria as $c) { ?>
                            <option value="<?= $c['id'] ?>"
                                <?= ($c['id'] == $dados['id_categoria']) ? 'selected' : '' ?>>
                                <?= $c['categoria'] ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div>
                    <label class="form-label-brand" for="descricaoEditar">Descrição</label>
                    <textarea id="descricaoEditar" name="descricao"
                        class="form-control-brand" rows="3"
                        style="resize:none;"><?= $dados['descricao'] ?></textarea>
                </div>

                <div class="form-actions">
                    <a href="produtos.php" class="btn-danger-brand">
                        <i class="bi bi-x-lg"></i> Cancelar
                    </a>
                    <button type="submit" class="btn-primary-brand">
                        <i class="bi bi-check-lg"></i> Salvar alterações
                    </button>
                </div>

            </form>
        </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>