<?php 

include'../../autoload.php';

$id       =  $_POST['id'];

$valor    =  Plan_mov_det::eliminar($id);

if ($valor=='ok') 
{
Mensaje::sweetalert('Buen Trabajo','success','Registro Eliminado Correctamente',2);
}
else 
{
Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>