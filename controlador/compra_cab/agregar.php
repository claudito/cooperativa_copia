<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();
$codigo_socio_negocio    = $_POST['razon'];
$serie   =  $_POST['serie'];
$numero               =  $_POST['numero'];
$fecha_documento   =  $_POST['fecha_documento'];


$concepto = new Compra_cab($serie,$numero,$codigo_socio_negocio,$fecha_documento);

$valor   =  $concepto->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

