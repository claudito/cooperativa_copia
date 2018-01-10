<?php 


include'../../autoload.php';
include'../../session.php';

$mensaje         	=  new Mensaje();

$id_socio			=  $_POST['id'];
$codigo_puesto     	=  $_POST['codigo_puesto'];
$descripcion  		=  $_POST['descripcion'];


$objeto 	=  new Socio_puesto($id_socio,$codigo_puesto,$descripcion);
$valor  	=   $objeto->agregar();

switch ($valor) {
	case 'ok':
	$mensaje->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	
	default:
	$mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}


 ?>