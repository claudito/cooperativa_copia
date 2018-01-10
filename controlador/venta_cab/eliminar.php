<?php 

include'../../autoload.php';

$numero    =   $_POST['numero'];

$mensaje  =  new Mensaje();
$venta_cab  =  new Venta_cab();
$venta_det  = new Venta_cab();
$valor_1    =  $venta_cab->eliminar_cab($numero);
$valor_2    =  $venta_det->eliminar_det($numero);

if ($valor_1=='ok' AND $valor_2=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Registro Eliminado Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}

 ?>
 