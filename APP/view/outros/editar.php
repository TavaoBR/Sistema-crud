<title>Editar perfil</title>
<div class="container pt-3 mb-3">
        <h2 class="text-center">Editar</h2>
              
        <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
        <div class="row no-gutters">                
            <div class="col-lg-7=5 contact-form__wrapper p-5 order-lg-1">
                <div>
                    <?php 
                    if(isset($_SESSION['mensagem'])){
                         echo $_SESSION['mensagem'];
                         unset($_SESSION['mensagem']);
                    }

                    ?>
                </div>
                <form method="post" action="#" class="contact-form form-validate" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Nome  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="titulo_materia"  value="<?php echo $select_fk_usuario_pegar['nome_perfil']?>" name="nome" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Número do PIN <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="titulo_materia"  value="<?php echo $select_fk_usuario_pegar['pin']?>" name="pin" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Confirme E-mail <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="" name="confirme-email" placeholder="">
                            </div>
                        </div>
    
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Senha <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="titulo_materia"  value="" name="senha" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Alterar imagem<span class="text-danger">*</span></label>
                                <input type="file" id="input-exibe-file" class="form-control" accept="image/*" name="imagem">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                        <img src="" id="preview" class="avatar img-circle img-thumbnail rounded-pill" width="150px">
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