<?php
require_once('dbconn.php');
$idLoc ="";
$idRam = "";
@$id = addslashes(trim($_GET['id']));
$parse="";
$sql = "SELECT empleado.id_empleado, empleado.apellido, empleado.nombre, empleado.documento,empleado.cuil,empleado.correo_electronico, empleado.domicilio, empleado.telefono,categoria_empleado.categoria_empleado, empleado.id_categoria_empleado, empleado.id_empresa,empresa.razon_social, empleado.sueldo, empleado.fecha_nacimiento, empleado.nacionalidad,empleado.id_localidad, localidad.localidad, empleado.sexo, empleado.id_estado_civil, estado_civil.estado_civil, empleado.fecha_ingreso_empresa, empleado.fecha_afiliacion, empleado.fecha_alta, empleado.fecha_baja, empleado.flg_baja, empleado.es_afiliado
FROM `empleado` 
LEFT JOIN categoria_empleado
     ON empleado.id_categoria_empleado = categoria_empleado.id_categoria_empleado
LEFT JOIN localidad
     ON empleado.id_localidad = localidad.id_localidad 
LEFT JOIN estado_civil
     ON empleado.id_estado_civil = estado_civil.id_estado_civil
LEFT JOIN empresa
     ON empresa.id_empresa = empleado.id_empresa
WHERE empleado.id_empleado = ";

//Defino var para SEXO
$m='';$f='';

if (is_numeric($id)){
  $sql = $sql.$id;
  $sth = $dbconn->prepare($sql);
  //var_dump($sql);
  $sth->execute();
  /* Fetch all of rows in the result set */
  $data = $sth->fetch(PDO::FETCH_ASSOC);

   $smarty->assign('idEmpleado', '<input type="hidden" id="id" name="id" value="'.$id.'" />');
   $smarty->assign('apellido', ' value="'.$data["apellido"].'" ');
   $smarty->assign('nombre', ' value="'.$data["nombre"].'" ');
   $cuit=str_replace("-","",trim(' value="'.$data['cuil']).'" ');
   $smarty->assign('cuil', $cuit);
   $smarty->assign('documento', ' value="'.$data["documento"].'" ');
   $smarty->assign('correo_electronico', ' value="'.$data["correo_electronico"].'" ');
   $smarty->assign('domicilio', ' value="'.$data["domicilio"].'" ');
   $smarty->assign('telefono', ' value="'.$data["telefono"].'" ');
   $smarty->assign('categoria_empleado', ' value="'.$data["categoria_empleado"].'" ');
   $smarty->assign('id_categoria_empleado', ' value="'.$data["id_categoria_empleado"].'" ');
   $smarty->assign('razon_social', ' value="'.$data["razon_social"].'" ');
   $smarty->assign('id_empresa', ' value="'.$data["id_empresa"].'" ');
   $smarty->assign('sueldo', ' value="'.$data["sueldo"].'" ');
   $smarty->assign('fecha_nacimiento', $data["fecha_nacimiento"]);
   $smarty->assign('nacionalidad', $data["nacionalidad"]);
   $smarty->assign('id_localidad', ' value="'.$data["id_localidad"].'" ');
   $smarty->assign('localidad', ' value="'.$data["localidad"].'" ');
   $smarty->assign('id_estado_civil', ' value="'.$data["id_estado_civil"].'" ');
   $smarty->assign('estado_civil', ' value="'.$data["estado_civil"].'" ');
   $smarty->assign('fecha_alta', $data["fecha_alta"]);
   $smarty->assign('fecha_baja', $data["fecha_baja"]);
   
   $smarty->assign('fecha_ingreso_empresa', $data["fecha_ingreso_empresa"]);
   $smarty->assign('fecha_afiliacion', $data["fecha_afiliacion"]);

   //Defino si es afiliado
   if ($data['es_afiliado']!='0') {   $smarty->assign('es_afiliado', ' value="'.$data["es_afiliado"].'" checked ');   }

   //Defino Blk SEXO
   
   if ($data['sexo']=='M') { $m='Selected';} elseif ($data['sexo']=='F') { $f='Selected'; } 

   $idLoc = $data['id_localidad'];
   $idRam = $data['id_categoria_empleado'];
}

//Muestro listado de valores para item sexo
$cadenaOpt='<option value="M" '.$m.' >Masculino</option><option value="F" '.$f.'>Femenino</option>';
$smarty->assign('sexo', $cadenaOpt);


//var_dump
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
  //obtener listado de estado civil
  /***************************************************************/
   $sql_localidades = "SELECT * FROM `estado_civil`  ORDER BY estado_civil";
   $query = $dbconn->prepare($sql_localidades);
   $query->execute();
   $Lst_estado_civil="";
   while($row = $query->fetch(PDO::FETCH_ASSOC)) {
       if ($row['id_estado_civil']<>$idLoc) {$sel=""; } else { $sel="'selected='selected' style='font-weight: bold;'"; }
       $Lst_estado_civil=$Lst_estado_civil."<option value='".$row['id_estado_civil']." ".$sel." '>".$row['estado_civil']."</option>";
   }
/***************************************************************/
$smarty->assign('listaestadocivil', $Lst_estado_civil);
  /***************************************************************
      $sql_ramos = "SELECT * FROM `rama_empresa` ORDER BY id_rama_empresa";
      $query = $dbconn->prepare($sql_ramos);
      $query->execute();
      $listaRamas="";
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id_rama_empresa']<>$idRam) { $sel=""; } else { $sel="'selected='selected' style='font-weight: bold;'"; }
        $listaRamas=$listaRamas."<option value='".$row['id_rama_empresa']." ".$sel." '>".$row['rama_empresa']."</option>";
      }
  /***************************************************************
  $smarty->assign('listaRamas', $listaRamas);
    /* FetchAll foreach with edit and delete using Ajax */
  //var_dump($data);  
?>
