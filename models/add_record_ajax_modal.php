<?php
/*/******************************************************************/
// Desde el modal: Alta para observaciones (empleados - empresas)/
/********************************************************************/

session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario'])){
  die('Imposible acceder - Usuario no identificado ');
}

$tabla = ""; 
$varSql = "";
$intoSql = "";
unset($_POST['esDeEmpr']);
unset($_POST['id_motivo_ob']);
unset($_POST['id_obs']);
unset($_POST['bajaElim']);
//$noCamposTabla = array('esDeEmpr','id_motivo_ob','id_obs');

//reseteo los forms de fechas con id _submit a campos o el token para no procesarlos como form
if(isset($_POST['fecha_observacion_submit'])){
  $_POST['fecha_observacion'] = $_POST['fecha_observacion_submit'];
  unset($_POST['fecha_observacion_submit']);
}

if (isset($_POST['tablaModal'])){ 
  $tabla = obtenerTabla(strtoupper($_POST['tablaModal']));  
  unset($_POST['tablaModal']);
}

end($_POST);
$ultimo = key($_POST);

foreach ($_POST as $campo => $variable) {
  $valido = false;
  $variable = sanitizeStore($variable); 
  $submited = substr_count($campo, 'submit');
    
  if ($submited<1){ //Sino encolo campos

    if ($campo =='cuit') {
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
    $intoSql = $intoSql.",`id_usuario_sistema`)"; //substr($intoSql,0,-2).")"; 
    $varSql = $varSql.', "'.$_SESSION['id_usuario'].'")';
  }else{              //Si no es el ultimo agrego , con espacio
    if($valido){
      $intoSql = $intoSql.", "; 
      $varSql = $varSql.", "; 
      $valido = false;
    }
  }  //Si es ultimo cierro )
}

$insertSql = "INSERT INTO $tabla (".$intoSql." VALUES (".$varSql;

$result = 0;
$stmt = $dbconn->prepare($insertSql);
if($stmt->execute()){
  $result = $dbconn->lastInsertId();
}
$dbconn = null;
echo $result;
