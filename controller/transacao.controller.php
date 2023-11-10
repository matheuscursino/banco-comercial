<?php 

class TransacaoController {
    public static function home_mostrar(){
        include 'View/transacao/html/homeTransacao.html';
    }

    public static function incluir_mostrar(){
        include 'View/transacao/html/incluirTransacao.html';
    }

    public static function atualizar_mostrar(){
        include 'View/transacao/html/atualizarTransacao.html';
    }

    public static function consultar_mostrar(){
        include 'View/transacao/html/consultarTransacao.html';
    }

    public static function listar_mostrar(){
        include 'View/transacao/html/listarTransacao.html';
    }

    public static function deletar_mostrar(){
        include 'View/transacao/html/deletarTransacao.html';
    }

    public static function incluir(){
        include 'Controller/util.controller.php';
        include 'Model/transacao.model.php';

        $model = new TransacaoModel();

        $model->idRemetente = $_POST["idRemetente"];
        $model->idDestinatario = $_POST["idDestinatario"];
        $model->valorTransacao = $_POST["valorTransacao"];

        $array = $model->incluir($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        
        return $json;
    }

    public static function listar(){
        include 'Controller/util.controller.php';
        include 'Model/transacao.model.php';

        $model = new TransacaoModel();

        $array = $model->listar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }

    public static function consultar(){
        include 'Controller/util.controller.php';
        include 'Model/transacao.model.php';

        $model = new TransacaoModel();

        $tipoConsulta = $_POST["tipoConsulta"];

        switch($tipoConsulta){
            case 1:
                $model->idTransacao = $_POST["idTransacao"];
                $model->tipoConsulta = $tipoConsulta;

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
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