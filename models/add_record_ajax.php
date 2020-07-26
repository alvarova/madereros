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

if(isset($_POST['token'])){ 
  $tabla = obtenerTabla(strtoupper($_POST['token']));
  //var_dump($_POST['token']);  
  unset($_POST['token']);
}


//if (isset($_POST['empleados'])) { $empleadosABM=TRUE; unset($_POST['empleados']);  } else {$empleadosABM=FALSE;}

//reseteo los forms de fechas con id _submit a campos o el token para no procesarlos como form

if(isset($_POST['fecha_alta_submit'])){
  $_POST['fecha_alta'] = $_POST['fecha_alta_submit'];
  unset($_POST['fecha_alta_submit']);
}
if ($_POST['fecha_alta']=="") $_POST['fecha_alta']='0000-00-00'; 

if(!isset($_POST['fecha_baja_submit'])){
  $_POST['fecha_baja'] = FechaNull($_POST['fecha_baja']);
}else{
  $_POST['fecha_baja'] = FechaNull($_POST['fecha_baja_submit']); 
  unset($_POST['fecha_baja_submit']);
}

if ($tabla!='empleado'){
  if(!isset($_POST['fecha_inicio_actividad_submit'])){  
    $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad']);
  }else{
    $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad_submit']);
    unset($_POST['fecha_inicio_actividad_submit']);
  }
}else{
  if (isset($_POST['sueldo'])) {$_POST['sueldo']=str_replace( ',', '', $_POST['sueldo']);}
  if (!isset($_POST['cuil']) or ($_POST['cuil']=="")) { $_POST['cuil']="0";}
  if (!isset($_POST['documento']) or ($_POST['documento']=="")) { $_POST['documento']="0";} 
  //var_dump($_POST);
  if (!isset($_POST['es_afiliado'])) {$_POST['es_afiliado']='0';}
  if (!isset($_POST['id_categoria_empleado']) or ($_POST['id_categoria_empleado']=="")) { $_POST['id_categoria_empleado']="NULL";} 
  if (!isset($_POST['id_empresa']) or ($_POST['id_empresa']=="")) { $_POST['id_empresa']="NULL";} 
  if (!isset($_POST['sueldo']) or ($_POST['sueldo']=="")) { $_POST['sueldo']="0";} 
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
//var_dump($intoSql);
$insertSql = "INSERT INTO $tabla (".$intoSql." VALUES (".$varSql;
//var_dump("::::".$insertSql);
$result = 0;
$stmt = $dbconn->prepare($insertSql);
if($stmt->execute()){
  $result = $dbconn->lastInsertId();
  //var_dump('Insert as:'.$result);
}
$dbconn = null;
echo $result;