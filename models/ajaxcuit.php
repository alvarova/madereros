<?php
// Definiciones de pseudo-tokens y conector a DB 
// SOLO CONSULTA EXISTENCIA CUIT SALE 1 o 0 
// Parametros:  id y token  

session_start();
require_once('dbconn.php');  // <- ademas funciones Sanitize / Obtenertabla

if(!isset($_SESSION['id_usuario']))
{
  die('Imposible acceder - Usuario no identificado ');
}


$id=FixCuit(sanitizeStore($_POST['id']));
$tabla=obtenerTabla(sanitizeStore($_POST['token']));
//var_dump($id."-".$tabla);

if ($tabla=='empresa') {
   $tipo='cuit, razon_social';
   $where='cuit';
  }else{
    $tipo='cuil, nombre, apellido';
    $where='cuil';
  }
$idx=explode('-', $id);
$consulta =  "SELECT $tipo  FROM `$tabla`  where $where like '%".$idx['1']."%' limit 1";
//var_dump($consulta);
$query = $dbconn->prepare($consulta);
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);
//var_dump($data);
if ($data=='') { echo "0"; }  else { 
  if ($tabla!='empresa') { 
    echo "Cuil ya existe:".$data["cuil"].' con Nombre y Apellido: '. $data["nombre"].', '. $data["apellido"]; 
  } else echo "Cuit ya existe:".$data['cuit'].' como empresa '.$data["razon_social"];
}
$dbconn = null;
