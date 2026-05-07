<?php
// https://effmax.com.br/brcferramentas/img/img_prd_default.jpg
// Verificar se a página está sendo carregada por POST:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se a pessoa está logada:
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../admin/index.php');
        exit();
    }
    require_once('../model/Produto.php');
    $p = new Produto();

    $p->foto = $_POST['foto'];
    $p->nome_produto = strip_tags($_POST['nome']);
    $p->descricao = strip_tags($_POST['descricao']);
    $p->preco = strip_tags($_POST['preco']);
    $p->id_categoria = strip_tags($_POST['id_categoria']);

    // Verificar se os campos foram preenchidos:
    if (empty($p->foto) || empty($p->nome_produto) || empty($p->descricao) || empty($p->preco) || empty($p->id_categoria)) {
        $_SESSION['alerta'] = [
            'tipo' => 'erro',
            'mensagem' => 'Preencha todos os campos para cadastrar o produto!'
        ];
        header('Location: ../admin/produtos.php');
        exit();
    }

    // Verificar se a foto foi enviada:
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto'];
        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nome_foto = uniqid() . '.' . $extensao;
        $caminho_foto = '../img/' . $nome_foto;

        // Verificar o tamanho (máximo 500kb) e o formato do arquivo (jpg, jpeg, png):
        $tamanho_maximo = 500 * 1024; // 500kb
        $formatos_permitidos = ['jpg', 'jpeg', 'png'];
        if ($foto['size'] > $tamanho_maximo) {
            $_SESSION['alerta'] = [
                'tipo' => 'erro',
                'mensagem' => 'A foto deve ter no máximo 500kb!'
            ];
            header('Location: ../admin/painel.php');
            exit();
        }
        if (!in_array($extensao, $formatos_permitidos)) {
            $_SESSION['alerta'] = [
                'tipo' => 'erro',
                'mensagem' => 'A foto deve ser um arquivo do tipo JPG, JPEG ou PNG!'
            ];
            header('Location: ../admin/produtos.php');
            exit();
        }

        // Verificar se a foto foi movida:
        if (move_uploaded_file($foto['tmp_name'], $caminho_foto)) {
            $p->foto = $nome_foto;
        } else {
            $_SESSION['alerta'] = [
                'tipo' => 'erro',
                'mensagem' => 'Falha ao enviar a foto! Verifique o arquivo!'
            ];
            header('Location: ../admin/produtos.php');
            exit();
        }
    } else {
        // Se não foi enviada, no banco vai ficar semfoto.jpg
        $p->foto = 'semfoto.jpg';
    }


    // Cadastrar no banco:
    try{
        $resultado = $p->cadastrar();
        if($resultado == 1){
            $_SESSION['alerta'] = [
                'tipo' => 'sucesso',
                'mensagem' => 'Produto cadastrado!'
            ];
            header('Location: ../admin/produtos.php');
            exit();
        }else{
            $_SESSION['alerta'] = [
                'tipo' => 'erro',
                'mensagem' => 'Falha ao cadastrar produto!'
            ];
            header('Location: ../admin/produtos.php');
            exit();
        }
    }catch(Exception $e){
        $_SESSION['alerta'] = [
                'tipo' => 'erro',
                'mensagem' => 'Erro ao cadastrar. '.$e->getMessage()
            ];
            header('Location: ../admin/produtos.php');
            exit();
    }


} else {
    echo 'Essa página só pode ser carregada por POST!';
}
