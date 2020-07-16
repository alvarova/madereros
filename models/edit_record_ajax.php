<?php
session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if((!isset($_SESSION['id_usuario'])) and (!isset($_POST['id'])) )
{
  die('Imposible acceder - Usuario o Registro no identificado ');
}

 $tabla=""; 
 $varSql="";
 $intoSql="";
 $idtabla="";
 $idItem=sanitizeStore($_POST['id']);  //Registro
 end($_POST);
 $ultimo = key($_POST);

 
 foreach ($_POST as $campo => $variable) {
  $valido=false;
  $variable=sanitizeStore($variable); 
  $submited=substr_count($campo, 'submit');
  
  if ($campo=='token') {              //Si es token obtengo tabla
     $tabla = obtenerTabla($variable);
     $idtabla = "id_".$tabla;
  }elseif ($submited<1) {                             //Sino encolo campos
    if ($campo=='cuit') {
       $variable=FixCuit($variable);
    }
   $intoSql=$intoSql." `".$campo."` = "." '".$variable."' ";
   $valido=true;
  }

  if ($ultimo==$campo) {  //Elimino ',' que sobra y cierro parentesis
        $intoSql=$intoSql."`id_usuario_sistema`)"; //substr($intoSql,0,-2).")"; 
        $varSql=$varSql."'".$_SESSION['id_usuario']."')";//substr($varSql,0,-2).")"; 
      }else{              //Si no es el ultimo agrego , con espacio
        if ($valido) {
          $intoSql=$intoSql.", "; 
          $varSql=$varSql.", "; 
          $valido=false;
        }
      }  //Si es ultimo cierro )

}


$UpdateSql="UPDATE $tabla set ".$intoSql." WHERE $idtabla =".$varSql;
// prepare sql and bind parameters
    $stmt = $dbconn->prepare($UpdateSql);
    
    // insert a row
    if($stmt->execute()){
      $result =1;
    }
    echo $result;
    $dbconn = null;