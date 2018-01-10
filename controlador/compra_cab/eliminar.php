<?php 

include'../../autoload.php';

$id    =   $_POST['id'];

$mensaje  =  new Mensaje();
$compra_cab  =  new Compra_cab();
$compra_det  = new Compra_cab();
$valor_1    =  $compra_cab->eliminar_cab($id);
$valor_2    =  $compra_det->eliminar_det($id);

if ($valor_1=='ok' AND $valor_2=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Registro Eliminado Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}

 ?>
 