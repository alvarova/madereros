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


$result = 0;
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=soeim;charset=utf8', usuario, pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
