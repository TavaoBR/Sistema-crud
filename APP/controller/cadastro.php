<?php 

include_once("APP/model/bd.php");

class Cadastro extends Conexao
{

    

    public static function cadastroPessoaForm()
    {
        include_once("APP/view/cadastro/cadastrarpessoa.php");
    }

    public static function criarPerfis()
    {
        include_once("APP/view/cadastro/criarperfil.php");
    }


    static function cadastroPessoa()
    {
        session_start();

        

        $conexao = new Conexao;
        $conexao->conectar();

        



                /*$nome = $_POST['nome'];
                $email = $_POST['email'];

                $insert = "INSERT INTO pessoa(nome, email) VALUES (:nome_completo, :nome_usuario)";
                $insert_query =$conexao->conectar()->prepare($insert);
                $insert_query->bindParam(':nome_completo', $nome);
                $insert_query->bindParam(':nome_usuario', $email);
                $insert_query->execute();

                if($insert_query->rowCount()){
                    echo "Sucess";
                }else{
                    echo "Erro";
                }*/
          
        
    }

}