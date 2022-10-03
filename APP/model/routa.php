<?php 

include_once("APP/controller/cadastro.php");
include_once("APP/controller/login.php");
include_once("APP/controller/routa_file.php");

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url){


    case '/cadastro':
        Routas::cadastroPessoaForm();
    break;

    case '/cadastro-valida':
        Cadastro::cadastroPessoa();
    break;

    case '/cadastro/criar-perfis':
        Routas::renderLayout1();
    break;   

    case '/cadastro/criar-perfis-valida':
        Cadastro::criarPerfil();
    break;    

     case '/perfil/editar-perfil':
       Routas::renderLayout1();
     break;   

      case '/perfil/valida-edicao':

      break;  

      case '/perfil/deleta':
        Routas::renderLayout1(); 
      break;  

    case '/login':
      Routas::login();
    break;    

    case '/login/valida':
        Login::login();
    break;   

    case '/perfis':
        Routas::renderLayout1();
    break;

    case '/perfil/visualizar':
        Routas::renderLayout1();
    break;    
    
    default:
       echo "404";
    break;
}


?>