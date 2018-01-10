<?php 


include'../../autoload.php';
include'../../session.php';


 $message     =  new Mensaje();

 $id               =  $_POST['id'];
 $descripcion       =  $_POST['descripcion'];
 $cantidad            =  $_POST['cantidad'];
 $precio_uni      =  $_POST['precio_uni'];


$objeto  =  new Compra_det('?',$descripcion,$cantidad,$precio_uni);

$valor  =   $objeto->actualizar($id);

switch ($valor) {
	case 'ok':
	$message->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	
	default:
	$message->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>