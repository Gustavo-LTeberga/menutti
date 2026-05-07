<?php
session_start();
if(!isset($_SESSION['categoria_produtos'])){
    header("location: ../admin/produtos.php");
    die;
}                                                       


require_once('../model/Categoria.php');
if(!isset($_GET['id'])){
    echo "O id precisa estar setado na URL";
    exit;       


}else{
    $c = new Categoria(); 
    $c->id = $_GET['id'];
    $c->apagar();
    header("location: ../admin/produtos.php");
}
?>      


    