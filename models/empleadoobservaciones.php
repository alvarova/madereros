<?php
require_once('dbconn.php');
$idLoc ="";
$idRam = "";
@$id = addslashes(trim($_POST['idEmpl']));
$parse="";
$sql = "SELECT mo.id_motivo_observacion, mo.motivo_observacion, oe.detalle, oe.fecha_observacion 
        FROM observacion_empleado oe, motivo_observacion mo 
        WHERE oe.id_motivo_observacion = mo.id_motivo_observacion
        and oe.flg_baja = 0
        and oe.id_empleado = ";



if (is_numeric($id)){
  $sql = $sql.$id;
  $sth = $dbconn->prepare($sql);
  //var_dump($sql);
  $sth->execute();
  /* Fetch all of rows in the result set */
  $data = $sth->fetch(PDO::FETCH_ASSOC);

  if($sth->rowCount() < 1){
    echo 'Sin datos';
  }
  else{
    while($data) {
      $parse = $parse.'<tr>
                        <td>'.$data['fecha_observacion'].'</td>
                        <td>'.$data['motivo_observacion'].'</td>
                        <td>'.$data['detalle'].'</td>
                        <td><div class="td-actions"><a href="javascript:void(0);" onClick="verObservacion('.$row['id_empleado'].',\''.$row['apellido'].'\',\''.$row['nombre'].'\');" class="icon red" data-toggle="tooltip" data-placement="top" title="Ver Observaciones"><i class="icon-bell"></i></a><a href="./index.php?acc=empleados&ver='.$row['id_empleado'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Dar de Baja"><i class="icon-circle-with-minus"></i></a><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
    }
    echo $parse;
  }
}
?>
