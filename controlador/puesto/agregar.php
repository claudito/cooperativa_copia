<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$codigo 	 = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$estado      = $_POST['estado'];
$tipo        = $_POST['tipo'];
$puesto      = new Puesto($codigo,$descripcion,$estado,$tipo);

$valor       =  $puesto->agregar();


switch ($valor) {
	case 'existe':
	 $mensaje->sweetalert('Registro Duplicado','warning','Intente con otro número',2);
		break;
	case 'ok':
	 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
		break;
	default:
	$mensaje->sweetalert('Error','error','Consulte al área de Sistemas',2);
		break;
}






 ?>

