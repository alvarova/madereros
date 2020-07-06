<?php

  /*Definiciones de pseudo-tokens y conector a DB */

require_once('dbconn.php');

//Ver metodo de parseo GET/POST 
switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': 
  $id=isset($_GET['id']) ? trim($_GET['id']): '';
  $token=isset($_GET['token']) ? trim($_GET['token']): '';
  break;

case 'POST': 
  $id=isset($_POST['id']) ? trim($_POST['id']): '';
  $token=isset($_POST['token']) ? trim($_POST['token']): '';
  break;
default:
}


   switch ($token) {
     case autor:
          $tabla=' tblautor ';
          $idtabla = ' id_autor ';
       break;

     case editorial:
          $tabla=' tbleditorial ';
          $idtabla = ' id_editorial ';
       break;     

     case idioma:
          $tabla=' tblidioma ';
          $idtabla = ' id_idioma ';
       break;
     case lector:
          $tabla=' tbllector ';
          $idtabla = ' id_lector ';
       break;
     case libro:
          $tabla=' tbllibro ';
          $idtabla = ' id_libro ';
       break;
     case tema:
          $tabla=' tbltema ';
          $idtabla = ' id_tema ';
       break;


     default:
         die(json_encode(array('error' => 'Non response.')));      
       break;
   }
  // prepare sql and bind parameters
    $stmt = $dbconn->prepare('select * from '.$tabla.' where '.$idtabla.' = :id');
    //$stmt->execute("set names utf8");
    $stmt->bindParam(':id', $id);
    // insert a row
    //var_dump("select * from ".$tabla." where ".$idtabla." = ".$id);    
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($data);
    $sale=json_encode($data, JSON_UNESCAPED_UNICODE);

    echo $sale;
    $dbconn = null;
