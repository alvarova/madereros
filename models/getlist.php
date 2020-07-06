<?php

  /*Definiciones de pseudo-tokens y conector a DB */

require_once('dbconn.php');
         //var_dump($_POST);
         $token=sanitize($_POST['token']);
         $busqueda=sanitize($_POST['busqueda']);
         $tb=sanitize($_POST['tipobusqueda']);
        $donde='';

$localidad=" LEFT JOIN localidad ON empresa.id_localidad = localidad.id_localidad  ";

if (!empty($busqueda)){
 switch ($tb) {
     case 'CUIT':
          $donde=" WHERE cuit LIKE '%".$busqueda."%'";

       break;
     case 'RS':
          $donde=" WHERE razon_social LIKE '%".$busqueda."%'";

       break;
     default:
         $donde = '';      

       break;
   }
          
}

   switch ($token) {
     case empresas:
          $tabla='empresa';
          $idtabla = 'id_empresa';
       break;
     
     case empleados:
          $tabla='empleado';
          $idtabla = ' id_empleado ';
       break;



     default:
         die(json_encode(array('error' => 'Sin identificador de tablas.')));      
       break;
   }

    $consulta =  "SELECT * FROM `".$tabla."`  ".$donde." ORDER BY ".$idtabla;
    $query = $dbconn->prepare(" SELECT * FROM `".$tabla."`  ".$localidad."  ".$donde." ORDER BY localidad");
    $query->execute();
    $parse="";

    //var_dump($consulta);

   switch ($token) {

     case empresas:
/*
'id_empresa' ,  'razon_social' 'cuit' 'correo_electronico' 'domicilio' 'telefono' 'fecha_inicio_actividad' 'id_localidad' 'id_rama_empresa' 'id_usuario_sistema' 'fecha_alta' 'fecha_baja' 'flg_baja'*/
		    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
		      $parse = $parse.'<tr>
          <td>'.$row['cuit']. '</td>
          <td>'. $row['razon_social']. '</td>
          <td>'. $row['telefono']. '</td>
          <td>'. $row['domicilio']. '</td>
          <td>'. $row['localidad']. '</td>
          <td>'. $row['fecha_alta']. '</td>
          <td><div class="td-actions"><a href="./?acc=empresasficha&id='.$row['id_empresa'].'" class="icon red" data-toggle="tooltip" data-placement="top" title="Ampliar"><i class="icon-circle-with-plus"></i></a><a href="./index.php?acc=empresas&ver='.$row['id_empresa'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }
			 echo $parse;							
       break;     

     case empleados:
		    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
		      $parse = $parse.'<tr><td>'.$row['id_categoria']. '</td><td>'. $row['nombre_categoria']. '</td><td><div class="td-actions"><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="icon-circle-with-plus"></i></a><a href="#" class="icon green" data-toggle="tooltip" data-placement="top" title="Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }


			var_dump($parse);							
       break; 



     default:
         die(json_encode(array('error' => 'Sin identificador de tablas.')));      
       break;
   }


    $dbconn = null;
