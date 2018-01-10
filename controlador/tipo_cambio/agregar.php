<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();


$fecha        =  $_POST['fecha'];
$compra       =  $_POST['compra'];
$venta        =  $_POST['venta'];

$area = new Tipo_cambio($fecha,$compra,$venta);

$valor   =  $area->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
 
}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

