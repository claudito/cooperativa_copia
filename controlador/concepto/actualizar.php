<?php 

include'../../autoload.php';
include'../../session.php';

$id             =  $_POST['id'];
$descripcion    =  $_POST['descripcion'];
$costo   		=  $_POST['costo'];
$porcentaje     =  $_POST['porcentaje'];
$tipo           =  $_POST['tipo'];

$concepto = new Concepto($descripcion,$costo,$porcentaje,$tipo);

$valor    = $concepto->actualizar($id);

switch ($valor) {
	case 'ok':
Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados',2);
		break;
	default:
Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}



 ?>

