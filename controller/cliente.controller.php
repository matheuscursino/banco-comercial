<?php

class ClienteController
{


    public static function json_response($code, $message){
        // clear the old headers
        header_remove();
        // set the actual code
        http_response_code($code);
        // set the header to make sure cache is forced
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        // treat this as json
        header('Content-Type: application/json');
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
            );
        // ok, validation error, or failure
        header('Status: '.$status[$code]);
        // return the encoded json
        return json_encode(array(
            'status' => $code, // success or not?
            'message' => $message
            ));
    }

    public static function home_mostrar(){
        include 'View/cliente/homeCliente.html';
    }

    public static function incluir_mostrar(){
        include 'View/cliente/incluirCliente.html';
    }

    public static function atualizar_mostrar(){
        include 'View/cliente/atualizarCliente.html';
    }

    public static function listar_mostrar(){
        include 'View/cliente/listarCliente.html';
    }

    public static function consultar_mostrar(){
        include 'View/cliente/consultarCliente.html';
    }

    public static function deletar_mostrar(){
        include 'View/cliente/deletarCliente.html';
    }

    public static function incluir(){
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $model->cpf = $_POST['cpf'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];

        $array = $model->incluir($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = self::json_response($valorCodigo, $arrayConteudo); 

        return $resposta;
    }

    public static function deletar(){
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $model->cpf = $_POST['cpf'];

        return $model->deletar($model);
    }

    public static function listar(){
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $array = $model->listar($model);

        $arrayConteudo = $array["conteudo"];
        $valorCodigo = $array["codigo"];

        $resposta = self::json_response($valorCodigo, $arrayConteudo); 

        return $resposta;

    }

    public static function atualizar(){
        include 'Model/cliente.model.php';

        $model = new ClienteModel();

        $model->cpf = $_POST['cpf'];
        $model->nome = $_POST['nome'];
        $model->telefone = $_POST['telefone'];
        
       //  return $model->incluir($model);
        
    }

    public static function consultar(){
        include 'Model/cliente.model.php';

        $model = new ClienteModel();
        
        $tipoConsulta = $_POST['tipoConsulta'];

        switch($tipoConsulta)
        {
            case 1: //consulta por cpf
                $model->cpf = $_POST['cpf'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = self::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 2: //consulta por nome
                $model->cpf = $_POST['nome'];
                $array = $model->consultar($model, $tipoConsulta);
                $arrayConteudo = $array["conteudo"];
                $valorCodigo = $array["codigo"];

                $json = self::json_response($valorCodigo, $arrayConteudo);
                return $json;
            case 3:
                return; //consulta por telefone
        }
    }

   

}

?>