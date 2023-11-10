<?php 

class TransacaoModel{

    public $idRemetente, $idDestinatario, $valorTransacao;
    private $conexao;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=bancorm";
        $this->conexao = new PDO($dsn, 'root', '');
    }

    public function incluir(TransacaoModel $model){
        $sql = "CALL CriarTransacao(?, ?, ?);";
       // $sql = "UPDATE SET con_saldo -= ? FROM contas WHERE con_id = ?rem"
       // $sql = "UPDATE SET con_saldo += ? FROM contas WHERE con_id = ?dest"

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

    public function listar(TransacaoModel $model){
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
                break;
            case 3:
                break;
            case 4:
                break;
        }
    }
}

?>