<?php 


include'../../autoload.php';
include'../../session.php';


$message     =  new Mensaje();

$id_compra_cab      =  $_POST['id'];
$descripcion       =  $_POST['descripcion'];
$cantidad            =  $_POST['cantidad'];
$precio_uni      =  $_POST['precio_uni'];


$objeto  =  new Compra_det($id_compra_cab,$descripcion,$cantidad,$precio_uni);

$valor  =   $objeto->agregar();

switch ($valor) {
	case 'ok':
	$message->sweetalert('Buen Trabajo','success','Detalle Registrado',2);
		break;
	
	default:
	$message->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>