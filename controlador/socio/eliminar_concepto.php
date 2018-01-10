<?php 

include'../../autoload.php';
include'../.././session.php';

$id      =  $_POST['id'];
$codigo  =  $_POST['codigo'];
$tipo    =  $_POST['tipo'];

$objeto = new Detalle_concepto();

$valor  = $objeto->eliminar($id);

echo $valor;

 ?>