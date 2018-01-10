<?php 

include'../../autoload.php';

$numero     =  $_POST['numero'];
$valor_1    =  Plan_mov_cab::eliminar_cab($numero);
$valor_2    =  Plan_mov_cab::eliminar_det($numero);

if ($valor_1=='ok' AND $valor_2=='ok') 
{

Mensaje::sweetalert('Buen Trabajo','success','Registro Eliminado Correctamente',2);
}
else 
{
 Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}

 ?>
 