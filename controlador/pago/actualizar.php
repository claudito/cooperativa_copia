<?php 

include'../../autoload.php';
include'../../session.php';

$id     =  $_POST['id'];
$pago   =  $_POST['pago'];
$costo  =  $_POST['costo'];
$fecha  =  date('Y-m-d H:i:s');

$valor =  Pago::actualizar($id,$pago,$fecha);
if ($valor=='ok')
{
Mensaje::sweetalert('Buen Trabajo','success','Pago Actualizado',2);
} 
else 
{
Mensaje::sweetalert('Error','error','Consulte al área de sistemas',2);
}






 ?>