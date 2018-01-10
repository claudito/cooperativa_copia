<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje 	= new Mensaje();


$cuenta   		 =  $_POST['cuenta'];
$descripcion     =  $_POST['descripcion'];
$familia         =  $_POST['familia'];
$unidad          =  $_POST['unidad'];



$producto = new Producto($cuenta,$descripcion,$familia,$unidad);

$valor   =  $producto->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

