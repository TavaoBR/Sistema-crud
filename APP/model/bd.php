<?php

class Conexao
{

    function conectar(){
    $db = "mysql";
    $host = "localhost";
    $user = "James";
    $password = "Guga1234%!";
    $dbname = "sistemacrud";
    $port = 3306;

       try{
         $conectar =  new PDO($db.':host=' .$host . ';port=' .$port. ';dbname=' .$dbname, $user, $password);
         return $conectar;

       }catch (Exception $ex){
         echo $ex;
  }
}  
    
}