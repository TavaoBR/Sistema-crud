<?php
session_start();
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
    <title>Cadastrar</title>
</head>
<body>



<div class="wrapper">
 <?php include_once("APP/public/components/sidebar.php");?>
    <div id="content">
        <?php include_once("APP/public/components/navbar.php");?>
         <div class="main-content">
             <div class="row">
             <div class="container pt-3 mb-3">
        <h2 class="text-center">Cadastrar-se</h2>
              
        <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
        <div class="row no-gutters">                
            <div class="col-lg-7=5 contact-form__wrapper p-5 order-lg-1">
                <p>Atenção os campos que estiverem com (*) são obrigatórios</p>
                <div>
                    <?php 
                    if(isset($_SESSION['mensagem'])){
                         echo $_SESSION['mensagem'];
                         unset($_SESSION['mensagem']);
                    }

                    ?>
                </div>
                <form method="post" action="/cadastro-valida" class="contact-form form-validate" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Nome completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="titulo_materia"  value="<?php  
                                if(isset($_SESSION['nome']))
                                {
                                echo $_SESSION['nome'];

                                unset($_SESSION['nome']);
                                }
                                ?>" name="nome" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="<?php  
                                if(isset($_SESSION['email']))
                                {
                                echo $_SESSION['email'];

                                unset($_SESSION['email']);
                                }
                                ?>" name="email" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Confirme E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="<?php  
                                
                                ?>" name="confirme-email" placeholder="">
                            </div>
                        </div>
    
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Senha <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="titulo_materia"  value="<?php  

                                    if(isset($_SESSION['senha']))
                                    {
                                    echo $_SESSION['senha'];

                                    unset($_SESSION['senha']);
                                    }

                                ?>" name="senha" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Confirme Senha <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="titulo_materia"  value="<?php  

                                ?>" name="confirma-senha" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <button type="submit" name="Cadastrar" class="btn btn-primary">Enviar</button>
                        </div>

                        </form>
                    </div>

                </form>
            </div>
            <!-- End Contact Form Wrapper -->
    
        </div>
    </div>
</div>
             </div>
         </div>
    </div>
</div>
    </div>
</body>
</html>