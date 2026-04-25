<?php

require_once('Banco.php');

class Produto{
    // Atributos (id, numero):
    public $id;
    public $numero;

    // Métodos: cadastrar (insert), listar (select), listar_por_id (select+where), apagar (delete) editar (update):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO mesa (numero) VALUES (?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id, $this->numero]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM mesa";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $mesa = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $mesa;
    }

    public function listar_por_id(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM mesa WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        $mesa = $comando->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $mesa;
    }
    public function apagar(){
        $pdo = Banco::conectar();
        $sql = "DELETE FROM mesa WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
    public function editar(){
        $pdo = Banco::conectar();
        $sql = "UPDATE mesa SET numero = ? WHERE id = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->numero, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>