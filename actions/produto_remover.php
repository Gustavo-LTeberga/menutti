<?php
session_start();
if(!isset($_SESSION['produtos'])){
    header("location: index.php");
    die;
}                                                       


require_once('../model/Produto.php');
if(!isset($_GET['id'])){
    echo "O id precisa estar setado na URL";
    exit;       


}else{
    $p = new Produto(); 
    $p->id = $_GET['id'];
    $p->apagar();
    header("location: ../admin/produtos.php");
}
?>      


    