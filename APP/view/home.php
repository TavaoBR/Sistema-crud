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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css"> 
    <link rel="stylesheet" href="/APP/public/css/perfis.css">
    <title>Perfis</title>
</head>
<body>

<div class="container bootstrap snippets bootdey">
    <h4 class="h-title">
        New team members        
    </h4>
    <div class="row">
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
    
      <div class="col-md-4 col-sm-6">
        <div class="block">
            <div class="thumbnail">
            <a href="#g" class="thumb-zoom" title="Sophia R. McJamer">
                <img src="https://via.placeholder.com/300x300/B0C4DE/000000" alt="">
              </a>
              <div class="caption text-center">
                <h6>Sophia R. McJamer <small>Media designer</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div>
    
      <div class="col-md-4 col-sm-6">
        <div class="block">
            <div class="thumbnail">
            <a href="#" class="thumb-zoom" title="Noah Kennedy">
                <img src="https://via.placeholder.com/300x300/FF7F50/000000" alt="">
              </a>
              <div class="caption text-center">
                <h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div>
        
      <div class="col-md-4 col-sm-6">
        <div class="block">
            <div class="thumbnail">
            <a href="#" class="thumb-zoom" title="Noah Kennedy">
                <img src="https://via.placeholder.com/300x300/00BFFF/000000" alt="">
              </a>
              <div class="caption text-center">
                <h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div>
        
      <div class="col-md-4 col-sm-6">
        <div class="block">
            <div class="thumbnail">
            <a href="#" class="thumb-zoom" title="Noah Kennedy">
                <img src="https://via.placeholder.com/300x300/008B8B/000000" alt="">
              </a>
              <div class="caption text-center">
                <h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div> 
        
      <div class="col-md-4 col-sm-6">
        <div class="block">
            <div class="thumbnail">
            <a href="#" class="thumb-zoom" title="Noah Kennedy">
                <img src="https://via.placeholder.com/300x300/5F9EA0/000000" alt="">
              </a>
              <div class="caption text-center">
                <h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
                <div class="icons-group">
                          <a href="#"><i class="fa fa-google-plus"></i></a>
                          <a href="#" ><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-github"></i></a>
                      </div>
              </div>
            </div>
        </div>
      </div>
    </div>    
</div>

</body>
</html>