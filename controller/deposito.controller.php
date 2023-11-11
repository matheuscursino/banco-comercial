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
        
    }

    public static function consultar(){
        
    }

    public static function atualizar(){
        
    }

    public static function deletar(){
        
    }


}

?>