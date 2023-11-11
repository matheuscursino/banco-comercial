<?php

class DepositoModel{
    public $cpfCliente, $idConta, $valorDeposito;
    private $conexao;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function incluir(DepositoModel $model){
        $sql = "CALL CriarDeposito(?,?,?)";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->cpfCliente);
        $consulta->bindValue(2, $model->idConta);
        $consulta->bindValue(3, $model->valorDeposito);

        try{
            $consulta->execute();
            $arrayResultados = array(
                "conteudo" => null,
                "codigo" => 200
            );
            return $arrayResultados;
        }catch(PDOException $e){
            $arrayResultados = array(
                "conteudo" => null,
                "codigo" => 400
            );
            return $arrayResultados;
        }
    }
}

?>