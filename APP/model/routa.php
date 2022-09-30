<?php 

include_once("APP/controller/cadastro.php");
include_once("APP/controller/routa_file.php");

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/cadastro':
        Routas::cadastroPessoaForm();
    break;

    case '/cadastro-valida':
        Cadastro::cadastroPessoa();
    break;

    case '/cadastro/criar-perfis':
        Routas::criarPerfis();
    break;   
    
    default:
       
    break;
}


?>