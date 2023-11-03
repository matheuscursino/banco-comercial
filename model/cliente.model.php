<?php

class ClienteModel
{
    public $cpf, $nome, $telefone;
    public $conexao;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function incluir(ClienteModel $model){

        $sql = "INSERT INTO cliente (cli_cpf, cli_nome, cli_telefone) VALUES (?, ?, ?)";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->cpf);
        $consulta->bindValue(2, $model->nome);
        $consulta->bindValue(3, $model->telefone);

        try {
            $consulta->execute();
            $arrayResultados = array(
                "conteudo" => null,
                "codigo" => 200
            );
            return $arrayResultados;
        } catch (PDOException $e) {
            $arrayResultados = array(
                "conteudo" => null,
                "codigo" => 400
            );
            return $arrayResultados;
        }
    }

    public function deletar(ClienteModel $model){
        $sql = "DELETE FROM cliente WHERE cli_cpf = ?";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->cpf);

        try {
            $consulta->execute();
            return 200;
        } catch(PDOException $e) {
            return 400;
        }
    }

    public function listar(ClienteModel $model){
        $sql = "SELECT * FROM cliente";

        $consulta = $this->conexao->prepare($sql);

        try {
            $consulta->execute();
            $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
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

    public function consultar(ClienteModel $model, $codigo){

        switch($codigo)
        {
            case 1:
                $sql = "SELECT * FROM cliente WHERE cli_cpf = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->cpf);

                try{
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
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
            case 2:
                $sql = "SELECT * FROM cliente WHERE cli_nome = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->nome);

                try{
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
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

    public function atualizar(ClienteModel $model, $tipoAtualizacao){
        switch($tipoAtualizacao)
        {
            case 1:
                $sql = "UPDATE cliente SET cli_nome = ? WHERE cli_cpf = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->nome);
                $consulta->bindValue(2, $model->cpf);

                try{
                    $consulta->execute();
                    $arrayResultados = array(
                        "conteudo" => null,
                        "codigo" => 200
                    );
                    return $arrayResultados;
                } catch(PDOException $e){
                    $arrayResultados = array(
                        "conteudo" => null,
                        "codigo" => 400
                    );
                    return $arrayResultados;
                }
            case 2:
                $sql = "UPDATE cliente SET cli_telefone = ? WHERE cli_cpf = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->telefone);
                $consulta->bindValue(2, $model->cpf);

                try{
                    $consulta->execute();
                    $arrayResultados = array(
                        "conteudo" => null,
                        "codigo" => 200
                    );
                    return $arrayResultados;
                } catch(PDOException $e){
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