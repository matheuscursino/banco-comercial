<?php

include 'Controller/cliente.controller.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/bancorm/':
        include "View/home.php";
        break;
    
    // cliente views

    case '/bancorm/cliente':
        ClienteController::home_mostrar();
        break;

    case '/bancorm/cliente/incluir':
        ClienteController::incluir_mostrar();
        break;

    case '/bancorm/cliente/listar':
        ClienteController::listar_mostrar();
        break;

    case '/bancorm/cliente/consultar':
        ClienteController::consultar_mostrar();
        break;

    case '/bancorm/cliente/deletar':
        ClienteController::deletar_mostrar();
        break;

    case '/bancorm/cliente/atualizar':
        ClienteController::atualizar_mostrar();
        break;

    // cliente métodos

    case '/bancorm/cliente/incluir/salvar':
        $resposta = ClienteController::incluir();
        echo $resposta;
        break;

    case '/bancorm/cliente/deletar/apagar':
        $respostaCodigo = ClienteController::deletar();
        return http_response_code($respostaCodigo);

    case '/bancorm/cliente/listar/listar':
        $resposta = ClienteController::listar();
        echo $resposta;
        break;

    case '/bancorm/cliente/consultar/consultar':
        $resposta = ClienteController::consultar();
        echo $resposta;
        break;

    default:
        echo "erro 404";
        break;
};

?>