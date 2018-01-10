<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$correlativo  =  new Correlativo();

 $numero      		=  $correlativo->correlativo('EC','numero')+1;
 $monto   			=  $_POST['monto'];
 $concepto   		=  $_POST['concepto'];
 $id_personal   	=  $_POST['personal'];
  $documento   	=  $_POST['documento'];
 $fecha_registro 	=  $_POST['fecha_registro'];


$egresos = new Egresos($monto,$numero,$concepto,$id_personal,$documento,$fecha_registro,'');

$valor   =  $egresos->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
 $correlativo  =  new Correlativo('EC','',1);
 $correlativo->actualizar_correlativo();
}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>

