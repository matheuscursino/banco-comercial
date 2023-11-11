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

        $array = $model->listar();

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

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->idRemetente = $_POST["idRemetente"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->idDestinatario = $_POST["idDestinatario"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 4:
                $model->valorTransacao = $_POST["valorTransacao"];
                $model->operador = $_POST["operador"];


                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }
    }

    public static function deletar(){
        include 'Controller/util.controller.php';
        include 'Model/transacao.model.php';

        $model = new TransacaoModel();

        $model->idTransacao = $_POST["idTransacao"];

        $array = $model->deletar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];
        
        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }

    public static function atualizar(){
        include 'Controller/util.controller.php';
        include 'Model/transacao.model.php';

        $model = new TransacaoModel();

        $tipoAtualizacao = $_POST["tipoAtualizacao"];

        switch($tipoAtualizacao){
            case 1:
                $model->idTransacao = $_POST["idTransacao"];
                $model->idRemetente = $_POST["idRemetente"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->idTransacao = $_POST["idTransacao"];
                $model->idDestinatario = $_POST["idDestinatario"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->idTransacao = $_POST["idTransacao"];
                $model->valorTransacao = $_POST["valorTransacao"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }

    }
}

?>