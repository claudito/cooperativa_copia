<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$tipo   			=  $_POST['tipo'];
$id_comerciante   	=  $_POST['comerciante'];
$id_concepto   		=  $_POST['concepto'];
#$codigo_puesto   	=  $_POST['codigo_puesto'];
#$costo   			=  $_POST['costo'];



$detalle_concepto = new Detalle_concepto($tipo,$id_comerciante,$id_concepto,'','');

$valor   =  $detalle_concepto->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>

