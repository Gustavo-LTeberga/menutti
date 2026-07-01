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

    <div class="login-wrap">
        <div class="login-card">

            <p class="login-logo">Menutti</p>
            <p class="login-subtitle">Painel administrativo</p>

            <form action="../actions/funcionario_logar.php" method="POST" class="d-flex flex-column gap-3">

                <div>
                    <label class="form-label-brand" for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="••••••••"
                        class="form-control-brand" required>
                </div>

                <button type="submit" class="btn-primary-brand w-100 justify-content-center mt-2"
                    style="padding: 12px;">
                    Entrar
                </button>

            </form>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>