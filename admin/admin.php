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
    <link rel="stylesheet" href="../static/css/styleadmin.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

    <header class="admin-header">
      
        <a href="index.php" class="btn-icon" aria-label="Sair">
            <i class="bi bi-box-arrow-left"></i>
        </a>
        <span class="admin-header-title">Menutti</span>
        <div style="width:40px"></div><!-- espaçador para centralizar título -->
    </header>

    <main class="admin-main">

        <p class="section-label mt-4">Selecione a área</p>

        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">

            <a href="funcionarios.php" class="user-card">
                <i class="bi bi-people-fill user-card-icon"></i>
                <span class="user-card-label">Funcionários</span>
            </a>

            <a href="produtos.php" class="user-card">
                <i class="bi bi-fork-knife user-card-icon"></i>
                <span class="user-card-label">Produtos</span>
            </a>

        </div>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>