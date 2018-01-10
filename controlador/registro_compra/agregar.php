<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$correlativo  =  new Correlativo();

 $numero      		=  $correlativo->correlativo('RC','numero')+1;
 $id_proveedor   			=  $_POST['id_proveedor'];
 $id_compra   		=  $_POST['id_compra'];
 


$egresos = new Registro_compra($numero,$id_proveedor,$id_compra);

$valor   =  $egresos->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
 $correlativo  =  new Correlativo('RC','',1);
 $correlativo->actualizar_correlativo();
}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>

