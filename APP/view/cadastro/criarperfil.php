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