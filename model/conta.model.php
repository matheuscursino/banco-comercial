<?php

class ContaModel
{
    private $conexao;
    public $id, $saldo, $dataCriacao, $cpfDono;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }


    public function incluir(ContaModel $model){
        $sql = "INSERT INTO contas (con_id, con_saldo, con_dataCriacao, con_dono ) VALUES (?, ?, ?, ?)";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->id);
        $consulta->bindValue(2, $model->saldo);
        $consulta->bindValue(3, $model->dataCriacao);
        $consulta->bindValue(4, $model->cpfDono);

        
    }

    public function consultar(ContaModel $model, $tipoConsulta){
        switch ($tipoConsulta)
        {
            case 1: //consulta por id
                break;
            case 2: //consulta por saldo
                break;
            case 3: //consulta por data
                break;
            case 4: //consulta por cpf
                $sql = "SELECT * FROM contas WHERE con_dono = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1,$model->cpfDono);

                try {
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetch(PDO::FETCH_ASSOC);
                    $arrayResultados = array(
                        "conteudo" => $resultadoConsulta,
                        "codigo" => 200
                    );
                    return $arrayResultados;
                } catch(PDOException $e) {
                    $arrayResultados = array(
                        "conteudo" => null,
                        "codigo" => 400
                    );
                    return $arrayResultados;
                }
        }
    }


}

?>