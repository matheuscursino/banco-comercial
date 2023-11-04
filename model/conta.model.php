<?php

class ContaModel
{
    private $conexao;
    public $id, $saldo, $dataCriacao, $cpfDono;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }


}

?>