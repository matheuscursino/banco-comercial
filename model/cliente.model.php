<?php

class ClienteModel
{
    public $cpf, $nome, $telefone;
    private $conexao;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function incluir(ClienteModel $model){

        $sql = "INSERT INTO clientes (cli_cpf, cli_nome, cli_telefone) VALUES (?, ?, ?)";

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
        $sql = "DELETE FROM clientes WHERE cli_cpf = ?";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->cpf);

        try {
            $consulta->execute();
            $arrayResultados = array(
                "conteudo" => null,
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

    public function listar(){
        $sql = "SELECT * FROM clientes";

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
                $sql = "SELECT * FROM clientes WHERE cli_cpf = ?";

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
                $sql = "SELECT * FROM clientes WHERE cli_nome = ?";

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
            case 3:
                $sql = "SELECT * FROM clientes WHERE cli_telefone = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->telefone);

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
                $sql = "UPDATE clientes SET cli_nome = ? WHERE cli_cpf = ?";

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
                $sql = "UPDATE clientes SET cli_telefone = ? WHERE cli_cpf = ?";

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