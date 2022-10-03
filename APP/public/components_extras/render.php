<?php 
session_start();
require_once("APP/model/bd.php");
require_once("APP/controller/login.php");
$conexao = new Conexao;
$conexao->conectar();
$verifica = new Login();
$verifica->verifica_usuario();

error_reporting(0);
$id_pessoa = $_SESSION['usuarioID'];
$url_pessoa = $_SESSION['usuarioIDUrl'];


$select_pessoa_logada = $conexao->conectar()->prepare("SELECT * FROM pessoa WHERE id = :id_pessoa");
$select_pessoa_logada->execute(array(
":id_pessoa" => $id_pessoa
)); 

$select_pessoa_logada_informacacoes = $select_pessoa_logada->fetch(PDO::FETCH_ASSOC);

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="/APP/public/css/menu.css">
</head>
<body>

<div class="wrapper">
<div class="body-overlay"></div>
         <nav id="sidebar">
              <div class="sidebar-header">
                <h3><img src="https://www.luiztools.com.br/wp-content/uploads/2017/07/CRUD.png" class="img-fluid"><span>Sistema-CRUD</span></h3>
               </div>
               <ul class="list-unstyled components">
               <li class="active">
                  <a href="#"><img src="https://previews.123rf.com/images/triken/triken1608/triken160800029/61320775-male-avatar-profile-picture-default-user-avatar-guest-avatar-simply-human-head-vector-illustration-i.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill">&nbsp;&nbsp;&nbsp;<span>Perfil</span></a>
                  </li>
                       <li class="">
                          <a href="/perfis?url=<?php echo $url_pessoa?>"><i class="material-icons">send</i><span>Perfis</span></a>
                       </li>

                <li class="">
                    <a href="#"><i class="material-icons">logout</i><span>Sair</span></a>
                </li>
              </ul> 
        </nav>
    <div id="content">
    <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand"> Sistema-CRUD </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">   

                            <li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">apps</span>
								</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">person</span>
								</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">settings</span>
								</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
	    </div>
         <div class="main-content">
             <div class="row">
               <!--Render body-->
               <?php 
                
                $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                switch ($url){
                      case '/cadastro/criar-perfis':

                          
                        
                          include_once("APP/view/cadastro/criarperfil.php");
                      break;   


                      case '/perfis':

                                    $id_url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);                            

                                    $select_fk_usuario = $conexao->conectar()->prepare("SELECT * FROM perfil WHERE fk_pessoa = :fk_pessoa");
                                    $select_fk_usuario->execute(array(
                                        ":fk_pessoa" => $id_pessoa
                                    ));

                                    $select_fk_usuario_pegar = $select_fk_usuario->fetchAll();

                                    switch(true)
                                    {

                                        case ($id_url != $select_pessoa_logada_informacacoes['id_url']):
                                            header("Location: /login");
                                        break;   

                                        case (empty($id_url)):
                                            $_SESSION['mensagem'] = "<div class='alert alert-danger'>Por favor logue</div>";
                                            header("Location: /login");
                                          break;

                                    }
                        include_once("APP/view/home.php");
                      break; 
                      
                }
               ?>
            </div>
        </div>
  </div>



  <script src="/APP/public/scripts/jquery-3.3.1.slim.min.js"></script>
<script src="/APP/public/scripts/popper.min.js"></script>
<script src="/APP/public/scripts/bootstrap.min.js"></script>
<script src="/APP/public/scripts/jquery-3.3.1.min.js"></script>
<script src="/APP/public/scripts/jquery.mask.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });
</script>
</body>
</html>