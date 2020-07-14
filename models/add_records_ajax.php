<?php
session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario']))
{
  die('Imposible acceder - Usuario no identificado ');
}

 $tabla=""; 
 $varSql="";
 $intoSql="";

 end($_POST);
 $ultimo = key($_POST);

  foreach ($_POST as $campo => $variable) {
      $valido=false;
      $variable=sanitizeStore($variable); 
      $submited=substr_count($campo, 'submit');
      
      if ($campo=='token') {              //Si es token obtengo tabla
         $tabla = obtenerTabla($variable);
      }elseif ($submited<1) {                             //Sino encolo campos
        if ($campo=='cuit') {
           $variable=FixCuit($variable);
        }
       $intoSql=$intoSql." `".$campo."`";
       $varSql =$varSql." '".$variable."' ";
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
  $insertSql="INSERT INTO $tabla (".$intoSql." VALUES (".$varSql;
    
  $result=0;
  $stmt = $dbconn->prepare($insertSql);
  if($stmt->execute()){
      $result =1;
  }
  $dbconn = null;
