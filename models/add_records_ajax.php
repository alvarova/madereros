<?php

  require_once('dbconn.php');

  function sanitizeStore($str)
  {
    $aux = addslashes($str);
    $aux = trim($aux);
    $aux = strtoupper($aux);
    return $aux;
  }

  var_dump($_POST);
  $token  = trim($_POST["product"]);
  $price    = trim($_POST["price"]);
  $category = trim($_POST["category"]);

	switch ($token) {
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
  
  

// prepare sql and bind parameters
    $stmt = $dbconn->prepare("INSERT INTO tbl_products(product_name, price, category)
    VALUES (:product, :price, :category)");

    // insert a row
    if($stmt->execute()){
      $result =1;
    }

    echo $result;
    $dbconn = null;
