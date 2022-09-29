<?php 

include_once("APP/model/bd.php");

class Cadastro extends Conexao
{



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