<?php

session_start();
if (!isset($_SESSION['funcionario'])) {
    // Retornar ao login:
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('.php');
    $f = new Funcionario();
    $f->id = $_POST['id'];
    // Obter os dados vindos do POST:
    $f->nome_completo = strip_tags($_POST['nome_completo']);
    $f->id_cargo = strip_tags($_POST['id_cargo']);
        header('Location: .php');
        exit();

    $f->email = strip_tags($_POST['email']);

    // Verificar se os campos foram preenchidos:
    if (
        empty($f->nome_completo) || empty($f->email) || !filter_var($f->email, FILTER_VALIDATE_EMAIL)
    ) {
        $_SESSION['alerta'] = [
            "tipo" => "erro",
            "mensagem" => "Os campos nome completo, telefone, e-mail e endereço são obrigatórios."
        ];
        header('Location: .php');
        exit();
    }

    if ($f->editar() > 0) {
        $_SESSION['alerta'] = [
            "tipo" => "sucesso",
            "mensagem" => "Funcionário atualizado!"
        ];
        header('Location: ../admin/funcionarios.php');
        exit();
    } else {
        $_SESSION['alerta'] = [
            "tipo" => "erro",
            "mensagem" => "Erro ao atualizar funcionário."
        ];
        header('Location: ../admin/funcionarios.php');
        exit();
    }
} else {
    echo "Método de requisição inválido.";
}
