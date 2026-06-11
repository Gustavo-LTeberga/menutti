<?php

require_once('model/Produto.php');
$produto = new Produto();
$produto->id = $_GET['id'];
$p = $produto->listar_por_id();

// print_r($produto);

// $listar_produtos = $produto->listar();
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

    <link rel="stylesheet" href="static/css/stylepedido.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">



</head>


<body>

    <!-- Mobile First -->

    <header class="site-header">
        <a href="index.php" class="btn-back" aria-label="Voltar">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span class="header-title">Menutti</span>
    </header>


    <!-- Hero imagem do produto -->

    <!-- Resolver tamanho da imagem depois -->
   <div class="product-hero" style="background-image: url('img/<?= $p['foto']; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <span class="hero-badge">Entrada</span> <!-- alterar depois aqui -->
    </div>

    <div class="content-wrap">

        <!-- Info principal -->
        <div class="product-card">
            <p class="product-name"> <?php echo $p['nome_produto']; ?></p>
            <p class="product-price">R$ <?php echo $p['preco']; ?></p>
            <p class="product-desc"><?php echo $p['descricao']; ?></p>

            <hr class="divider">

            <!-- Opções / extras -->
            <!-- <p class="section-title">Personalize</p> -->

            <!-- <label class="option-item"> -->
            <!-- <div> -->
            <!-- <p class="option-label">Sem alho</p> -->
            <!-- </div> -->
            <!-- <input type="checkbox" class="option-check"> -->
            <!-- </label> -->



            <hr class="divider">

            <!-- Observação -->
            <p class="section-title">Observação</p>
            <textarea class="obs-textarea" placeholder="Ex: alergia a frutos do mar, sem pimenta…"></textarea>
        </div>

    </div>


    <div class="bottom-bar">
        <div class="bottom-inner">
            <div class="counter">
                <button class="counter-btn" onclick="changeQty(-1)">−</button>
                <span class="counter-qty" id="qty">1</span>
                <button class="counter-btn" onclick="changeQty(1)">+</button>
            </div>
            <a href="carrinho.php" class="btn-add" id="btn-add">
                Adicionar · R$ <?= number_format($p['preco'], 2, ',', '.') ?>
            </a>
        </div>
    </div>

    <!-- <img class="img-fluid  rounded w-75" src="img/<?= $p['foto']; ?>" alt="imagem"> -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        const BASE_PRICE = <?= $p['preco']; ?>;
        let qty = 1;

        function changeQty(delta) {
            qty = Math.max(1, qty + delta);
            document.getElementById('qty').textContent = qty;
            const total = (BASE_PRICE * qty).toFixed(2).replace('.', ',');
            document.getElementById('btn-add').textContent = `Adicionar · R$ ${total}`;
        }
    </script>

    <script>
        function produto_adicionar_carrinho() {
            // executar um POST para ../actions/produto_adicionar_carrinho.php:
            const quantidade = document.querySelector('.quantidade').textContent;
            const complemento = document.querySelector('.complemento').textContent;
            const observacao = document.querySelector('textarea').value;
            const id_produto = <?= $p['id']; ?>;
            // enviar os dados por POST e redirecionar para o carrinho
            fetch('actions/produto_adicionar_carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id_produto=${id_produto}&quantidade=${quantidade}&complemento=${complemento}&observacao=${observacao}`
            }).then(response => {
                //console.log(response);
                if (response.status === 200) {
                    console.log(response);
                    //window.location.href = 'carrinho.php';
                } else {
                    alert('Erro ao adicionar produto ao carrinho');
                }
            });
        }
    </script>
</body>

</html>