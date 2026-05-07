<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../admin/index.php");
    exit;
}

require_once('../model/Produto.php');

$produto = new Produto();

$produto->id = $_POST['id'];
$produto->foto = $_POST['foto'];
$produto->nome_produto = $_POST['nome_produto'];
$produto->descricao = $_POST['descricao'];
$produto->preco = $_POST['preco'];
$produto->id_categoria = $_SESSION['id_categoria']['id'];

/* FOTO */
if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){

    $novoNome = time() . "_" . $_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../pics/" . $novoNome
    );

    $produto->foto = $novoNome;

}else{

    $produto->foto = $_POST['foto_antiga'];
}

/* Atualizar */
$produto->editar();

/* Retorno */
header("Location: ../admin/painel.php");
exit;
?>