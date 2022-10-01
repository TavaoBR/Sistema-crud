<?php 
session_start();
require_once("APP/model/bd.php");
require_once("APP/controller/login.php");
$conexao = new Conexao;
$conexao->conectar();
$verifica = new Login();
$verifica->verifica_usuario();

$id_pessoa = $_SESSION['usuarioID'];
$url_pessoa = $_SESSION['usuarioIDUrl'];
$fk_usuario = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);

$select_pessoa_logada = $conexao->conectar()->prepare("SELECT * FROM pessoa WHERE id = :id_pessoa");
$select_pessoa_logada->execute(array(
    ":id_pessoa" => $id_pessoa
)); 

$select_pessoa_logada_informacacoes = $select_pessoa_logada->fetch(PDO::FETCH_ASSOC);

switch(true)
{

     case ( $fk_usuario != $id_pessoa):
        $_SESSION['mensagem'] = "<div class='alert alert-danger'>Você não é esse usuario. Logue com sua conta</div>";
        header("Location: /login");
     break;   

    case ($fk_usuario == ""):
        $_SESSION['mensagem'] = "<div class='alert alert-danger'>Por favor logue</div>";
        header("Location: /perfis?url=$url_pessoa");
       break;

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/APP/public/css/menu.css">
    <title></title>
</head>
<body>

<div class="wrapper">
 <?php include_once("APP/public/components_extras/sidebar.php");?>
    <div id="content">
        <?php include_once("APP/public/components_extras/navbar.php");?>
         <div class="main-content">
             <div class="row">
               <!--Render body-->
               <?php 
                
                $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                switch ($url){
                      case '/cadastro/criar-perfis':
                        include_once("APP/view/cadastro/criarperfil.php");
                      break;   
                }
               ?>
            </div>
        </div>
  </div>

</body>
</html>