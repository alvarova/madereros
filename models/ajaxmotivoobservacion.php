<?php

  /*Definiciones de pseudo-tokens y conector a DB */
  /* SOLO CONSULTA */

require_once('dbconn.php');
$idMotOb = -1;

$esDeEmpresa = sanitize($_POST['esDeEmpr']);

if(isset($_POST['id_motivo_ob'])){
	$idMotOb = sanitize($_POST['id_motivo_ob']);	
}


$consulta = "SELECT id_motivo_observacion, motivo_observacion
             FROM `motivo_observacion` 
             WHERE es_de_empresa = ".$esDeEmpresa." 
             ORDER BY motivo_observacion";

$query = $dbconn->prepare($consulta);
$query->execute();
$parse="";

while($data = $query->fetch(PDO::FETCH_ASSOC)){
	if ($data['id_motivo_observacion']<>$idMotOb){
		$sel="";
	}
	else{
		$sel="'selected='selected' style='font-weight: bold;'";
	}
	$listaMotivosObser = $listaMotivosObser."<option value='".$data['id_motivo_observacion']." ".$sel." '>".$data['motivo_observacion']."</option>";
}
echo $listaMotivosObser;
$dbconn = null;
