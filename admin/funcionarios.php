<?php

// Verificar se o usuário está logado:
session_start();
if (!isset($_SESSION['funcionario'])) {
    // Retornar ao login:
    header("Location: index.php");
    exit;
}


// Importar a classe Contato:
require_once('model/Funcionario.php');

// Instanciar um obj do tipo Contato:
$f = new Funcionario();

$f->id_cargo = $_SESSION['funcionario']['id'];

// Executar o SELECT e obter os dados da tabela:
$tabela_funcionarios = $f->listar();

//print_r($tabela_contatos);



?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários Cadastrados</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://i.imgur.com/W1VlRma.png">
    <style>
        /* CSS show do estevinho */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .container {
            max-width: 1000px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            border: none;
        }

        .card-header h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-control,
        .btn {
            border-radius: 8px;
        }

        .btn-primary {
            background: #667eea;
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: #5a6fd8;
        }

        .table {
            margin-top: 20px;
            background: white;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table th {
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        .empty-message {
            text-align: center;
            color: #6c757d;
            font-style: italic;
            padding: 2rem;
        }

        @media (max-width: 768px) {
            .card-header h1 {
                font-size: 1.5rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-end mb-2">
                <a href="actions/usuario_sair.php" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <!-- Cabeçalho -->
            <div class="card-header">
                <h1>Agenda de Funcionário de <?= $_SESSION['funcionario']['nome_completo'] ?></h1>
            </div>

            <div class="card-body p-4">
                <!-- Formulário de Cadastro -->
                <form id="formContato" action="actions/funcionario_cadastrar.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input name="nome_completo" type="text" class="form-control" id="nome_completo" placeholder="Ex: João Silva" required>
                            <div class="invalid-feedback">Por favor, insira o nome completo.</div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="joao@exemplo.com">
                            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
                        </div>
                        
                        <div class="col-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="joao@exemplo.com">
                            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
                        </div>
                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                Cadastrar Funcionário
                            </button>
                        </div>
                    </div>
                </form>

                <hr class="my-4">

                <!-- Tabela de Funcionario -->
                <h5 class="mb-3 text-muted">Funcionários Cadastrados</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="tabelaFuncionarios">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Senha</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody id="corpoTabela">
                            <!-- Funcionários serão listados aqui via PHP -->
                            <?php if (count($tabela_funcionarios) == 0) { ?>
                                <tr id="linhaVazia">
                                    <td colspan="6" class="empty-message">
                                        Nenhum funcionário cadastrado ainda.
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <?php foreach ($tabela_funcionarios as $tf) { ?>
                                    <tr>
                                        <td><?= $tf['nome_completo']; ?></td>
                                        <td><?= $tf['email']; ?></td>
                                        <td><?= $tf['senha']; ?></td>
                                        <td><?= $tf['id_cargo']; ?></td>

                                        <td>
                                            <a href="actions/funcionario_exculuir.php?id=<?= $tf['id']; ?>">Remover</a>
                                            | <a href="editar_funcionario.php?id=<?= $tf['id']; ?>">Editar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once('includes/alertas_include.php'); ?>
</body>

</html>