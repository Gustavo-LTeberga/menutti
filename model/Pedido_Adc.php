<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, id_pedido, id_adicional):
    public $id;
    public $id_pedido;
    public $id_adicional;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO pedido_adc (id_pedido, id_adicional VALUES (?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->id_pedido, $this->id_adicional]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM pedido_adc";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $pedido_adc = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $pedido_adc;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM pedido_adc WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $pedido_adc = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $pedido_adc;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM pedido_adc WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE pedido_adc SET id_pedido = ?, id_adicional = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->id_pedido, $this->id_adicional, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>