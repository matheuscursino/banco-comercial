<?php

class ContaController
{

    public static function home_mostrar(){
        include 'View/conta/html/homeConta.html';
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

}

?>