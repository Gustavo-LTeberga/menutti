<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, nome_cargo):
    public $id;
    public $nome_cargo;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO cargo_funcionarios (nome_cargo) VALUES (?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->nome_cargo]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM cargo_funcionarios";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $cargo = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $cargo;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM cargo_funcionarios WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $cargo = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $cargo;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM cargo_funcionarios WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE cargo_funcionarios SET nome_cargo = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->nome_cargo, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>