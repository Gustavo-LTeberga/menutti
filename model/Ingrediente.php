<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, nome_ingt, adicional, id_adicional):
    public $id;
    public $nome_ingt;
    public $adicional;
    public $id_adicional;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO ingredientes (nome_ingt, adicional, id_adicional) VALUES (?, ?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->nome_ingt, $this->adicional, $this->id_adicional]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM ingredientes";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $ingrediente = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $ingrediente;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM ingredientes WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $ingrediente = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $ingrediente;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM ingredientes WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE ingredientes SET nome_ingt = ?, adicional = ?, id_adicional = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->nome_ingt, $this->adicional, $this->id_adicional, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>