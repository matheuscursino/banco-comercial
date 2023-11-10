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
}

?>