<?php

session_start();
include_once("APP/model/bd.php");
$conexao = new Conexao;
$conexao->conectar();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Cadastrar</title>
</head>
<body>
<div class="container pt-3 mb-3">
        <h2 class="">Cadastrar-se</h2>
              
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
                                
                                ?>" name="nome" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="<?php  
                                
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
                                
                                ?>" name="senha" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Confirme Senha <span class="text-danger">*</span></label>
                                <input type="password"  class="form-control" id="titulo_materia"  value="<?php  
                                
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
</body>
</html>