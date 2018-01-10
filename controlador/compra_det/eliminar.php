<?php 


include'../../autoload.php';
include'../../session.php';


$message     =  new Mensaje();

$id          =  $_POST['id'];

$objeto      =  new Compra_det();

$valor       =  $objeto->eliminar($id);

switch ($valor) {
	case 'ok':
	$message->sweetalert('Buen Trabajo','success','Registro Eliminado',2);
		break;
	
	default:
	$message->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>