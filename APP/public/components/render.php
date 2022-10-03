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


$fk_pessoa = filter_input(INPUT_GET, 'fk_pessoa', FILTER_SANITIZE_NUMBER_INT);

                      $select_fk_usuario = $conexao->conectar()->prepare("SELECT * FROM perfil WHERE id = :fk_pessoa");
                      $select_fk_usuario->execute(array(
                          ":fk_pessoa" => $fk_pessoa
                      ));

                      $select_fk_usuario_pegar = $select_fk_usuario->fetch(PDO::FETCH_ASSOC);


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
                  <a href="#"><img src="<?php echo "/APP/public/img/usuario/".$select_fk_usuario_pegar['fk_pessoa']."/".$select_fk_usuario_pegar['image']?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill">&nbsp;&nbsp;&nbsp;<span><?php echo $select_fk_usuario_pegar['nome_perfil']?></span></a>
                  </li>

                      <li class="">
                          <a href="/perfis?url=<?php echo $url_pessoa?>"><i class="material-icons">send</i><span>Perfis</span></a>
                       </li>
                  
                       <li  class="">
                          <a href="#"><i class="material-icons">send</i><span>Algo legal</span></a>
                       </li>

                        <li  class="">
                          <a href="#"><i class="material-icons">forward_to_inbox</i><span>Algo legal</span></a>
                        </li>

                        <li  class="">
                          <a href="#"><i class="material-icons">mark_email_unread</i><span>Algo legal</span></a>
                        </li>

                        
                        <li  class="">
                          <a href="#"><i class="material-icons">mark_unread_chat_alt</i><span>Algo legal</span></a>
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
                   


                    case '/perfil/editar-perfil':

                      


                      include_once("APP/view/outros/editar.php");

                    break; 
                    
                    
                    case '/perfil/visualizar':

                      include_once("APP/view/outros/visualizar.php");
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