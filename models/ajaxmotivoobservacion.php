<?php

  /*Definiciones de pseudo-tokens y conector a DB */
  /* SOLO CONSULTA */

require_once('dbconn.php');
$esDeEmpresa = sanitize($_POST['esDeEmpr']);

$consulta = "SELECT id_motivo_observacion, motivo_observacion
             FROM `motivo_observacion` 
             WHERE es_de_empresa = ".$esDeEmpresa." 
             ORDER BY motivo_observacion";

$query = $dbconn->prepare($consulta);
$query->execute();
$parse="";

while($data = $query->fetch(PDO::FETCH_ASSOC)) {
	$listaMotivosObser=$listaMotivosObser."<option value='".$data['id_motivo_observacion']." '>".$data['motivo_observacion']."</option>";
}
echo $listaMotivosObser;
$dbconn = null;
