<?php

class ClienteController
{

    public static function home_mostrar(){
        include 'View/cliente/html/homeCliente.html';
    }

    public static function incluir_mostrar(){
        include 'View/cliente/html/incluirCliente.html';
    }

    public static function atualizar_mostrar(){
        include 'View/cliente/html/atualizarCliente.html';
    }

    public static function listar_mostrar(){
        include 'View/cliente/html/listarCliente.html';
    }

    public static function consultar_mostrar(){
        include 'View/cliente/html/consultarCliente.html';
    }

    public static function deletar_mostrar(){
        include 'View/cliente/html/deletarCliente.html';
    }

    public static function incluir(){
        include 'Controller/util.controller.php';
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $model->cpf = $_POST['cpf'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];

        $array = $model->incluir($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = UtilController::json_response($valorCodigo, $arrayConteudo); 

        return $resposta;
    }

    public static function deletar(){
        include 'Controller/util.controller.php';
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $model->cpf = $_POST['cpf'];

        $array = $model->deletar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = UtilController::json_response($valorCodigo, $arrayConteudo);
        return $resposta;
    }

    public static function listar(){
        include 'Controller/util.controller.php';
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $array = $model->listar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = UtilController::json_response($valorCodigo, $arrayConteudo); 

        return $resposta;

    }

    public static function atualizar(){
        include 'Controller/util.controller.php';
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $tipoAtualizacao = $_POST['tipoAtualizacao'];

        switch($tipoAtualizacao)
        {
            case 1: //atualizar nome
                $model->cpf = $_POST['cpf'];
                $model->nome = $_POST['nome'];

                $array = $model->atualizar($model, $tipoAtualizacao);
                $arrayConteudo = $array['conteudo'];
                $valorCodigo = $array['codigo'];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2: //atualizar telefone
                $model->cpf = $_POST['cpf'];
                $model->telefone = $_POST['telefone'];

                $array = $model->atualizar($model, $tipoAtualizacao);
                $arrayConteudo = $array['conteudo'];
                $valorCodigo = $array['codigo'];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }
        
    }

    public static function consultar(){
        include 'Controller/util.controller.php';
        include 'Model/cliente.model.php';

        $model = new ClienteModel();
        
        $tipoConsulta = $_POST['tipoConsulta'];

        switch($tipoConsulta)
        {
            case 1:
                $model->cpf = $_POST['cpf'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2:
                $model->nome = $_POST['nome'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                $model->telefone = $_POST['telefone'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = UtilController::json_response($valorCodigo, $arrayConteudo);
                return $json;
        }
    }

   

}

?>