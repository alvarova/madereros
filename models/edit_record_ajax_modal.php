<?php
/*/*******************************************************************/
// Desde el modal: Update para observaciones (empleados - empresas)/
/********************************************************************/

session_start();
require_once('dbconn.php');

if(!isset($_SESSION['id_usuario']) and (!isset($_SESSION['id']))){
  die('Imposible acceder - Usuario/Elemento no identificado ');
}


$tabla = ""; 
$upSql = "";
$fecha_baja = "";
$flg_baja = "";
unset($_POST['esDeEmpr']);
unset($_POST['id_motivo_ob']);
unset($_POST['id_empleado']);


//reseteo los forms de fechas con id _submit a campos o el token para no procesarlos como form
if(!isset($_POST['fecha_observacion_submit'])){
  $_POST['fecha_observacion'] = FechaNull($_POST['fecha_observacion']);
}
else{
  $_POST['fecha_observacion'] = FechaNull($_POST['fecha_observacion_submit']); 
  unset($_POST['fecha_observacion_submit']);
}

if(isset($_POST['tablaModal'])){ 
  $tabla = obtenerTabla(strtoupper($_POST['tablaModal']));  
  unset($_POST['tablaModal']);
}

$idReg = sanitizeStore($_POST['id_obs']);  //Traigo ID de la observacion
unset($_POST['id_obs']);

end($_POST);
$ultimo = key($_POST);


//si viene seteado en 1, doy de baja, si es 2 elimino logicamente
if(isset($_POST['bajaElim']) and $_POST['bajaElim'] != 'yes'){

  if($_POST['bajaElim'] == 1)
    $upSql = " `fecha_baja` = CURRENT_TIMESTAMP";
  elseif($_POST['bajaElim'] == 2)
    $upSql = " `flg_baja` = 1";
}
else{
  //sino edito la observacion
  unset($_POST['bajaElim']);

  foreach ($_POST as $campo => $variable){
    $variable = sanitizeStore($variable);
    
    if($campo == 'cuit'){
      $variable = FixCuit($variable);
    }

    if ($ultimo == $campo){  //agrego el where con la condicion
      $upSql = $upSql." `".$campo.'` = "'.$variable.'", `id_usuario_sistema` = '.$_SESSION['id_usuario'];
    }
    else{              //Si no es el ultimo agrego , con espacio
      if($variable === 'NULL'){
        $upSql = $upSql." `".$campo."` = ".$variable.", "; 
      }
      else{
        $upSql = $upSql." `".$campo.'` = "'.$variable.'", ';
      }
    }
  }
}

$updateSql = "UPDATE $tabla SET ".$upSql." WHERE `id_".$tabla."` = ".$idReg;

$result = 0;
$stmt = $dbconn->prepare($updateSql);
if($stmt->execute()){
  $result = $idReg;
}
$dbconn = null;
echo $result;