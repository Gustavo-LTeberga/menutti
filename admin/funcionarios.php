<?php

session_start();

require_once('../model/Funcionario.php');

$funcionario = new Funcionario();
$listar_funcionario = $funcionario->listar();

require_once('../model/Cargo_func.php');


$cargo = new Cargo();
$listar_cargo = $cargo->listar();


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
    <link rel="stylesheet" href="../static/css/stylefuncionarios.css">

    <!-- icones -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>
    <!-- ══ HEADER ══ -->
    <!-- PHP: id="cabecalho" mantido para compatibilidade com JS existente -->
    <header class="admin-header" id="cabecalho">
        <a href="admin.php" class="btn-icon" aria-label="Voltar">
            <i class="bi bi-arrow-left"></i>
        </a>
        <span class="admin-header-title">Funcionários</span>
        <!-- PHP: onclick="abrirCadastrar()" -->
        <button class="btn-icon" onclick="abrirCadastrar()" aria-label="Adicionar funcionário">
            <i class="bi bi-plus-lg"></i>
        </button>
    </header>

    <!-- ══ LISTAGEM ══ -->
    <main class="admin-main" id="listagem">

        <p class="section-label mt-2">Equipe cadastrada</p>

        <?php foreach ($listar_funcionario as $f) { ?>

            <!-- Card funcionário  -->
            <div class="list-card">
                <div class="list-card-img d-flex align-items-center justify-content-center"
                    style="background: var(--c-blue-lt);">
                    <i class="bi bi-person-fill" style="font-size:2rem; color:var(--c-mid);"></i>
                </div>
                <div class="list-card-body">
                    <p class="list-card-title"><?= $f['nome_completo'] ?></p>
                    <p class="list-card-meta"><?= $f['email'] ?></p>
                    <!--— idealmente buscar nome do cargo arrumar depois -->
                    <span class="cargo-badge mt-1"><?= $f['id_cargo'] ?></span>
                </div>
                <div class="list-card-actions">
                    <!-- <?= $f['id'] ?> fazer depois -->
                    <button class="action-btn edit" onclick="abrirEditar()" aria-label="Editar">
                        <i class="bi bi-pen-fill"></i>
                    </button>
                    <a href="../actions/funcionario_excluir.php?id=<?= $f['id'] ?>" class="action-btn del" aria-label="Excluir">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </div>
            </div>

            <!-- PHP: <?php } ?> -->

    </main>

    <!-- ══ CADASTRAR ══ -->
    <section class="admin-main hidden" id="cadastrar">

        <div class="form-panel">
            <p class="form-panel-title">
                <i class="bi bi-person-plus-fill me-2" style="color:var(--c-mid)"></i>
                Cadastrar funcionário
            </p>

            <form action="../actions/funcionario_cadastrar.php" method="POST" class="d-flex flex-column gap-3">

                <div>
                    <label class="form-label-brand" for="nomeCadastrar">Nome completo</label>
                    <input type="text" id="nomeCadastrar" name="nome_completo"
                        placeholder="Nome do funcionário"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="emailCadastrar">Email</label>
                    <input type="email" id="emailCadastrar" name="email"
                        placeholder="email@exemplo.com"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="senhaCadastrar">Senha</label>
                    <input type="password" id="senhaCadastrar" name="senha"
                        placeholder="••••••••"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="cargoCadastrar">Cargo</label>
                    <select id="cargoCadastrar" name="id_cargo" class="form-control-brand" required>
                        <?php foreach ($listar_cargo as $c) { ?>

                            <option value="<?= $c['id'] ?>"><?= $c['nome_cargo'] ?></option>

                        <?php } ?>

                    </select>
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

    <!-- ══ EDITAR ══ FAZER DEPOIS -->
    <section class="admin-main hidden" id="editar">

        <div class="form-panel">
            <p class="form-panel-title">
                <i class="bi bi-pen-fill me-2" style="color:var(--c-mid)"></i>
                Editar funcionário
            </p>

            <!-- PHP: action="../actions/funcionario_editar.php" method="POST" -->
            <form class="d-flex flex-column gap-3">

                <!-- PHP: <input type="hidden" name="id" value="<?= $f['id'] ?>"> -->

                <div>
                    <label class="form-label-brand" for="nomeEditar">Nome completo</label>
                    <!-- PHP: value="<?= $f['nome_completo'] ?>" -->
                    <input type="text" id="nomeEditar" name="nome_completo"
                        value="Nome"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="emailEditar">Email</label>
                    <!-- PHP: value="<?= $f['email'] ?>" -->
                    <input type="email" id="emailEditar" name="email"
                        value="@menutti.com.br"
                        class="form-control-brand" required>
                </div>

                <div>
                    <label class="form-label-brand" for="senhaEditar">Nova senha</label>
                    <input type="password" id="senhaEditar" name="senha"
                        placeholder="Deixe em branco para manter"
                        class="form-control-brand">
                </div>

                <div>
                    <label class="form-label-brand" for="cargoEditar">Cargo</label>
                    <select id="cargoEditar" name="id_cargo" class="form-control-brand" required>
                        <!--
            PHP: <?php foreach ($listar_cargo as $c) { ?>
            <option value="<?= $c['id'] ?>"
              <?= ($c['id'] == $f['id_cargo']) ? 'selected' : '' ?>>
              <?= $c['nome_cargo'] ?>
            </option>
            <?php } ?>
          -->
                        <option value="1">Admin</option>
                        <option value="2">Chefe</option>
                        <option value="3">Caixa</option>
                        <option value="4" selected>Garçom</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-danger-brand" onclick="voltar()">
                        <i class="bi bi-x-lg"></i> Cancelar
                    </button>
                    <button type="submit" class="btn-primary-brand">
                        <i class="bi bi-check-lg"></i> Salvar alterações
                    </button>
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
    <?php include_once('../includes/alertas_includes.php'); ?>
</body>

</html>