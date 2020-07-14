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

		case 'HCUIT':
			$donde="AND fecha_baja IS NOT NULL AND cuit LIKE '%".$busqueda."%'";
	       	break;

	    case 'HRS':
	    	$donde="AND fecha_baja IS NOT NULL AND razon_social LIKE '%".$busqueda."%'";
	       	break;

	    case 'HDNICUIL':
	    	$donde="AND fecha_baja IS NOT NULL AND (documento LIKE '%".$busqueda."%' OR cuil LIKE '%".$busqueda."%')"; 
			break;

		case 'HAN':
			$donde="AND fecha_baja IS NOT NULL AND (apellido LIKE '%".$busqueda."%' OR nombre LIKE '%".$busqueda."%')";
			break;

	    default:
	        $donde = " ";
	      	break;
	   }         
}
else{
	$valor = $tb[0];
	if($valor == 'H')
		$donde = "AND fecha_baja IS NOT NULL ";
	else
		$donde = "AND fecha_baja IS NULL ";
}


switch ($token) {
	case empresas:
		$tabla='empresa empr';
		$idtabla = 'id_empresa';
		$otrasTablas = ", localidad lo, rama_empresa re WHERE empr.id_localidad = lo.id_localidad AND empr.id_rama_empresa = re.id_rama_empresa AND flg_baja=0 ";
	break;
 
	case empleados:
		$tabla='empleado empl';
		$idtabla = 'id_empleado';
		$otrasTablas = ", localidad lo, categoria_empleado ce WHERE empl.id_localidad = lo.id_localidad AND empl.id_categoria_empleado = ce.id_categoria_empleado AND flg_baja=0 ";
	break;

	default:
		die(json_encode(array('error' => 'Sin identificador de tablas.')));      
	break;
}


$consulta =  "SELECT * FROM ".$tabla. $otrasTablas .$donde." ORDER BY ".$idtabla;
//var_dump($consulta);
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
								  <td>'.$row['cuit'].'</td>
								  <td>'.$row['razon_social'].'</td>
								  <td>'.$row['telefono'].'</td>
								  <td>'.$row['domicilio'].'</td>
								  <td>'.$row['rama_empresa'].'</td>
								  <td>'.$row['localidad'].'</td>
								  <td>'.$row['fecha_alta'].'</td>
								  <td><div class="td-actions"><a href="javascript:void(0);" onClick="verObservacion(\''.$row['razon_social'].'\');" class="icon red" data-toggle="tooltip" data-placement="top" title="Ver Observaciones"><i class="icon-bell"></i></a><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Agregar Empleado"><i class="icon-user-plus"></i></a><a href="./?acc=empresasficha&idEmpr'.$row['id_empresa'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Dar de Baja"><i class="icon-circle-with-minus"></i></a><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }
			
			echo $parse;						
       	break;     

     	case empleados:
		    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				$parse = $parse.'<tr>
								  <td>'.$row['documento'].'</td>
								  <td>'.$row['cuil'].'</td>
								  <td>'.$row['apellido'].'</td>
							      <td>'.$row['nombre'].'</td>
							      <td>'.$row['telefono'].'</td>
							      <td>'.$row['domicilio'].'</td>
							      <td>'.$row['categoria_empleado'].'</td>
							      <td>'.$row['localidad'].'</td>
							      <td>'.$row['fecha_alta'].'</td>
							      <td><div class="td-actions"><a href="javascript:void(0);" onClick="verObservacion(\''.$row['apellido'].'\',\''.$row['nombre'].'\');" class="icon red" data-toggle="tooltip" data-placement="top" title="Ver Observaciones"><i class="icon-bell"></i></a><a href="./index.php?acc=empleados&ver='.$row['id_empleado'].'" class="icon green" data-toggle="tooltip" data-placement="top" title="Ver/Modificar"><i class="icon-save"></i></a><a href="#" class="icon blue" data-toggle="tooltip" data-placement="top" title="Dar de Baja"><i class="icon-circle-with-minus"></i></a><a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="icon-cancel"></i></a></div></td></tr>';
		    }
			echo $parse;						
       	break; 

	    default:
        	die(json_encode(array('error' => 'Sin identificador de tablas.')));      
        break;
   }
}

$dbconn = null;
