<?php
 
require_once('Banco.php');
 
class Categoria{
    // Atributos (id, categoria):
    public $id;
    public $categoria;
 
    // Métodos: cadastrar (insert) e listar (select):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO categoria_produtos (categoria) VALUES (?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->categoria]);
        Banco::desconectar();
        return $comando->rowCount();
    }
 
    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM categoria_produtos ORDER BY categoria";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $categoria = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $categoria;
    }
}
 
?>