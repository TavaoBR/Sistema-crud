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
    <title>Crair Perfil</title>
</head>
<body>

<div class="wrapper">
 <?php include_once("APP/public/components_extras/sidebar.php");?>
    <div id="content">
        <?php include_once("APP/public/components_extras/navbar.php");?>
         <div class="main-content">
             <div class="row">
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Criar Perfil</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="" id="preview" class="avatar img-circle img-thumbnail rounded-pill">
          <h6>Escolha uma foto</h6>
          
          <input type="file" id="input-exibe-file" class="form-control" accept="image/*">
        </div>
      </div>

      <script>
        function readFileImg(){
            if(this.files && this.files[0]){
                var file = new FileReader();
                file.onload = function(e)
                {
                    document.getElementById("preview").src = e.target.result;
                };
                file.readAsDataURL(this.files[0]);
            }
        }

        document.getElementById("input-exibe-file").addEventListener("change", readFileImg, false);

      </script>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" action="#" method="POST">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nome de usuario:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="dey-dey">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Deseja colocar pin de segurança?</label>
            <div class="col-lg-8">
                <select name="" id="">
                         
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Nome de usuario:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="dey-dey">
              <input type="text" name="" id="">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
    </div>
      </div>
      </div>
      </div>
</body>
</html>