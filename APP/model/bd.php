<?php

class Conexao
{

   function conectar(){
    $db = "mysql";
    $host = "127.0.0.1";
    $user = "James";
    $password = "Guga1234%!";
    $dbname = "bataman";
    $port = 3306;

       try{
         $conectar =  new PDO($db.':host=' .$host . ';port=' .$port. ';dbname=' .$dbname, $user, $password);
         return $conectar;

       }catch (Exception $ex){
         echo $ex;
  }
   }  
    
}