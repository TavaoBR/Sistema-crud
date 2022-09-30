<?php 

include_once("APP/model/bd.php");

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

            //Sessões
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            //FIM

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
                             
                             
                             case (isset($select_cadastro_assoc['email']) == $email):
                                $_SESSION['mensagem'] = "<div class = 'alert alert-danger' id='tempo'>E-mail sendo utilizado</div>";
                                $_SESSION['nome'] = $nome;
                                $_SESSION['senha'] = $senha;
                                header("Location: /cadastro");
                             break;   
                             
                    
                   default:
                        $insert = "INSERT INTO pessoa(nome, email, senha, status) VALUES (:nome, :email, :senha, :status)";
                        $insert_query = $conexao->conectar()->prepare($insert);
                        $insert_query->bindParam(':nome', $nome);
                        $insert_query->bindParam(':email', $email);
                        $insert_query->bindParam(':senha', $md5);
                        $insert_query->bindParam(':status', $status);
                        $insert_query->execute();

                            $id = $conexao->conectar()->lastInsertId();
                            $url_id = md5($id);

                            $update = "UPDATE pessoa SET id_url = :url_id ";
                            $update_query = $conexao->conectar()->prepare($update);
                            $update_query->bindParam(':url_id', $url_id);
                            $update_query->execute();

                        if($insert_query->rowCount())
                        {
                            $_SESSION['mensagem'] = "<div class = 'alert alert-success' id='tempo'>Cadastro realizado com sucesso. Logue e crie até 5 perfis</div>";
                            header("Location: /cadastro");

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
              
        if(isset($_POST['Cadastrar']))
        {
          
            
        }else{
            
        }
        
    }

}