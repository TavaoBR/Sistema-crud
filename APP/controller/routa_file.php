<?php 

class Routas 
{
    public static function cadastroPessoaForm()
    {
        include_once("APP/view/cadastro/cadastrarpessoa.php");
    }

    public static function criarPerfis()
    {
        include_once("APP/view/cadastro/criarperfil.php");
    }

    public static function login()
    {
        include_once("APP/view/login/login.php");
    }

    public static function perfis()
    {
        include_once("APP/view/home.php");
    }
}