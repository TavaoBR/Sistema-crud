<title>Perfis</title>
<style>
  @media (min-width: 0) {
    .g-mb-30 {
        margin-bottom: 2.14286rem !important;
    }
}

@media (min-width: 0) {
    .g-py-40 {
        padding-top: 2.85714rem !important;
        padding-bottom: 2.85714rem !important;
    }
}

@media (min-width: 0) {
    .g-px-20 {
        padding-left: 1.42857rem !important;
        padding-right: 1.42857rem !important;
    }
}
@media (min-width: 0){
    .g-mb-5 {
        margin-bottom: 0.35714rem !important;
    }
}

.g-bg-white {
    background-color: #fff !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-primary {
    color: #72c02c !important;
}

.g-font-size-16 {
    font-size: 1.14286rem !important;
}

.g-mb-10 {
    margin-bottom: 0.71429rem !important;
}

.g-mb-10 {
    margin-bottom: 0.71429rem !important;
}

.g-color-black {
    color: #000 !important;
}

.g-font-weight-600 {
    font-weight: 600 !important;
}
</style>

<?php 
      
      if($select_pessoa_logada_informacacoes['perfis'] <= 5 ){

   ?>
      
<div class="container">
  <h2 class="text-center">Perfis</h2>
    <div class="row">

    <?php 
      foreach($select_fk_usuario_pegar as $puxar){
     ?> 
        <div class="col-md-6 col-lg-4 g-mb-30">
          <article class="u-shadow-v18 g-bg-white text-center rounded g-px-20 g-py-40 g-mb-5">
            <img class="d-inline-block img-fluid mb-4" src="<?php echo "APP/public/img/usuario/".$puxar['fk_pessoa']."/".$puxar['image']?>" style="width:50%;" title="" class="img-circle img-thumbnail rounded-pill" alt="Image Description">
            <h4 class="h5 g-color-black g-font-weight-600 g-mb-10"><?php echo $puxar['nome_perfil']?></h4>
            <p>
            <a href="#" class="btn btn-info" title="Visualizar Profile"><i class="fa-solid fa-eye"></i></a> 
            <a href="#" class="btn btn-primary" title="Editar Perfil"><i class="fa-solid fa-user-pen"></i></a>   
            <a href="#" class="btn btn-danger" title="Excluir Perfil"><i class="fa-solid fa-trash-can"></i></a>
          </p>
          </article>
        </div>

        <?php }
        ?>
        

    </div>
</div>

<?php 
}
?>
