<?php
/*/*******************************/
// Alta para empresas - Empleados/
/*******************************/

session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario'])){
  die('Imposible acceder - Usuario no identificado ');
}

$tabla = ""; 
$varSql = "";
$intoSql = "";
 
//reseteo los forms de fechas con id _submit a campos o el token para no procesarlos como form

if(isset($_POST['fecha_alta_submit'])){
  $_POST['fecha_alta'] = $_POST['fecha_alta_submit'];
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

if(isset($_POST['token'])){ 
  $tabla = obtenerTabla(strtoupper($_POST['token']));  
  unset($_POST['token']);
}
// como viene del formulario compartido para modificar, quito el ID
if(isset($_POST['id'])){
  unset($_POST['fecha_alta_submit']);
} 
// var_dump('------------------------------------------------------------------------------------------------');
 //var_dump($_POST['fecha_baja']);
 //var_dump('========================================================');
 
end($_POST);
$ultimo = key($_POST);
 
foreach($_POST as $campo => $variable){
  $valido = false;
  $variable = sanitizeStore($variable); 
  $submited = substr_count($campo, 'submit');
    
  if($submited<1){ //Sino encolo campos

    if($campo =='cuit') {
      $variable = FixCuit($variable); //Quito espacios y acomodo guiones
    }

    $intoSql = $intoSql." `".$campo."`";
    if($variable === 'NULL'){
      $varSql = $varSql.' '.$variable;
    }else{
      $varSql = $varSql.' "'.$variable.'"';
    }
    $valido = true;
  }

  if($ultimo == $campo){  //Elimino ',' que sobra y cierro parentesis
    $intoSql = $intoSql.", `id_usuario_sistema`)"; //substr($intoSql,0,-2).")"; 
    $varSql = $varSql.', "'.$_SESSION['id_usuario'].'")';//substr($varSql,0,-2).")"; 
  }else{              //Si no es el ultimo agrego , con espacio
    if($valido){
      $intoSql = $intoSql.", "; 
      $varSql = $varSql.", "; 
      $valido = false;
    }
  }  //Si es ultimo cierro )
}

$insertSql = "INSERT INTO $tabla (".$intoSql." VALUES (".$varSql;
//var_dump("SQL:".$insertSql);
$result = 0;
$stmt = $dbconn->prepare($insertSql);
if($stmt->execute()){
  $result = $dbconn->lastInsertId();
  //var_dump('Insert as:'.$result);
}
$dbconn = null;
echo $result;
  