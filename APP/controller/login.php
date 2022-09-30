<?php 

require_once ("APP/model/bd.php");

class Login extends Conexao
{

    static function login()
    {
        session_start();
    }


    function verifica_usuario()
    {
        
    }
    
}
?>