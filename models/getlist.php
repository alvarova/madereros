<?php

  /*Definiciones de pseudo-tokens y conector a DB */

require_once('dbconn.php');
        //var_dump($_POST);
        $token=sanitize($_POST['token']);
        $busqueda=sanitize($_POST['busqueda']);
        $tb=sanitize($_POST['tipobusqueda']);
        $donde='';



if (!empty($busqueda)){

switch ($tb) {
    case 'CUIT':
        $donde="AND fecha_baja IS NULL AND cuit LIKE '%".$busqueda."%'";

       	break;
    case 'RS':
        $donde="AND fecha_baja IS NULL AND razon_social LIKE '%".$busqueda."%'";

       	break;
	case 'DNICUIL':
		$donde="AND fecha_baja IS NULL AND (documento LIKE '%".$busqueda."%' OR cuil LIKE '%".$busqueda."%')"; 
		
	   	break;
	case 'AN':
		$donde="AND fecha_baja IS NULL AND (apellido LIKE '%".$busqueda."%' OR nombre LIKE '%".$busqueda."%')";

		break;
    default:
        $donde = " ";      

      	break;
   }
          
}


	switch ($token) {
		case empresas:
			$tabla='empresa empr';
			$idtabla = 'id_empresa';
			$localidad = ", localidad lo WHERE empr.id_localidad = lo.id_localidad AND flg_baja=0 AND";
		break;
     
		case empleados:
			$tabla='empleado empl';
			$idtabla = 'id_empleado';
			$localidad = ", localidad lo WHERE empl.id_localidad = lo.id_localidad AND flg_baja=0 ";
		break;

		default:
			die(json_encode(array('error' => 'Sin identificador de tablas.')));      
		break;
	}


    $consulta =  "SELECT * FROM ".$tabla. $localidad .$donde." ORDER BY ".$idtabla;
    $query = $dbconn->prepare($consulta);
    $query->execute();
    $parse="";


if($query->rowCount() < 1){
	echo 'Sin resultados';
}
else{
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
								  <td>'. $row['id_localidad']. '</td>
								  <td>'. $row['fecha_alta']. '</td>
								  <td><div class="td-actions"><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="icon-circle-with-plus"></i></a><a href="./index.php?acc=empresas&ver='.$row['id_empresa'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }
			
			echo $parse;	
									
       break;     

     case empleados:
		    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$parse = $parse.'<tr>
								  <td>'.$row['documento']. '</td>
								  <td>'.$row['cuil']. '</td>
								  <td>'.$row['apellido']. '</td>
							      <td>'.$row['nombre']. '</td>
							      <td>'.$row['telefono']. '</td>
							      <td>'.$row['domicilio']. '</td>
							      <td>'.$row['localidad']. '</td>
							      <td>'.$row['fecha_alta']. '</td>
							      <td><div class="td-actions"><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="icon-circle-with-plus"></i></a><a href="./index.php?acc=empleados&ver='.$row['id_empleado'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }
			echo $parse;						
       break; 



     default:
         die(json_encode(array('error' => 'Sin identificador de tablas.')));      
       break;
   }
}

    $dbconn = null;
