<?php

// Verificar se a página está sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Importar o arquivo da classe:
        require_once('../model/Funcionario.php');
        // Instanciar um obj do tipo "Usuario":
        $f = new Funcionario();
        // Obter os dados vindos do POST:
        $f->nome_completo = strip_tags($_POST['nome_completo']);
        $f->email = strip_tags($_POST['email']);
        $f->senha = strip_tags($_POST['senha']);
        $f->id_cargo = strip_tags($_POST['id_cargo']);

        // Verificar se os campos foram preenchidos:
        if(empty($f->nome_completo) || empty($f->email) || empty($f->senha) || !filter_var($f->email, FILTER_VALIDATE_EMAIL)){
            echo "Os campos nome completo, e-mail e senha são obrigatórios, e o e-mail deve ser válido.";
            exit;
        }

        // Executar o INSERT:
        $resultado = $f->cadastrar();

        // Se der certo, voltar o usuário para a listagem de contato:
        if($resultado == 1){
            // Criar uma sessão temporária para mostrar a mensagem de sucesso:
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "sucesso",
                "mensagem" => "Funcionário cadastrado com sucesso!"
            ];
            header('Location: ../admin/index.php');
            exit();
        }else{
            // Criar uma sessão temporária para mostrar a mensagem de erro:
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "erro",
                "mensagem" => "Falha ao cadastrar funcionário."
            ];
            header('Location: ../admin/index.php');
            exit();
        }

    }else{
        echo 'Essa página só pode ser carregada por POST!';
    }

?>