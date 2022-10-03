<?php 
require_once("APP/controller/controlador_arquivo.php");


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
       Routas::renderLayout2();
     break;   

      case '/perfil/valida-edicao':

      break;  

      case '/perfil/deleta':
        Routas::renderLayout2(); 
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
        Routas::renderLayout2();
    break;    
    
    default:
       echo "404";
    break;
}


?>