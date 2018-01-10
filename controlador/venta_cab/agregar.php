<?php 

include'../../autoload.php';
include'../../session.php';

$correlativo  =  new Correlativo();


$serie                = "001";
$fecha_documento	  =  $_POST['fecha_documento'];
$cliente              =  $_POST['cliente'];
$tipo_documento       =  $_POST['tipo_documento'];
$estado               =  $_POST['estado'];
$tipo                = ($tipo_documento=='01') ? 'FT' : 'BLT' ;


$numero      	      =  $correlativo->correlativo($tipo,'numero')+1;


$venta_cab = new Venta_cab($serie,$numero,$cliente,$fecha_documento,$tipo_documento,$estado);

$valor   =  $venta_cab->agregar();

if ($valor=='existe')
{
 Mensaje::sweetalert('Documento Duplicado','warning','El número de documento ya esta registrado',2);
}
else if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
 $correlativo  =  new Correlativo($tipo,'',1);
 $correlativo->actualizar_correlativo();

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

