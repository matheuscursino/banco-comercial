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
                $model->id = $_POST['id'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->saldo = $_POST["saldo"];
                $model->operador = $_POST["saldoOperador"];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->dataCriacao = $_POST["data"];
                $model->operador = $_POST["dataOperador"];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 4:
                $model->cpfDono = $_POST["cpf"];

                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;

        }
    }

    public static function listar(){
        include 'Controller/util.controller.php';
        include 'Model/conta.model.php';

        $model = new ContaModel();

        $array = $model->listar();
        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }

    public static function deletar(){
        include 'Controller/util.controller.php';
        include 'Model/conta.model.php';

        $model = new ContaModel();

        $model->id = $_POST["id"];

        $array = $model->deletar($model);


        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $json = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $json;
    }

    public static function atualizar(){
        include 'Controller/util.controller.php';
        include 'Model/conta.model.php';

        $model = new ContaModel();


        $tipoAtualizacao = $_POST["tipoAtualizacao"];

        switch($tipoAtualizacao)
        {
            case 1:
                $model->id = $_POST["id"];
                $model->saldo = $_POST["saldo"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->id = $_POST["id"];
                $model->dataCriacao = $_POST["data"];

                $array = $model->atualizar($model, $tipoAtualizacao);

                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }
    }
}

?>