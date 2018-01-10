<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$descripcion   	=  $_POST['descripcion'];
$item 			=  $_POST['item'];


$objeto = new Menu($descripcion,$item);

$valor   =  $objeto->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

