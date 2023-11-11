<?php

class DepositoController{

    public static function home_mostrar(){
        include 'View/deposito/html/homeDeposito.html';
    }

    public static function incluir_mostrar(){
        include 'View/deposito/html/incluirDeposito.html';
    }

    public static function listar_mostrar(){
        include 'View/deposito/html/listarDeposito.html';
    }

    public static function atualizar_mostrar(){
        include 'View/deposito/html/atualizarDeposito.html';
    }

    public static function consultar_mostrar(){
        include 'View/deposito/html/consultarDeposito.html';
    }

    public static function deletar_mostrar(){
        include 'View/deposito/html/deletarDeposito.html';
    }

    public static function incluir(){
        include 'Controller/util.controller.php';
        include 'Model/deposito.model.php';

        $model = new DepositoModel();

        $model->cpfCliente = $_POST["cpfCliente"];
        $model->idConta = $_POST["idConta"];
        $model->valorDeposito = $_POST["valorDeposito"];

        $array = $model->incluir($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;    
    }

    public static function listar(){
        include 'Controller/util.controller.php';
        include 'Model/deposito.model.php';

        $model = new DepositoModel();

        $array = $model->listar();

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = UtilController::json_response($valorCodigo, $arrayConteudo); 

        return $resposta;
    }

    public static function consultar(){
        include 'Controller/util.controller.php';
        include 'Model/deposito.model.php';

        $model = new DepositoModel();

        $tipoConsulta = $_POST["tipoConsulta"];

        switch($tipoConsulta){
            case 1:
                $model->idDeposito = $_POST["idDeposito"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->cpfCliente = $_POST["cpfCliente"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->idConta = $_POST["idConta"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 4:
                $model->valorDeposito = $_POST["valorDeposito"];
                $model->operador = $_POST["operador"];


                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }
    }

    public static function atualizar(){
        include 'Controller/util.controller.php';
        include 'Model/deposito.model.php';

        $model = new DepositoModel();

        $tipoAtualizacao = $_POST["tipoAtualizacao"];

        switch($tipoAtualizacao){
            case 1:
                $model->idDeposito = $_POST["idDeposito"];
                $model->cpfCliente = $_POST["cpfCliente"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->idDeposito = $_POST["idDeposito"];
                $model->idConta = $_POST["idConta"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->idDeposito = $_POST["idDeposito"];
                $model->valorDeposito = $_POST["valorDeposito"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }

    }

    public static function deletar(){
        include 'Controller/util.controller.php';
        include 'Model/deposito.model.php';

        $model = new DepositoModel();

        $model->idDeposito = $_POST["idDeposito"];

        $array = $model->deletar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];
        
        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }


}

?>