<?php 
session_start();
require_once("APP/model/bd.php");
require_once("APP/controller/login.php");
$conexao = new Conexao;
$conexao->conectar();
$verifica = new Login();
$verifica->verifica_usuario();

$id_pessoa = $_SESSION['usuarioID'];
$id_url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

$select_pessoa_logada = $conexao->conectar()->prepare("SELECT * FROM pessoa WHERE id = :id_pessoa");
$select_pessoa_logada->execute(array(
    ":id_pessoa" => $id_pessoa
)); 

$select_pessoa_logada_informacacoes = $select_pessoa_logada->fetch(PDO::FETCH_ASSOC);

$select_fk_usuario = $conexao->conectar()->prepare("SELECT * FROM perfil WHERE fk_pessoa = :fk_pessoa");
$select_fk_usuario->execute(array(
    ":fk_pessoa" => $id_pessoa
));

$select_fk_usuario_pegar = $select_fk_usuario->fetch(PDO::FETCH_ASSOC);

switch(true)
{

     case ($id_url != $select_pessoa_logada_informacacoes['id_url']):
        $_SESSION['mensagem'] = "<div class='alert alert-danger'>Você não é esse usuario. Logue com sua conta</div>";
        header("Location: /login");
     break;   

    case (empty($id_url)):
        $_SESSION['mensagem'] = "<div class='alert alert-danger'>Por favor logue</div>";
        header("Location: /login");
       break;

}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
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
    <title>Perfis</title>
</head>
<body>

<div class="wrapper">
 <?php include_once("APP/public/components_extras/sidebar.php");?>
    <div id="content">
        <?php include_once("APP/public/components_extras/navbar.php");?>
         <div class="main-content">
             <div class="row">
<div class="container bootstrap snippets bootdey">
    <h4 class="h-title text-center">
          Perfis
    </h4>

   
    <div class="row">

    <?php if(isset($select_fk_usuario_pegar['fk_usuario'])){
      
       if($select_pessoa_logada_informacacoes['perfis'] <= 5 OR (empty($select_pessoa_logada_informacacoes['perfis']))){
    ?>
        
      <div class="col-md-4 col-sm-6">
        <div class="block">
          <div class="thumbnail">
            <a href="#" class="thumb-zoom" title="Eugene A. Kopyov">
              <img src="https://via.placeholder.com/300x300/48D1CC/000000" alt="">
            </a>
              <div class="caption text-center">
                <h6>Eugene A. Kopyov <small>UX designer</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div>
      
      <div class="alert alert-info">
      <a href="#" class="btn btn-dark" title = "Adicionar mais um perfil"><i class="fa-solid fa-user-plus" style="font-size: 25px;"></i></a>
      </div>
      <?php }?>                   
    </div>    

   <div class="row"> 
    <?php }else{?>   
      
      <div class="alert alert-info">
           <h3 class="text-center">
            Clique no icone para criar seu primeiro perfil <a href="/cadastro/criar-perfis?id=<?php echo $id_pessoa?>"> <i class="fa-solid fa-user-plus"></i></a>
           </h3>
      </div>
  
      <?php }?>
      </div> 
</div>
</div>
</div>
</body>
</html>