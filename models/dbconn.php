<?php
/*
	DB Connect para implementar con AJAX
*/
include_once ('config.php');
  // Ejemplo de hash para acceder a las tablas, se carga en cada modulo
  //define("empleados",         '192cdbee330355bf76c9e82d4456c2c6');
  //define("empresas",          'dcfcc703b4dad82c3f554b716b2bcd55');
  //define("trabajointerno",    'f5ffc67a958c4b8b022c506c9b9cb2d4');
  //define("ordenes",           'f6a3d26eab43dec0e79ce623b125edc8');
  //define("recibos",           '1f4ecce087a3a2cb028db9cd22adf409');
  //define("bocaexpendio",      '597197bebad19a94f1ab9201a8e7ceb8');
  //define("sobres",            '21e2742e1f95d1af0d1a1463684b570f');
  //define("informaciongeneral",'94e75c1dd90ed6f2f23bb265ce16fd30');

  function sanitizeStore($str)  //Empleado en AJAX
  {
    $aux = addslashes($str);
    $aux = trim($aux);
    $aux = strtoupper($aux);
    return $aux;
  }
  function FixCuit($cuit){
    $cuitf=str_replace(" ", "", $cuit);
    $c=substr_count($cuitf,'-');
    if ($c<2) {
      $sale=substr($cuitf,0,2).'-'.substr($cuitf,2,8).'-'.substr($cuitf,10,1);
    } else {
      $sale=$cuit;
    }
    return $sale;
  }

  function obtenerTabla($str)  //Empleado en AJAX
  {
    ////echo "Entra obtener tabla - ".$str ;
   if ($str==strtoupper('192cdbee330355bf76c9e82d4456c2c6')) { $sale="empleado";}
   elseif ($str==strtoupper('dcfcc703b4dad82c3f554b716b2bcd55')) { $sale="empresa";}
   elseif ($str==strtoupper('a9f4eb5402f54d7fe9fe543928eaca7b')) { $sale="observacion_empleado";}
   else { die('No se encontró toquen vinculado:'+$str); }
   //echo "Sale obtener tabla -".$sale.'-';
   return $sale;
  }

$result = 0;
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=soeim;charset=utf8', usuario, pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
