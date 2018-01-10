<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();


$descripcion        =  $_POST['descripcion'];



$area = new Area($descripcion);

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

