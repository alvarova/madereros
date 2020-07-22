<?php
require_once('dbconn.php');
$idLoc = "";
$idRam = "";
@$id = addslashes(trim($_POST['id_empresa']));
$parse = "";
$sql = "SELECT oe.id_observacion_empresa, mo.id_motivo_observacion, mo.motivo_observacion, oe.detalle, oe.fecha_observacion 
        FROM observacion_empresa oe, motivo_observacion mo 
        WHERE oe.id_motivo_observacion = mo.id_motivo_observacion
        AND oe.flg_baja = 0
        AND oe.id_empresa = ";

if(is_numeric($id)){
  $sql = $sql.$id." ORDER BY oe.fecha_observacion DESC";
  $sth = $dbconn->prepare($sql);
  $sth->execute();
  /* Fetch all of rows in the result set */

  if($sth->rowCount()<1){
    echo 'Sin datos';
  }
  else{
    while($data = $sth->fetch(PDO::FETCH_ASSOC)){
      $parse = $parse.'<tr>
                        <td>'.date('d-m-Y', strtotime($data['fecha_observacion'])).'</td>
                        <td>'.$data['motivo_observacion'].'</td>
                        <td>'.$data['detalle'].'</td>
                        <td><div class="td-actions"><a href="javascript:void(0);" onClick="editarObservacion(\''.$data['id_observacion_empresa'].'\',\''.$data['fecha_observacion'].'\',\''.$data['id_motivo_observacion'].'\',\''.$data['detalle'].'\');" class="icon green" data-toggle="tooltip" data-placement="top" title="Modificar"><i class="icon-save"></i></a><a href="javascript:void(0);" onClick="bajaObservacion(\''.$data['id_observacion_empresa'].'\');" class="icon blue" data-toggle="tooltip" data-placement="top" title="Dar de Baja"><i class="icon-circle-with-minus"></i></a><a href="javascript:void(0);" onClick="eliminarObservacion(\''.$data['id_observacion_empresa'].'\');" class="icon red" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
    } 
    echo $parse;
  }
}
?>
