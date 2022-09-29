<?php 
include_once("APP/controller/cadastro.php");
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/cadastro':
        Cadastro::cadastroPessoaForm();
    break;

    case '/cadastro-valida':
        Cadastro::cadastroPessoa();
    break;
    
    default:
        # code...
        break;
}


?>