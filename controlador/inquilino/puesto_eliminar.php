<?php 

include '../../autoload.php';
include '../../session.php';

$mensaje     =  new Mensaje();

$id 		 =  $_POST['id'];
$objeto      =  new Inquilino_puesto();
$valor       =  $objeto->eliminar($id);


switch ($valor) 
{
	case 'ok':
	$mensaje->sweetalert('Buen Trabajo','success','Registro Eliminado',2);
		break;
	
	default:
	$mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>