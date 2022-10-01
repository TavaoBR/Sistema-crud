
    <title>Perfis</title>
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
              Clique no icone para criar seu primeiro perfil&nbsp;&nbsp;&nbsp;<a href="/cadastro/criar-perfis?id=<?php echo $id_pessoa?>" class="btn btn-dark"> <i class="fa-solid fa-user-plus"></i></a>
           </h3>
      </div>
  
      <?php }?>
      </div> 
</div>
