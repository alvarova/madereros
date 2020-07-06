<?php

//*******************************
//  Define variables globales
//*******************************
$base="/xampp/htdocs/madereros";

$libs = "./libs";
$css = "./assets/css";
$img = "./assets/img";
$files ="./assets/files";
$temp ="./assets/temp";
$views ="./views";
$models ="./models/";

define('libDir', $base.$libs);
// define smarty lib directory
define('smartyDir', $base.$libs);
define('cssDir', $base.$css);
define('imgDir', $base.$img);
define('archivosDir', $base.$files);
define('template', $base.$views);
define('modelos', $base.$models);
define('basedir', $base.'/');

/***  DB ACCESS ***/
define('usuario','adminsoeim');
define('pass','soeimadmin');
define('server','localhost');
define('db','SOEIM');

/*TOKENS */

  define("empleados",    '192cdbee330355bf76c9e82d4456c2c6');
  define("empresas",'dcfcc703b4dad82c3f554b716b2bcd55');
  define("trabajointerno",   'f5ffc67a958c4b8b022c506c9b9cb2d4');
  define("ordenes",   'f6a3d26eab43dec0e79ce623b125edc8');
  define("recibos",    '1f4ecce087a3a2cb028db9cd22adf409');
  define("bocaexpendio",     '597197bebad19a94f1ab9201a8e7ceb8');
  define("sobres",'21e2742e1f95d1af0d1a1463684b570f');
//*******************************
//     Cargo Libreria PDO/DB
//*******************************

require smartyDir."/Db.class.php";
require libDir."/Smarty.class.php";

//*******************************
//Otras variables y definiciones
//*******************************
$mensaje = "";   //  <-Para alertas

//require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = './views/';
$smarty->compile_dir = './views/compiled/';
$smarty->config_dir = './views/configs/';
$smarty->cache_dir = './views/cache/';

$smarty->assign('titulo', "SOEIM Admin V0.1");
$smarty->assign('autor', "OpcionesDesign");
$smarty->assign('descripcion', "Sistema de Gestion V0.1");

function sanitize(&$str){ $value = trim($str); $sale=strip_tags($value); return ($sale); }


//Definiciones para
//Testing

//Desarrollo

//Produccion