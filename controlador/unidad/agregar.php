<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$codigo         =  $_POST['codigo'];
$descripcion    =  $_POST['descripcion'];



$unidad = new Unidad($codigo,$descripcion);

$valor   =  $unidad->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);


}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

