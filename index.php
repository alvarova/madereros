<?php 
session_start();
include 'models/config.php';
/***************************************************/
/*       Sistemas MADEREROS  2020 V0.1             */
/***************************************************/
/*   Se sincroniza con la web empleando python     */
/***************************************************/

/***************************************************/
/*       Validacion de usuario o login             */
/***************************************************/

if(isset($_POST['enter'])){
	$data = array_map('trim', $_POST);
	$data = array_map('strip_tags', $data);
	$r = hash('sha256', $data['password'], false);
	$data['password'] = $r;

	$con1=new Connect(usuario, pass, server, db);
	$user = $con1->selectLoginPassword('usuario', $data);
	//var_dump($user);
	if($user){
		$_SESSION = $user;
		//var_dump($data);
		$_SESSION['usuario']  = $data['login'];
		$_SESSION['id_usuario'] = $user['id_usuario'];
		//$_SESSION['seccion'] = $data['seccion'];
		$_SESSION['instante']   = time();
	}
	else{
		$mensaje = "<span style='color:red'>Imposible acceder -</span>";
	}

}

/***************************************************/
/*       Muestra template de acuerdo a la accion   */
/***************************************************/
$smarty->error_reporting = E_ALL & ~E_NOTICE;
if(!isset($_SESSION['usuario'])){  //Parseo template login
	$smarty->assign('mensaje', $mensaje);
	$smarty->display('./views/login.html');
} else {

	//*********************
	// Parseo por GET/POST
	//*********************
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET': $data = &$_GET;   $acc= isset($data['acc']) ? $data['acc'] : 'inicial'; $acc= empty($acc) ? 'inicial':$acc; break;
		case 'POST': $data = &$_POST; $acc= isset($data['acc']) ? $data['acc'] : 'inicial'; $acc= empty($acc) ? 'inicial':$acc; break;
		default:
			$data=""; $acc="inicial";
	}

	//var_dump($data);

	$token=md5($acc); //->selector de area menu

	$smarty->assign('spinner', '');  //En el caso de no ser pagina inicial, anulo spinner
	$dia=date("j/n/Y");
	$smarty->assign('fecha', $dia);
switch  ($acc) {

		case 'empresas': {
			
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('empresasactive', 'active-page');
			$smarty->assign('token', empresas);
			$smarty->assign('acc', "empresas");
			$smarty->assign('tipobusqueda', empresas);
			break;
		}
		case 'empresasficha': {
			
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('empresasactive', 'active-page');
			$smarty->assign('token', empresas);
			if (isset($_GET['id'])) 
			{ 
				$modo='edit';
				$smarty->assign('omitir', "//");
				$smarty->assign('id', $_GET['id']);
				$smarty->assign('modoedicion', "modificó");
			} else {
				 $modo='add'; 
				 $smarty->assign('modoedicion', "agregó");
			} //  Update o Insert
			$smarty->assign('modo', $modo);
			$smarty->assign('acc', "empresasficha");
			$smarty->assign('tipobusqueda', empresas);
			include_once("./models/empresaficha.php");
			break;
		}
		case 'empleados': {
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('empleadosactive', 'active-page');
			$smarty->assign('token', empleados);
			$smarty->assign('acc', "empleados");
			$smarty->assign('tipobusqueda', empleados);
			$smarty->assign('tablaModal', observacion_empleado);
			break;
		}
		case 'empleadosficha': {
			
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('empresasactive', 'active-page');
			$smarty->assign('token', empresas);
			if (isset($_GET['id'])) 
			{ $modo='edit';} 
			else { $modo='add'; } //  Update o Insert
			var_dump("-".$modo);
			$smarty->assign('acc', "empresasficha");
			$smarty->assign('tipobusqueda', empresas);
			include_once("./models/empresaficha.php");
			break;
		}
		case 'trabajointerno': {
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('trabajointernoactive', 'active-page');
			break;
		}
		//OPCIONES -->  Item por separado
		case 'ordenes': {
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('ordenesactive', 'active-page');
			include_once('./models/getlist.php');
			$smarty->assign('parse', $parse);
			break;
		}
		case 'recibos': {
			// Cargar los JS para gestion de grids 
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');			
			$smarty->assign('recibosactive', 'active-page');
			include_once('./models/getlist.php');
			$smarty->assign('parse', $parse);
			break;
		}
		case 'bocaexpendio': {
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');
			$smarty->assign('bocaexpendioactive', 'active-page');
			break;
		}
		case 'sobres': {
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');
			$smarty->assign('sobresactive', 'active-page');
			break;
		}
		case 'informaciongeneral': {
			$smarty->assign('head', $acc.'head.xhtml');
			$smarty->assign('footer', $acc.'footer.xhtml');
			$smarty->assign('informaciongeneralactive', 'active-page');
			break;
		}
		default: {
			// Por defecto principal
			$smarty->assign('head', 'vacio.xhtml');	
			$smarty->assign('mensaje', $mensaje);
			$smarty->assign('spinner', '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Cargando...</span></div></div>');

		}
	}



  //Ingreso Parseo menu principal
	$smarty->assign('cuerpo', $acc.'.xhtml');	
	$smarty->assign('mensaje', $mensaje);
	$smarty->display('./views/index.html');

}

/*
index.php -> index.html :  Acciones

 Carga titulos pagina, carga de css y js extras en comienzo y final de pagina 	------>	$head $footer
 Define el spinner (barra de carga de la pagina)  								------>	$spinner
 anexa html Barra superior logo, buscador, avisos, login						------>	header.xhtml
 Carga del menu y el CUERPO de la pagina segun la accion 						------>	Menu.xhtml    
 
*/
/*Acceso correcto. Actividades para <?php  echo $_SESSION['usuario'].'<br>'; ?>
<a href='profile.php'>Perfil</a><br>
<a href='logout.php'>Salir</a>
*/
?>