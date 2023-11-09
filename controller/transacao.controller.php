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
}

?>