<title>Criar Perfil</title>

<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Criar Perfil</h1>
      <hr>
	<div class="row">
      <!-- left column -->
    <?php 

      

      if(isset($_SESSION['mensagem']))
      {
          echo  $_SESSION['mensagem'];

          unset( $_SESSION['mensagem']);
      }
    ?>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">    
        <form class="form-horizontal" role="form" action="/cadastro/criar-perfis-valida" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_pessoa" value="<?php echo $id_pessoa?>">

        <div class="col-md-3">
        <div class="text-center">
          <img src="" id="preview" class="avatar img-circle img-thumbnail rounded-pill">
          <h6>Escolha uma foto</h6>
          <input type="file" id="input-exibe-file" class="form-control" accept="image/*" name="imagem">
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
<br>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nome de usuario:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php if(isset($_SESSION['nome_perfil'])){ echo $_SESSION['nome_perfil']; unset($_SESSION['nome_perfil']);}?>" name="nome">
            </div>
          </div>
<br>          
          <div class="form-group">
            <label class="col-lg-3 control-label">Deseja ter PIN?</label>
            <div class="col-lg-8">
                <select name="escolha_ter_pin" id="escolha">
                    <option value="">Selecione uma opção</option>
                    <option value="SIM">Sim</option>
                    <option value="NAO">Não</option>
                    <?php 
                     if(isset($_SESSION['escolha_ter_pin'])){
                    ?>
                    <option value="<?php echo $_SESSION['escolha_ter_pin']?>" selected><?php echo $_SESSION['escolha_ter_pin']?></option>
                    <?php
                    unset($_SESSION['escolha_ter_pin']);
                  }
                  ?>
                </select>
            </div>
          </div>

          <div class="form-group" id="MostrarPIN">
          <br>
            <label class="col-lg-3 control-label">PIN:</label>
            <div class="col-lg-8">
              <input type="password" name="PIN" id="pPIN">
            </div>
          </div>
          <br>

          <?php 
           if(isset($_SESSION['pin'])){
            echo $_SESSION['pin'];
            unset($_SESSION['pin']);
           }
          ?>

          <div class="form-group">
             <button type="submit" name="Criar" class="btn btn-primary">Criar</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

<script>

$(document).ready(function(){
$('#MostrarPIN').hide();
$('#escolha').change(function(){
if($('#escolha').val() == 'SIM'){
  $('#MostrarPIN').show();
}else{
  $('#MostrarPIN').hide();
}
});
});

  $('#pPIN').mask("9999");

</script>