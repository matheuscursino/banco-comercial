<?php 

class TransacaoModel{

    public $idTransacao, $idRemetente, $idDestinatario, $valorTransacao, $operador;
    private $conexao;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function incluir(TransacaoModel $model){
        $sql = "CALL CriarTransacao(?, ?, ?);";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->valorTransacao);
        $consulta->bindValue(2, $model->idDestinatario);
        $consulta->bindValue(3, $model->idRemetente);

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
        $sql = "SELECT * FROM transacoes";

        $consulta = $this->conexao->prepare($sql);
    
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

    public function consultar(TransacaoModel $model, $tipoConsulta){
        switch($tipoConsulta){
            case 1:
                $sql = "SELECT * FROM transacoes WHERE tra_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idTransacao);
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
                $sql = "SELECT * FROM transacoes WHERE tra_contaRemetente = ?";

                $consulta = $this->conexao->prepare($sql);
                            
                $consulta->bindValue(1, $model->idRemetente);
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
                $sql = "SELECT * FROM transacoes WHERE tra_contaDestinataria = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idDestinatario);

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
                        $sql = "SELECT * FROM transacoes WHERE tra_valor > ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorTransacao);

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
                        $sql = "SELECT * FROM transacoes WHERE tra_valor = ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorTransacao);

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
                        $sql = "SELECT * FROM transacoes WHERE tra_valor < ?";

                        $consulta = $this->conexao->prepare($sql);

                        $consulta->bindValue(1, $model->valorTransacao);

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

    public function deletar(TransacaoModel $model){
        $sql = "DELETE FROM transacoes WHERE tra_id = ?";

        $consulta = $this->conexao->prepare($sql);

        $consulta->bindValue(1, $model->idTransacao);

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

    public function atualizar(TransacaoModel $model, $tipoAtualizacao){
        switch($tipoAtualizacao){
            case 1:
                $sql = "UPDATE transacoes SET tra_contaRemetente = ? WHERE tra_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idRemetente);
                $consulta->bindValue(2, $model->idTransacao);

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
            case 2:
                $sql = "UPDATE transacoes SET tra_contaDestinataria = ? WHERE tra_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->idDestinatario);
                $consulta->bindValue(2, $model->idTransacao);

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
                $sql = "UPDATE transacoes SET tra_valor = ? WHERE tra_id = ?";

                $consulta = $this->conexao->prepare($sql);

                $consulta->bindValue(1, $model->valorTransacao);
                $consulta->bindValue(2, $model->idRemetente);

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