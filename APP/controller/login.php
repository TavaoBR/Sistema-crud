<?php 

require_once ("APP/model/bd.php");

class Login extends Conexao
{

    static function login()
    {
        session_start();
        
        $conexao = new Conexao;
        $conexao->conectar();
        
        if(isset($_POST['Logar']))
        {

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            switch (true) {
                case ($email == "" && $senha == ""):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger'>Preencha os campos</div>";
                    header("Location: /login");
                break;
                
                case ($email == ""):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger'>Coloque o email </div>";
                    header("Location: /login");
                 break;   

                 case ($senha == ""):
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger'>Coloque a senha</div>";
                    header("Location: /login");
                 break;   

                default:
                
                $select = "SELECT * FROM pessoa WHERE email = :u AND senha = md5(:s) LIMIT 1";
                $query = $conexao->conectar()->prepare($select);
                $query->bindParam(':u', $email, PDO::PARAM_STR);
                $query->bindParam(':s', $senha, PDO::PARAM_STR);
                $query->execute();
                
                $assoc_user = $query->fetch(PDO::FETCH_ASSOC); 

                if(isset($assoc_user)){
                    $_SESSION['usuarioID'] = $assoc_user['id']; 
                    $_SESSION['usuarioIDUrl'] = $assoc_user['id_url'];
                    $_SESSION['usuarioEmail'] = $assoc_user['email'];
                    $_SESSION['usuarioSenha'] = $assoc_user['senha_usuario'];


                        $cocatenando_nome_email_id = md5($assoc_user['nome'].$assoc_user['email'].$assoc_user['id'].$assoc_user['id_url']);
                        $update = "UPDATE pessoa SET id_url = :id_url WHERE id = :id_pessoa";
                        $update_query = $conexao->conectar()->prepare($update);
                        $update_query->execute(array(
                            ":id_url" => $cocatenando_nome_email_id,
                            ":id_pessoa" => $assoc_user['id']
                        ));

                        if($update_query->rowCount())
                        {
                            header("Location: /perfis?url=$cocatenando_nome_email_id");
                        }else{
                            $_SESSION['mensagem'] = "<div class = 'alert alert-danger'>Erro. Tente novamente mais tarde</div>";
                            header("Location: /login");
                        }
                    

                }else{
                    $_SESSION['mensagem'] = "<div class = 'alert alert-danger'>Dados invalidos</div>";
                    header("Location: /login");
                }

                break;
            }

        }else{
            header("Location: /login");
        }

    }


    function verifica_usuario()
    {
        if(!$_SESSION['usuarioID'] AND !$_SESSION['usuarioEmail'] AND !$_SESSION['usuarioIDUrl'] AND !$_SESSION['usuarioSenha']){
            $_SESSION['mensagem'] = "<div class='alert alert-danger'> Acesso restrito</div>";
            header("Location: /login");
            exit();
       }
       
    }

}
?>