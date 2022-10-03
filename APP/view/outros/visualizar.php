<style>
    .inf-content{
    border:1px solid #DDDDDD;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
}			               
</style>
<div class="container bootstrap snippets bootdey">
    <h2 class="text-center">Visualização Perfil</h2>
 <br>
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:400px;" title="" class="img-circle img-thumbnail rounded-pill isTooltip" src="<?php echo "/APP/public/img/usuario/".$select_fk_usuario_pegar['fk_pessoa']."/".$select_fk_usuario_pegar['image']?>" data-original-title="Usuario"> 
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Identificacion                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $select_fk_usuario_pegar['id']?>   
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Name                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $select_fk_usuario_pegar['nome_perfil']?>     
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                PIN                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $select_fk_usuario_pegar['pin']?>  
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                  Alterar dados                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i></a>
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                Excluir Perfil                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>                                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>