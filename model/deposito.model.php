<?php

class DepositoModel{
    public $idDeposito, $cpfCliente, $idConta, $valorDeposito, $operador;
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

    public function listar(){
        $sql = "SELECT * FROM depositos";

        $consulta = $this->conexao->prepare($sql);

        try{
            $consulta->execute();
            $resultadosConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $arrayResultados = array(
                "conteudo" => $resultadosConsulta,
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

    public function consultar(DepositoModel $model, $tipoConsulta){
        switch($tipoConsulta){
            case 1:
                $sql = "SELECT * FROM depositos WHERE dep_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idDeposito);
                try{
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    $arrayResultados = array(
                        "conteudo" => $resultadoConsulta,
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
            case 2:
                $sql = "SELECT * FROM depositos WHERE dep_cliente = ?";

                $consulta = $this->conexao->prepare($sql);
                            
                $consulta->bindValue(1, $model->cpfCliente);
                try{
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    $arrayResultados = array(
                        "conteudo" => $resultadoConsulta,
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
            case 3:
                $sql = "SELECT * FROM depositos WHERE dep_conta = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idConta);

                try{
                    $consulta->execute();
                    $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    $arrayResultados = array(
                        "conteudo" => $resultadoConsulta,
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
            case 4:
                switch($model->operador){
                    case "maior":
                        $sql = "SELECT * FROM depositos WHERE dep_valor > ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorDeposito);

                        try{
                            $consulta->execute();
                            $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                            $arrayResultados = array(
                                "conteudo" => $resultadoConsulta,
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
                    case "igual":
                        $sql = "SELECT * FROM depositos WHERE dep_valor = ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorDeposito);

                        try{
                            $consulta->execute();
                            $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                            $arrayResultados = array(
                                "conteudo" => $resultadoConsulta,
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
                    case "menor":
                        $sql = "SELECT * FROM depositos WHERE dep_valor < ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorDeposito);

                        try{
                            $consulta->execute();
                            $resultadoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                            $arrayResultados = array(
                                "conteudo" => $resultadoConsulta,
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
    }

    public function deletar(DepositoModel $model){
        $sql = "DELETE FROM depositos WHERE dep_id = ?";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->idDeposito);

        try{
            $consulta->execute();
            $arrayResultados = array(
                "conteudo" => null,
                "codigo" => 200
            );
            return $arrayResultados;
        }catch(PDOException $e){
            $arrayResultados = array(
                "conteudo" => $e,
                "codigo" => 400
            );
            return $arrayResultados;
        }
    }

    public function atualizar(DepositoModel $model, $tipoAtualizacao){
        switch($tipoAtualizacao){
            case 1:
                $sql = "UPDATE depositos SET dep_cliente = ? WHERE dep_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->cpfCliente);
                $consulta->bindValue(2, $model->idDeposito);

                try{
                    $consulta->execute();
                    $arrayResultados = array(
                        "conteudo" => null,
                        "codigo" => 200
                    );
                    return $arrayResultados;
                }catch(PDOException $e){
                    $arrayResultados = array(
                        "conteudo" => $e,
                        "codigo" => 400
                    );
                    return $arrayResultados;
                }
            case 2:
                $sql = "UPDATE depositos SET dep_conta = ? WHERE dep_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idConta);
                $consulta->bindValue(2, $model->idDeposito);

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
            case 3:
                $sql = "UPDATE depositos SET dep_valor = ? WHERE dep_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->valorDeposito);
                $consulta->bindValue(2, $model->idDeposito);

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
}

?>