<?php
require_once('dbconn.php');
/*
        ->  AUTOCOMPLETE para formularios / input
       +++++++++ AJAX para listar empresas sugerencia en formulario empleadosficha  +++++++++ 
        ->  Implementado en empleadosfichafooter.xhtml
*/

$html = '';
//$key = $_POST['key'];

if (isset($_POST['empresa'])) {
    $tabla ='empresa';
    $busca = $_POST['empresa'];
    $campos = '´id_empresa´, ´razon_social´ ';
    $like = 'razon_social';
    $idcampo = 'id_empresa';
    $campotxt = 'razon_social';
} elseif (isset($_POST['categoria_empleado']))  {
    $tabla ='categoria_empleado';
    $busca = $_POST['categoria_empleado'];
    $campos = ' ´id_categoria_empleado´,´categoria_empleado´ ';
    $like = 'categoria_empleado';
    $idcampo = 'id_categoria_empleado';
    $campotxt = 'categoria_empleado';
} else {
    die('Sin registros');
}

//var_dump($_POST);
$token=sanitize($_POST['token']);
$busqueda=sanitize($_POST['busqueda']);
$tb=sanitize($_POST['tipobusqueda']);
$donde='';


$consulta =  "SELECT * FROM `".$tabla. "`        WHERE `".$like."` LIKE  '%".$busca."%' LIMIT 0,5";
//              SELECT * FROM `categoria_empleado` WHERE `categoria_empleado` LIKE '%PRO%'
//var_dump($consulta);
$query = $dbconn->prepare($consulta);
$query->execute();
$parse="";
//var_dump($query);
if($query->rowCount() > 1){
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row);
        $html .= '<div><a class="suggest-element" data="'.$row[$campotxt].'" id="'.$row[$idcampo].'">'.$row[$campotxt].'</a></div>';  
    }
}else { echo "Sin coincidencias"; }

echo $html;
?>