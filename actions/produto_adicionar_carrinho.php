<?php

session_start();
// obter os dados por post:
$id_produto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];
$complemento = $_POST['complemento'];
$observacao = $_POST['observacao'];
// criar o array do produto:
$produto = array(
    'id_produto' => $id_produto,
    'quantidade' => $quantidade,
    'complemento' => $complemento,
    'observacao' => $observacao
);
// verificar se o carrinho existe na sessão:
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
// adicionar o produto ao carrinho:
array_push($_SESSION['carrinho'], $produto);
// redirecionar para a página de carrinho com codigo 200:
http_response_code(200);
//header('Location: ../carrinho.php');

?>