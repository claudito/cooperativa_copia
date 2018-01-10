<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$codigo   		=  $_POST['codigo'];
$descripcion    =  $_POST['descripcion'];
$numero   		=  $_POST['numero'];



$correlativo = new Correlativo($codigo,$descripcion,$numero);

$valor   =  $correlativo->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

