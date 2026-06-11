<?php

require_once('model/Produto.php');

$produto = new Produto();
if (isset($_GET['categoria'])) {
    $categoria_id = $_GET['categoria'];
    $produto->id_categoria = $categoria_id;
    $listar_produtos = $produto->listar_por_categoria();
} else {
    $listar_produtos = $produto->listar();
}

// print_r($listar_produtos);

// $listar_produtos = $produto->listar();

require_once('model/Categoria.php');

$categoria = new Categoria();
$listar_categoria = $categoria->listar();

// print_r($listar_categoria);

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
    <link rel="stylesheet" href="static/css/styleindex.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- Mobile First -->

    <header class="site-header">
        <div class="header-top">
            <div class="logo-mark">M</div>
            <span class="site-title">Menutti</span>
            <div class="header-actions">
                <a href="carrinho.php" class="btn-cart" aria-label="Carrinho">
                    <i class="bi bi-cart-fill"></i>
                </a>
                <button class="btn-menu-toggle d-md-none" onclick="toggleMobileMenu()" aria-label="Menu">
                    <i class="bi bi-list" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Categorias desktop -->
        <nav class="cat-bar d-none d-md-block" aria-label="Categorias">
            <ul class="cat-list">
                <?php foreach ($listar_categoria as $categoria) { ?>
                    <li><a href="index.php?categoria=<?= $categoria["id"] ?>" class="cat-link"><?= $categoria["categoria"] ?></a></li>
                <?php } ?>
            </ul>
        </nav>

        <!-- Menu mobile colapsável -->
        <div class="mobile-menu d-md-none" id="mobile-menu">
            <ul class="cat-list">
                <?php foreach ($listar_categoria as $categoria) { ?>
                    <li><a href="index.php?categoria=<?= $categoria["id"] ?>" class="cat-link"><?= $categoria["categoria"] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </header>



    <main>

        <!-- Card -->
        <?php foreach ($listar_produtos as $p) { ?>
            <div class="product-card">
                <img class="product-img" src="img/<?= $p['foto']; ?>" alt="<?= $p['nome_produto']; ?>">
                <div class="product-body">
                    <div>
                        <p class="product-name"><?php echo $p['nome_produto']; ?></p>
                        <p class="product-desc"><?php echo $p['descricao']; ?></p>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">R$ <?php echo $p['preco']; ?></span>

                        <a href="pedido.php?id=<?= $p['id'] ?>" class="btn-add">+ Adicionar</a>

                    </div>
                </div>
            </div>
        <?php } ?>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="static/js/index.js"></script>
</body>

</html>