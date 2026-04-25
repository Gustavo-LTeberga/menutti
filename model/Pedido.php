<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, id_mesa, id_produto, quantidade, finalizado, observacao, data, id_funcionario):
    public $id;
    public $id_mesa;
    public $id_produto;
    public $quantidade;
    public $finalizado;
    public $observacao;
    public $data;
    public $id_funcionario;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO pedido (id_mesa, id_produto, qualidade, finalizado, observacao, data, id_funcionario VALUES (?, ?, ?, ?, ?, ?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->id_mesa, $this->id_produto, $this->quantidade, $this->finalizado, $this->observacao, $this->data, $this->id_funcionario]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM pedido";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $pedido = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $pedido;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM pedido WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $pedido = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $pedido;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM pedido WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE pedido SET id_mesa = ?, id_produto = ?, qualidade = ?, finalizado = ?, observacao = ?, data = ?, id_funcionario = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->$this->nome_ingt, $this->adicional, $this->id_adicional, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>