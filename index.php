<?php

include 'Controller/cliente.controller.php';
include 'Controller/conta.controller.php';
include 'Controller/transacao.controller.php';
include 'Controller/deposito.controller.php';

$url = $_SERVER['REQUEST_URI'];

switch($url)
{
    case '/bancorm/':
        include "View/home/html/home.html";
        break;
    
    /////////

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

    /////////

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

    case '/bancorm/cliente/atualizar/atualizar':
        $resposta = ClienteController::atualizar();
        echo $resposta;
        break;

    /////////

    case '/bancorm/contacorrente':
        ContaController::home_mostrar();
        break;

    case '/bancorm/contacorrente/incluir':
        ContaController::incluir_mostrar();
        break;

    case '/bancorm/contacorrente/consultar':
        ContaController::consultar_mostrar();
        break;
    
    case '/bancorm/contacorrente/atualizar':
        ContaController::atualizar_mostrar();
        break;

    case '/bancorm/contacorrente/listar':
        ContaController::listar_mostrar();
        break;

    case '/bancorm/contacorrente/deletar':
        ContaController::deletar_mostrar();
        break;

    /////////

    case '/bancorm/contacorrente/incluir/incluir':
        $resposta = ContaController::incluir();
        echo $resposta;
        break;
    
    case '/bancorm/contacorrente/consultar/consultar':
        $resposta = ContaController::consultar();
        echo $resposta;
        break;

    case '/bancorm/contacorrente/listar/listar':
        $resposta = ContaController::listar();
        echo $resposta;
        break;

    case '/bancorm/contacorrente/deletar/apagar':
        $resposta = ContaController::deletar();
        echo $resposta;
        break;

    case '/bancorm/contacorrente/atualizar/atualizar':
        $resposta = ContaController::atualizar();
        echo $resposta;
        break;
    

    /////////

    case '/bancorm/transacao':
        TransacaoController::home_mostrar();
        break;

    case '/bancorm/transacao/incluir':
        TransacaoController::incluir_mostrar();
        break;
    
    case '/bancorm/transacao/atualizar':
        TransacaoController::atualizar_mostrar();
        break;

    case '/bancorm/transacao/consultar':
        TransacaoController::consultar_mostrar();
        break;

    case '/bancorm/transacao/listar':
        TransacaoController::listar_mostrar();
        break;

    case '/bancorm/transacao/deletar':
        TransacaoController::deletar_mostrar();
        break;

    /////////

    case '/bancorm/transacao/incluir/salvar':
        $resposta = TransacaoController::incluir();
        echo $resposta;
        break;

        
    case '/bancorm/transacao/listar/listar':
        $resposta = TransacaoController::listar();
        echo $resposta;
        break;

    case '/bancorm/transacao/consultar/consultar':
        $resposta = TransacaoController::consultar();
        echo $resposta;
        break;

    case '/bancorm/transacao/deletar/apagar':
        $resposta = TransacaoController::deletar();
        echo $resposta;
        break;

    case '/bancorm/transacao/atualizar/atualizar':
        $resposta = TransacaoController::atualizar();
        echo $resposta;
        break;

    /////////

    case '/bancorm/deposito':
        DepositoController::home_mostrar();
        break;

    case '/bancorm/deposito/incluir':
        DepositoController::incluir_mostrar();
        break;

    case '/bancorm/deposito/consultar':
        DepositoController::consultar_mostrar();
        break;
    
    case '/bancorm/deposito/atualizar':
        DepositoController::atualizar_mostrar();
        break;

    case '/bancorm/deposito/listar':
        DepositoController::listar_mostrar();
        break;

    case '/bancorm/deposito/deletar':
        DepositoController::deletar_mostrar();
        break;

    /////////

    case '/bancorm/deposito/incluir/salvar':
        $resposta = DepositoController::incluir();
        echo $resposta;
        break;

        
    case '/bancorm/deposito/listar/listar':
        $resposta = DepositoController::listar();
        echo $resposta;
        break;

    case '/bancorm/deposito/consultar/consultar':
        $resposta = DepositoController::consultar();
        echo $resposta;
        break;

    case '/bancorm/deposito/deletar/apagar':
        $resposta = DepositoController::deletar();
        echo $resposta;
        break;

    case '/bancorm/deposito/atualizar/atualizar':
        $resposta = DepositoController::atualizar();
        echo $resposta;
        break;


    default:
        echo "erro 404";
        break;
};

?>