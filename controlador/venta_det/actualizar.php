
<?php 





include'../../autoload.php';
include'../../session.php';


 $message     =  new Mensaje();

 $id               =  $_POST['id'];
 $descripcion       =  $_POST['descripcion'];
 $cantidad            =  $_POST['cantidad'];
 $precio_uni      =  $_POST['precio_uni'];


$objeto  =  new Venta_det('?',$descripcion,$cantidad,$precio_uni);

$valor  =   $objeto->actualizar($id);

switch ($valor) {
	case 'ok':
	$message->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	
	default:
	$message->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
}



/*

include'../../autoload.php';


$id            =  $_POST['id'];
$descripcion   =  $_POST['descripcion'];
$cantidad        =  $_POST['cantidad'];
$precio_unitario       =  $_POST['precio_unitario'];





$mensaje  =  new Mensaje();
$venta_det  =  new Venta_det($descripcion,$cantidad,$precio_unitario);
$valor    =  $venta_det->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}

*/

 ?>