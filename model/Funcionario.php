<?php

require_once('Banco.php');

class Usuario{
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
        $comando->execute([$this->nome_completo, $this->email, hash('sha256', $this->senha)]);
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
}

?>