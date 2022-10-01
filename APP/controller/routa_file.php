<?php 

class Routas 
{
    public static function cadastroPessoaForm()
    {
        include_once("APP/view/cadastro/cadastrarpessoa.php");
    }

    public static function criarPerfis()
    {
        include_once("APP/public/components_extras/render.php");
    }

    public static function login()
    {
        include_once("APP/view/login/login.php");
    }

    public static function perfis()
    {
        include_once("APP/public/components_extras/render.php");
    }
}