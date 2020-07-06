<?php

require_once('dbconn.php');

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

$result = 0;

echo $id = intval($id);

if(intval($id)){
  $stmt = $dbconn->prepare('DELETE FROM '.$tabla.' WHERE id = :id');
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  if($stmt->execute()){
    $result = 1;
  }
}
 echo $result;
 $dbconn = null;