<?php

include_once("APP/model/bd.php");
include_once("APP/controller/login.php");

class Editacao extends Conexao
{
    static function editarPerfil()
    {

        session_start();
        $conexao = new Conexao;
        $conexao->conectar();
        $verifica = new login();
        $verifica->verifica_usuario();

        

    }


}