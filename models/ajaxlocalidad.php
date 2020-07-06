<?php

  /*Definiciones de pseudo-tokens y conector a DB */
  /* SOLO CONSULTA */

require_once('dbconn.php');
         //var_dump($_POST);
$id=sanitize($_POST['id']);


$consulta =  "SELECT codigo_postal FROM `localidad`  where id_localidad = ".$id." limit 1";
$query = $dbconn->prepare($consulta);
$query->execute();
$parse="";
$data = $query->fetch(PDO::FETCH_ASSOC);
if ($data=='') { echo "Localidad no definida"; }  else { echo $data['codigo_postal'];}
$dbconn = null;
