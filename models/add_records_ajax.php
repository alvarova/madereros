<?php

  require_once('dbconn.php');

  //Empresa
/* Items con [*] implica necesarios  
id_empresa
*razon_social
*cuit
*correo_electronico
*domicilio
*telefono
*fecha_inicio_actividad
id_localidad
*id_rama_empresa
id_usuario_sistema
fecha_alta
fecha_baja
flg_baja          */

  function sanitizeStore($str)
  {
    $aux = addslashes($str);
    $aux = trim($aux);
    $aux = strtoupper($aux);
    return $aux;
  }
  function obtenerTabla($str)
  {
   if ($str=='192cdbee330355bf76c9e82d4456c2c6') { $sale="empleados";}
   elseif ($str=='dcfcc703b4dad82c3f554b716b2bcd55') { $sale="empresas";}
   else { die('No se encontró toquen vinculado'); }
   return ("empresas");
  }
  //var_dump($_POST);
 $tabla="empresa"; 
 $varSql="";
 $intoSql="";
//fetch key of the last element of the array.
  end($_POST);
  
  $ultimo = key($_POST);
  
  foreach ($_POST as $campo => $variable) {
    //var_dump($variable); 
      $valido=false;
      $variable=sanitizeStore($variable); 
      $submited=substr_count($campo, 'submit');
      
      if ($campo=='token') {              //Si es token obtengo tabla
         $tabla = obtenerTabla($token);
      }elseif ($submited<1) {                             //Sino encolo campos
       $intoSql=$intoSql." `".$campo."`";
       $varSql =$varSql." '".$variable."' ";
       $valido=true;
      }


      if ($ultimo==$campo) {  
            $intoSql=substr($intoSql,0,-2).")"; 
            $varSql=substr($varSql,0,-2).")"; 
          }else{ 
            if ($valido) {
              $intoSql=$intoSql.", "; 
              $varSql=$varSql.", "; 
              $valido=false;
            }
          }  //Si es ultimo cierro )

  }


  $insertSql="INSERT INTO $tabla (".$intoSql." VALUES (".$varSql;
  
  //echo $insertSql;
  //$price    = trim($_POST["price"]);
  //$category = trim($_POST["category"]);

	/*switch ($token) {
		case empresas:
			$tabla='empresa empr';
			
		break;
     
		case empleados:
			$tabla='empleado empl';
			
		break;

		default:
			die(json_encode(array('error' => 'Sin identificador de tablas.')));      
		break;
	}
  */
  

 prepare sql and bind parameters
    $stmt = $dbconn->prepare($insertSql);

    // insert a row
    if($stmt->execute()){
      $result =1;
    }
    echo $result;
    $dbconn = null;
