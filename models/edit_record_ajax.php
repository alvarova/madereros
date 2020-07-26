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

if(isset($_POST['token'])) { 
  $tabla = obtenerTabla(strtoupper($_POST['token']));  
  unset($_POST['token']);
 }


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

if ($tabla!='empleado'){
 if(!isset($_POST['fecha_inicio_actividad_submit'])){
  $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad']);
 }else{
  $_POST['fecha_inicio_actividad'] = FechaNull($_POST['fecha_inicio_actividad_submit']); 
  unset($_POST['fecha_inicio_actividad_submit']);
 }
}else{
  if (isset($_POST['sueldo'])) {$_POST['sueldo']=str_replace( ',', '', $_POST['sueldo']);}
  if (isset($_POST['fecha_afiliacion']))  {$_POST['fecha_afiliacion']=FechaNull($_POST['fecha_afiliacion']);}
  //var_dump($_POST);
  if (!isset($_POST['es_afiliado'])) {$_POST['es_afiliado']='0';}
  if (isset($_POST['fecha_nacimiento_submit'])) { unset($_POST['fecha_nacimiento_submit']);}
  if (isset($_POST['fecha_ingreso_empresa_submit'])) { unset($_POST['fecha_ingreso_empresa_submit']);}

  if (!isset($_POST['cuil']) or ($_POST['cuil']=="")) { $_POST['cuil']="0";}
  if (!isset($_POST['documento']) or ($_POST['documento']=="")) { $_POST['documento']="0";} 
  if (!isset($_POST['id_categoria_empleado']) or ($_POST['id_categoria_empleado']=="")) { $_POST['id_categoria_empleado']="NULL";} 
  if (!isset($_POST['id_empresa']) or ($_POST['id_empresa']=="")) { $_POST['id_empresa']="NULL";} 
  if (!isset($_POST['sueldo']) or ($_POST['sueldo']=="")) { $_POST['sueldo']="0";} 
}

$idReg = sanitizeStore($_POST['id']);  //Traigo ID del empleado/empresa
unset($_POST['id']);


end($_POST);
$ultimo = key($_POST);

foreach($_POST as $campo => $variable) {
  $variable = sanitizeStore($variable); 
  $esCampofecha = substr_count($campo, 'fecha');
  if (substr_count($campo,'submit')<1){  
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

