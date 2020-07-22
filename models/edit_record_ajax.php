<?php
/*/*********************************/
// Update para empresas - Empleados/
/*********************************/

session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario']) and (!isset($_SESSION['id']))){
  die('Imposible acceder - Usuario/Elemento no identificado ');
}

$tabla = ""; 
$intoSql = "";

//reseteo los forms de fechas con id _submit a campos o el token para no procesarlos como form
if(!isset($_POST['fecha_alta_submit'])){
  $_POST['fecha_alta'] = FechaNull($_POST['fecha_alta']);
}else{
  $_POST['fecha_alta'] = FechaNull($_POST['fecha_alta_submit']); 
  unset($_POST['fecha_alta_submit']);
}

if(!isset($_POST['fecha_baja_submit'])){
  $_POST['fecha_baja'] = FechaNull($_POST['fecha_baja']);
}else{
  $_POST['fecha_baja'] = FechaNull($_POST['fecha_baja_submit']); 
  unset($_POST['fecha_baja_submit']);
}

if(!isset($_POST['fecha_inicio_actividad_submit'])){
  $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad']);
}else{
  $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad_submit']); 
  unset($_POST['fecha_inicio_actividad_submit']);
}

if(isset($_POST['token'])) { 
 $tabla = obtenerTabla(strtoupper($_POST['token']));  
 unset($_POST['token']);
}


$idReg = sanitizeStore($_POST['id']);  //Traigo ID del empleado/empresa
unset($_POST['id']);


end($_POST);
$ultimo = key($_POST);

foreach($_POST as $campo => $variable) {
  $variable = sanitizeStore($variable); 
  $esCampofecha = substr_count($campo, 'fecha');
    
  if($esCampofecha>0){                        // Es campo fecha, permito nulos evaluo si es 1899 o 0000-00-00
    if(($variable == '0000-00-00') or ($variable == '1899-11-30')){
      $variable = "";
    }
  }

  if($campo == 'cuit'){
    $variable = FixCuit($variable);
  }
    
  if($ultimo == $campo){  //Elimino ',' que sobra y cierro parentesis
    $intoSql = $intoSql."`id_usuario_sistema` = '".$_SESSION['id_usuario']."'"; //substr($intoSql,0,-2).")";    
  }else{              //Si no es el ultimo agrego , con espacio
    if($variable === 'NULL'){
      $intoSql = $intoSql." `".$campo."` = ".$variable.", "; 
    }else{
      $intoSql = $intoSql." `".$campo.'` = "'.$variable.'", ';
    }
  }   //Si es ultimo cierro )    
}

$sql = "UPDATE $tabla SET ".$intoSql." WHERE id_".$tabla." = ".$idReg;
  
$result = 0;
$stmt = $dbconn->prepare($sql);
//var_dump($sql);
if($stmt->execute()){
    $result = $idReg;
}
$dbconn = null;
echo $result;

