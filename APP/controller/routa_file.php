<?php 

class Routas 
{
    public static function cadastroPessoaForm()
    {
        include_once("APP/view/cadastro/cadastrarpessoa.php");
    }

    public static function login()
    {
        include_once("APP/view/login/login.php");
    }

    public static function renderLayout1()
    {
        include_once("APP/public/components_extras/render.php");
    }

    public static function renderLayout2()
    {
        include_once("APP/public/components/render.php");
    }

}