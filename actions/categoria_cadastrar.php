<?php



// Verificar se a página está sendo carregada por POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se a pessoa está logada:
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../admin/index.php');
        exit();
    }
    require_once('../model/Categoria.php');
    $c = new Categoria();
    $c->categoria = ucfirst(strip_tags($_POST['nome']));


   // Verificar se nome está vazio:
    if (empty($c->nome)) {
        session_start();
        $_SESSION['alerta'] = [
            "tipo" => "erro",
            "mensagem" => "O nome da categoria deve ser preenchido."
        ];
        header('Location: ../admin/produtos.php');
        exit();
    }

    try{
    $resultado = $c->cadastrar();
        if ($resultado == 1) {
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "sucesso",
                "mensagem" => "Categoria cadastrada com sucesso!"
            ];
            header('Location: ../admin/produtos.php');
            exit();
        } else {
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "erro",
                "mensagem" => "Falha ao cadastrar categoria."
            ];
            header('Location: ../admin/produtos.php');
            exit();
        }
  }catch(Exception $e){
        session_start();
            $_SESSION['alerta'] = [
                "tipo" => "erro",
                "mensagem" => "Falha ao cadastrar categoria. ERRO: ".$e->getCode()
            ];
            header('Location: ../admin/produtos.php');
            exit();
    }
    
} else {
    echo 'Essa página só pode ser carregada por POST!';
}