<?php

require_once('Banco.php');

class Funcionario{
    // Atributos (id, nome_completo, email, senha e id_cargo):
    public $id;
    public $nome_completo;
    public $email;
    public $senha;
    public $id_cargo;

    // Métodos: cadastrar (insert) e logar (select):
    public function cadastrar(){
        $pdo = Banco::conectar();
        $sql = "INSERT INTO funcionarios (nome_completo, email, senha, id_cargo) VALUES (?, ?, ?, ?)";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->nome_completo, $this->email, hash('sha256', $this->senha), $this->id_cargo]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function logar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM funcionarios WHERE email = ? AND senha = ?";
        $comando = $pdo->prepare($sql);
        $comando->execute([$this->email, hash('sha256', $this->senha)]);
        $funcionario = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $funcionario;
    }

    public function listar(){
        $pdo = Banco::conectar();
        $sql = "SELECT * FROM funcionarios";
        $comando = $pdo->prepare($sql);
        $comando->execute();
        $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $produtos;
    }

    public function listarPorId(){
        $sql = "SELECT * FROM funcionarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    // Método para atualizar um contato existente'
    public function editar(){
        $sql = "UPDATE funcionarios SET nome_completo = ?, email = ?, id_cargo = ? WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([
            $this->nome_completo,
            $this->email,
            $this->id_cargo,
            $this->id
        ]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function apagar(){
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}

?>