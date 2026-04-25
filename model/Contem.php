<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, id_produto, id_ingredientes):
    public $id;
    public $id_produto;
    public $id_ingredientes;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO contem (id_produto, id_ingredientes) VALUES (?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id, $this->id_produto, $this->id_ingredientes]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM contem";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $contem = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $contem;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM contem WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $contem = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $contem;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM contem WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE contem SET numero = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id_produto,$this->id_ingredientes, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>