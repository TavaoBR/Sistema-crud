<?php 

include_once("APP/model/bd.php");
include_once("APP/controller/login.php");

class Cadastro extends Conexao
{

    static function cadastroPessoa()
    {
        session_start();

        $conexao = new Conexao;
        $conexao->conectar();

        if(isset($_POST['Cadastrar'])){

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $confirma_email = $_POST['confirme-email'];
            $senha = $_POST['senha'];
            $md5 = md5($senha);
            $confirma_senha = $_POST['confirma-senha'];
            $status = 'Ativado';

            $select_cadastro = "SELECT * FROM pessoa";
            $select_cadastro_ = $conexao->conectar()->prepare($select_cadastro);

            $select_cadastro_->execute();

            $select_cadastro_assoc = $select_cadastro_->fetch(PDO::FETCH_ASSOC);

                switch (true) {
                    case ($nome == "" && $email == "" && $confirma_email == "" && $senha == "" && $confirma_senha == ""):
                        $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha todos os dados</div>";
                        header("Location: /cadastro");           
                    break;
                      
                    case ($nome == ""):
                        $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha o campo nome</div>";
                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location: /cadastro");
                    break;
                    

                    case ($email == ""):
                        $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha o campo e-mail</div>";
                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location: /cadastro");
                    break;

                    case ($confirma_email == ""):
                        $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Confirme e-mail</div>";
                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location: /cadastro");
                        break;

                        case ($email != $confirma_email):
                            $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>E-mails Não batem</div>";
                            $_SESSION['nome'] = $nome;
                            $_SESSION['email'] = $email;
                            $_SESSION['senha'] = $senha;
                            header("Location: /cadastro");
                          break;



                    case ($senha == ""):
                        $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha o campo senha</div>";
                        $_SESSION['nome'] = $nome;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location: /cadastro");
                    break;

                        case ($confirma_senha == ""):
                            $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Confirme a senha</div>";
                            $_SESSION['nome'] = $nome;
                            $_SESSION['email'] = $email;
                            $_SESSION['senha'] = $senha;
                            header("Location: /cadastro");
                        break;

                            case ($senha != $confirma_senha):
                                $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Senhas não batem</div>";
                                $_SESSION['nome'] = $nome;
                                $_SESSION['email'] = $email;
                                $_SESSION['senha'] = $senha;
                                header("Location: /cadastro");
                             break;
                             
                             
                             case ($select_cadastro_assoc['email'] == $email):
                                $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>E-mail sendo utilizado</div>";
                                $_SESSION['nome'] = $nome;
                                $_SESSION['senha'] = $senha;
                                header("Location: /cadastro");
                             break;   
                             
                    
                   default:
                        $insert = "INSERT INTO pessoa(nome, email, senha, status) VALUES (:nome, :email, :senha, :status)";
                        $insert_query = $conexao->conectar()->prepare($insert);
                        $insert_query->execute(array(
                            ":nome" => $nome,
                            ":email" => $email,
                            ":senha" => $md5,
                            ":status" => $status
                        ));        

                        if($insert_query->rowCount())
                        {
                            
                            $_SESSION['mensagem'] = "<div class = 'alert alert-success' id='tempo'>Cadastro realizado com sucesso. Logue e crie até 5 perfis</div>";
                            header("Location: /login");

                        }else{
                            $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Error. Entre em contato com o desenvolvedor jamesgustavo133@gmail.com</div>";
                            $_SESSION['nome'] = $nome;
                            $_SESSION['email'] = $email;
                            $_SESSION['senha'] = $senha;
                            header("Location: /cadastro");
                        }
                    break;
            }

        }else{
            $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha os dados e clique em enviar</div>";
            header("Location: /cadastro");
        }
          
        
    }


    static function criarPerfil()
    {
        session_start();
        $conexao = new Conexao;
        $conexao->conectar();
        $verifica = new login();
        $verifica->verifica_usuario();
              
        if(isset($_POST['Criar']))
        {
         
            $id_pessoa = $_POST['id_pessoa'];
            $escolha_ter_pin = $_POST['escolha_ter_pin'];
            $nome_perfil = $_POST['nome'];
            $pin = $_POST['PIN'];
            $imagem = $_FILES['imagem']['name'];

            $count_perfil = 1;
            $numeracao = $conexao->conectar()->prepare("SELECT * FROM pessoa WHERE id = :id_pessoa");
            $numeracao->execute(array(
                ":id_pessoa" => $id_pessoa
            ));
            
            $pegar_numero_perfis_criado = $numeracao->fetch(PDO::FETCH_ASSOC);

            $calculo = $pegar_numero_perfis_criado['perfis'] + $count_perfil;

            switch(true)
            {
                case ($nome_perfil == "" && $escolha_ter_pin == "" && (empty($imagem))):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha os dados e clique criar</div>";
                    header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                break;

                 case ($nome_perfil == ""):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Preencha o campo nomer</div>";
                    $_SESSION['nome_perfil'] = $nome_perfil;
                    $_SESSION['escolha_ter_pin'] = $escolha_ter_pin;
                    header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                 break;   

                 case ($escolha_ter_pin == ""):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Escolha uma opção </div>";
                    $_SESSION['nome_perfil'] = $nome_perfil;
                            $_SESSION['escolha_ter_pin'] = $escolha_ter_pin;
                    header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                 break;  
                 
                 case ((empty($imagem))):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Selecione uma imagem </div>";
                    $_SESSION['nome_perfil'] = $nome_perfil;
                            $_SESSION['escolha_ter_pin'] = $escolha_ter_pin;
                    header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                 break;   

                 case($escolha_ter_pin == "NAO"):

                    $insert_perfil = "INSERT INTO perfil(nome_perfil, image, fk_pessoa) VALUES (:nome_perfil, :image, :fk_pessoa)";
                    $stm =  $conexao->conectar()->prepare($insert_perfil);
                    $stm->execute(array(
                       ":nome_perfil" => $nome_perfil,
                       ":image" => $imagem,
                       "fk_pessoa" => $id_pessoa
                    ));

                    if($stm->rowCount())
                    {

                        $update_pessoa_perfis_ = "UPDATE pessoa SET perfis = :perfis WHERE id = :id_pessoa";
                        $stm = $conexao->conectar()->prepare($update_pessoa_perfis_);
                        $stm->execute(array(
                          ":perfis" => $calculo,
                          ":id_pessoa" => $id_pessoa
                        ));


                               $_UP['pasta'] = "APP/public/img/usuario/$id_pessoa/";
                                mkdir($_UP['pasta'], 0777);

                            move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$imagem);
                                $_SESSION['mensagem'] = "<div class='alert alert-success'>
                                 Perfil criado com sucesso
                                </div>";
                                header("Location: /cadastro/criar-perfis?id=$id_pessoa");

                    }else{
                        $_SESSION['mensagem'] = "<div class='alert alert-success'>
                        Erro, tente novamente mais tarde
                       </div>";
                       header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                    }

                 break;   

                    case($escolha_ter_pin == "SIM"):
                       switch(true)
                       {

                        case ($pin == ""):
                            $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>Digite o pin</div>";
                            $_SESSION['pin'] = "
                            <div class='form-group'>
                              <label class='col-lg-3 control-label'>PIN:</label>
                              <div class='col-lg-8'>
                                <input type='password' name='PIN' id='pPIN'>
                              </div>
                            </div>
                            <br>
                            ";
                            $_SESSION['nome_perfil'] = $nome_perfil;
                            $_SESSION['escolha_ter_pin'] = $escolha_ter_pin;
                            header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                        break;    
                        
                        default:
                        $insert_perfil = "INSERT INTO perfil(nome_perfil, image, pin, fk_pessoa) VALUES (:nome_perfil, :image, :pin, :fk_pessoa)";
                        $stm =  $conexao->conectar()->prepare($insert_perfil);
                        $stm->execute(array(
                           ":nome_perfil" => $nome_perfil,
                           ":image" => $imagem,
                           ":pin" => $pin,
                           "fk_pessoa" => $id_pessoa
                        ));

                        if($stm->rowCount())
                        {

                        $update_pessoa_perfis = "UPDATE pessoa SET perfis = :perfis WHERE id = :id_pessoa";
                        $stm = $conexao->conectar()->prepare($update_pessoa_perfis);
                        $stm->execute(array(
                          ":perfis" => $calculo,
                          ":id_pessoa" => $id_pessoa
                        ));

                            $_UP['pasta'] = "APP/public/img/usuario/$id_pessoa/";
                            mkdir($_UP['pasta'], 0777);

                            move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta'].$imagem);
                                $_SESSION['mensagem'] = "<div class='alert alert-success'>
                                 Perfil criado com sucesso
                                </div>";
                                header("Location: /cadastro/criar-perfis?id=$id_pessoa");
                                    
                        }else{

                            $_SESSION['mensagem'] = "<div class='alert alert-success'>
                            Erro, tente novamente mais tarde
                           </div>";
                           header("Location: /cadastro/criar-perfis?id=$id_pessoa");

                        }

                        break;
                       }
                    break;  
            }
            
            
            
        }else{
            header("Location: /login");
        }
        
    }

}