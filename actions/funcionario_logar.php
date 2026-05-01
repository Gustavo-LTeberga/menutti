<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Pegar os valores do POST:
    $email = strip_tags($_POST['email']);
    $senha = strip_tags($_POST['senha']);
    // Verificar se os campos estão vazios:
        if(empty($email) || empty($senha)){
            echo "Os campos devem ser preenchidos";
            exit; // interromper a execução
        }
    
    // Instanciar a classe:
    require_once('../model/Funcionario.php');
    $u = new Funcionario();

    $u->email = $email;
    $u->senha = $senha;

    $resultado = $u->logar();

    // Verificar se o usuário acertou email + senha:
        if(count($resultado) == 1){
            // Criar sessão:
            session_start();
            $_SESSION['usuario'] = $resultado[0];
            // Redirecionar para a listagem de contatos:
            header('Location: ../contatos.php');
            exit();
        }else{
            session_start();
            $_SESSION['alerta'] = [
                "tipo" => "erro",
                "mensagem" => "Usuário ou senha inválidos."
            ];
            header('Location: ../index.php');
            exit();
        }
    
}else{
    echo "A página deve ser carregada por POST";
}


?>