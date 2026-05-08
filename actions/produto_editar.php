<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: ../admin/index.php");
    exit;
}

require_once('../model/Produto.php');

$produto = new Produto();



$produto->id = $_POST['id'];
$produto->nome_produto = $_POST['nome'];
$produto->id_categoria = $_POST['id_categoria'];
$produto->descricao = $_POST['descricao'];
$produto->preco = $_POST['preco'];
$produto->id_funcionario = $_SESSION['usuario']['id'];

/* FOTO */
if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){

    $novoNome = time() . "_" . $_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "../img/" . $novoNome
    );

    $produto->foto = $novoNome;

}else{

    $produto->foto = $_POST['foto_antiga'];
}

/* Atualizar */
$produto->editar();

/* Retorno */
header("Location: ../admin/produtos.php");
exit;
?>