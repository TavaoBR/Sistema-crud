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

                if(isset($assoc_user))
                {

                }else{
                    
                }

                break;
            }

        }else{
            header("Location: /login");
        }

    }


    function verifica_usuario()
    {
        

    }

}
?>