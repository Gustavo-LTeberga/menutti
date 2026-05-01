<?php

// Verificar se a página está sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Importar o arquivo da classe:
        require_once('../model/Funcionario.php');
        // Instanciar um obj do tipo "Usuario":
        $u = new Funcionario();
        // Obter os dados vindos do POST:
        $u->nome_completo = strip_tags($_POST['nome_completo']);
        $u->email = strip_tags($_POST['email']);
        $u->senha = strip_tags($_POST['senha']);

        // Verificar se os campos foram preenchidos:
        if(empty($u->nome_completo) || empty($u->email) || empty($u->senha) || !filter_var($u->email, FILTER_VALIDATE_EMAIL)){
            echo "Os campos nome completo, e-mail e senha são obrigatórios, e o e-mail deve ser válido.";
            exit;
        }

        // Executar o INSERT:
        $resultado = $u->cadastrar();

        // Se der certo, voltar o usuário para a listagem de contato:
        if($resultado == 1){
            // Criar uma sessão temporária para mostrar a mensagem de sucesso:
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "sucesso",
                "mensagem" => "Funcionário cadastrado com sucesso!"
            ];
            header('Location: ../index.php');
            exit();
        }else{
            // Criar uma sessão temporária para mostrar a mensagem de erro:
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "erro",
                "mensagem" => "Falha ao cadastrar funcionário."
            ];
            header('Location: ../index.php');
            exit();
        }

    }else{
        echo 'Essa página só pode ser carregada por POST!';
    }

?>