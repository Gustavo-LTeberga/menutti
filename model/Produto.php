<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, foto, nome_produto, descricao, preco, id_categoria, id_funcionario):
    public $id;
    public $foto;
    public $nome_produto;
    public $descricao;
    public $preco;
    public $id_categoria;
    public $id_funcionario;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO produtos (foto, nome_produto, descricao, preco, id_categoria, id_funcionario) VALUES (?, ?, ?, ?, ?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->foto, $this->nome_produto, $this->descricao, $this->preco, $this->id_categoria, $this->id_funcionario]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM produtos";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $produtos;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $produto = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $produto;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM produtos WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE produtos SET foto = ?, nome_produto = ?, descricao = ?, preco = ?, id_categoria = ?, id_funcionario = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->foto, $this->nome_produto, $this->descricao, $this->preco, $this->id_categoria, $this->id_funcionario, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>