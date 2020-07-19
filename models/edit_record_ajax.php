<?php
/*/*********************************/
// Update para empresas - Empleados/
/*********************************/

session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario']) and (!isset($_SESSION['id'])))
{
  die('Imposible acceder - Usuario/Elemento no identificado ');
}

 $tabla=""; 
 $intoSql="";
 $idReg = sanitizeStore($_POST['id']);  //Traigo ID del empleado/empresa
unset($_POST['id']);

//reseteo los forms de fechas con id _submit a campos
if (isset($_POST['fecha_baja_submit'])) { $_POST['fecha_baja']=$_POST['fecha_baja_submit']; unset($_POST['fecha_baja_submit']);}
if (isset($_POST['fecha_inicio_actividad_submit'])) { $_POST['fecha_inicio_actividad']=$_POST['fecha_inicio_actividad_submit']; unset($_POST['fecha_inicio_actividad_submit']);}
if (isset($_POST['fecha_alta_submit'])) { $_POST['fecha_alta']=$_POST['fecha_alta_submit']; unset($_POST['fecha_alta_submit']);}

end($_POST);
$ultimo = key($_POST);

  foreach ($_POST as $campo => $variable) {

      $variable=sanitizeStore($variable); 
      $esCampofecha=substr_count($campo, 'fecha');
      
      if ($esCampofecha>0) {                        // Es campo fecha, permito nulos evaluo si es 1899 o 0000-00-00
          if (($variable=='0000-00-00') or ($variable=='1899-11-30')) {
            $variable="";
          }
      }
      if ($campo=='cuit') {
           $variable=FixCuit($variable);
      }
      
      if ($ultimo==$campo) {  //Elimino ',' que sobra y cierro parentesis
        $intoSql=$intoSql."`id_usuario_sistema` = '".$_SESSION['id_usuario']."'"; //substr($intoSql,0,-2).")";    
      }else{              //Si no es el ultimo agrego , con espacio
         if ($campo=='token') {                              //Si es token obtengo tabla
          $tabla = obtenerTabla($variable); 
         }else {
          //$intoSql=$intoSql.", "; 
          $intoSql=$intoSql." `".$campo."` = '".$variable."' ";
        }
      }   //Si es ultimo cierro )
       
  }
  $sql="UPDATE $tabla SET ".$intoSql." WHERE id_".$tabla." = ".$idReg;
    
  $result=0;
  $stmt = $dbconn->prepare($sql);
  var_dump($sql);
  /*if($stmt->execute()){
      $result =1;
  }*/
  $dbconn = null;


