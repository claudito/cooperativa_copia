<?php 

include'../../autoload.php';
include'../../session.php';

$descripcion    =  $_POST['descripcion'];
$costo   		=  $_POST['costo'];
$porcentaje     =  $_POST['porcentaje'];
$tipo           =  $_POST['tipo'];

$concepto = new Concepto($descripcion,$costo,$porcentaje,$tipo);

$valor    = $concepto->agregar();

switch ($valor) {
	case 'ok':
Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
		break;
	case 'existe':
Mensaje::sweetalert('Registro Duplicado','warning','Intente con otra descripción',2);
		break;
	
	default:
Mensaje::sweetalert('Error','error','...',2);
		break;
}



 ?>

