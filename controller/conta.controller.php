<?php

class ContaController
{

    public static function home_mostrar(){
        include 'View/conta/html/homeConta.html';
    }
    public static function incluir_mostrar(){
        include 'View/conta/html/incluirConta.html';
    }

    public static function atualizar_mostrar(){
        include 'View/conta/html/atualizarConta.html';
    }

    public static function consultar_mostrar(){
        include 'View/conta/html/consultarConta.html';
    }
    public static function listar_mostrar(){
        include 'View/conta/html/listarConta.html';
    }
    public static function deletar_mostrar(){
        include 'View/conta/html/deletarConta.html';
    }

    public static function incluir(){
        include 'Controller/util.controller.php';
        include 'Model/conta.model.php';

        $model = new ContaModel();

        $model->saldo = 0;
        $model->cpfDono = $_POST["cpf"];

        $array = $model->incluir($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }

    public static function consultar(){
        include 'Controller/util.controller.php';
        include 'Model/conta.model.php';

        $model = new ContaModel();

        $tipoConsulta = $_POST["tipoConsulta"];

        switch($tipoConsulta)
        {
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                $model->cpfDono = $_POST["cpf"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;

        }
    }

}

?>