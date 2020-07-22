<?php
require_once('dbconn.php');
$idLoc ="";
$idRam = "";
@$id = addslashes(trim($_GET['id']));
$parse="";
$sql = "SELECT empresa.razon_social, empresa.cuit, empresa.domicilio, empresa.correo_electronico, empresa.telefono, empresa.fecha_inicio_actividad, localidad.localidad, localidad.codigo_postal, rama_empresa.rama_empresa, COUNT(empleado.id_empresa), empresa.fecha_alta, empresa.fecha_baja, empresa.flg_baja, empresa.id_localidad, empresa.id_rama_empresa 
                FROM `empresa` 
                LEFT JOIN localidad
                ON empresa.id_localidad = localidad.id_localidad 
                LEFT JOIN rama_empresa
                ON empresa.id_rama_empresa = rama_empresa.id_rama_empresa
                LEFT JOIN empleado
                ON empresa.id_empresa = empleado.id_empresa
                WHERE empresa.id_empresa = ";


if (is_numeric($id)){
  $sql = $sql.$id;
  $sth = $dbconn->prepare($sql);
  //var_dump($sql);
  $sth->execute();
  /* Fetch all of rows in the result set */
  $data = $sth->fetch(PDO::FETCH_ASSOC);


   //$smarty->assign('id_empresa', $data["id_empresa"]);
   $smarty->assign('razon_social', $data["razon_social"]);
   $cuit=str_replace("-","",trim($data['cuit']));
   $smarty->assign('cuit', $cuit);
   $smarty->assign('correo_electronico', $data["correo_electronico"]);
   $smarty->assign('domicilio', $data["domicilio"]);
   $smarty->assign('telefono', $data["telefono"]);
   $smarty->assign('fecha_inicio_actividad', $data["fecha_inicio_actividad"]);
   $smarty->assign('rama_empresa', $data["rama_empresa"]);
   $smarty->assign('cantidad_empleados', $data["COUNT(empleado.id_empresa)"]);
   $smarty->assign('fecha_alta', $data["fecha_alta"]);
   $smarty->assign('fecha_baja', $data["fecha_baja"]);
   $smarty->assign('flg_baja', $data["flg_baja"]);
   $smarty->assign('codigo_postal', $data["codigo_postal"]);
   $idLoc = $data['id_localidad'];
   $idRam = $data['id_rama_empresa'];
}

  /***************************************************************/
   //obtener listado de localidades y ramas de las empresas
      $sql_localidades = "SELECT * FROM `localidad`  ORDER BY localidad";
      $query = $dbconn->prepare($sql_localidades);
      $query->execute();
      $listaLocalidades="";
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
          if ($row['id_localidad']<>$idLoc) {$sel=""; } else { $sel="'selected='selected' style='font-weight: bold;'"; }
          $listaLocalidades=$listaLocalidades."<option value='".$row['id_localidad']." ".$sel." '>".$row['localidad']."</option>";
      }
  /***************************************************************/
  $smarty->assign('listaLocalidades', $listaLocalidades);
  /***************************************************************/
      $sql_ramos = "SELECT * FROM `rama_empresa` ORDER BY id_rama_empresa";
      $query = $dbconn->prepare($sql_ramos);
      $query->execute();
      $listaRamas="";
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id_rama_empresa']<>$idRam) { $sel=""; } else { $sel="'selected='selected' style='font-weight: bold;'"; }
        $listaRamas=$listaRamas."<option value='".$row['id_rama_empresa']." ".$sel." '>".$row['rama_empresa']."</option>";
      }
  /***************************************************************/
  $smarty->assign('listaRamas', $listaRamas);
    /* FetchAll foreach with edit and delete using Ajax */
  //var_dump($data);  
?>
