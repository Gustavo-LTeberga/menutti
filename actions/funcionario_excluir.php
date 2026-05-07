<?php

// admin_excluir.php?id=X
session_start();
if (!isset($_SESSION['usuario'])) {
    // Retornar ao login:
    header("Location: ../admin/index.php");
    exit;
}


// Verificar se o ID existe na URL:
if (isset($_GET['id'])) {
    // Importar a classe Contato:
    require_once('../model/Funcionario.php');
    // Instanciar um obj da classe Contato:
    $c = new Funcionario();
    // Obter o ID de quem será apagado:
    $c->id = $_GET['id'];
    // Executar o DELETE:
    $linhas_apagadas = $c->apagar();

    if ($linhas_apagadas == 1) {
        // Show! Redirecionar de volta à agenda:
        $_SESSION['alerta'] = [
            "tipo" => "sucesso",
            "mensagem" => "O funcionário selecionado foi removido!"
        ];
        header('Location: ../admin/funcionarios.php');
        exit();
    } else {
         $_SESSION['alerta'] = [
            "tipo" => "erro",
            "mensagem" => "Falha ao apagar contato."
        ];
        header('Location: ../admin/funcionarios.php');
        exit();
    }
} else {
    echo "O id precisa constar na URL";
}
