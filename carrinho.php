<?php

// require_once('model/Pedido.php');
// $pedido = new Pedido();
// $pedido->id = $_GET['id'];
// $p = $produto->listar_por_id();

// print_r($pedido);

// $listar_produtos = $produto->listar();

// verificar se a sessão do carrinho existe:
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array(); // criar um carrinho vazio
}
//print_r($_SESSION['carrinho']); // exibir o conteúdo do carrinho para teste
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
    <link rel="stylesheet" href="static/css/stylecarrinho.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    <header class="site-header">
        <a href="index.php" class="btn-back" aria-label="Voltar">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span class="header-title">Menutti</span>
        <span class="header-count">X itens</span>
    </header>

    <main>
        <p class="section-label">Seu pedido</p>

        <!-- Item  -->
        <div class="cart-item">
            <div class="cart-img" style="background: linear-gradient(135deg,#F2C6A0,#e0a87c);"></div>
            <div class="cart-info">
                <p class="cart-name">Nome do produto</p>
                <p class="cart-price">R$ X</p>
            </div>
            <div class="counter">
                <button class="counter-btn btn-minus" onclick="changeQty(this, -1)">−</button>
                <span class="counter-qty">1</span>
                <button class="counter-btn btn-plus" onclick="changeQty(this, 1)">+</button>
            </div>
            <button class="btn-remove" aria-label="Remover item"><i class="bi bi-trash3"></i></button>
        </div>

        <!-- Observação -->
        <div class="obs-card">
            <span class="obs-label">Alguma observação?</span>
            <textarea class="obs-textarea" placeholder="Ex: sem cebola, ponto da carne bem passado…"></textarea>
        </div>

        <!-- Resumo -->
        <div class="summary-card">
            <div class="summary-row">
                <span>Nome Produto × Quantidade</span>
                <span>R$ X</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>R$ X</span>
            </div>
        </div>
    </main>



    <div class="bottom-bar">
        <button class="btn-finalizar">Enviar pedido para a cozinha</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeQty(btn, delta) {
            const counter = btn.closest('.counter');
            const qtyEl = counter.querySelector('.counter-qty');
            let qty = parseInt(qtyEl.textContent) + delta;
            if (qty < 1) qty = 1;
            qtyEl.textContent = qty;
        }
    </script>
</body>

</html>

</html>