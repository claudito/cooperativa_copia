
<?php 

include'../../autoload.php';

$id               =  $_POST['id'];
$fecha_documento  =  $_POST['fecha_documento'];
$cliente          =  $_POST['cliente'];
$estado           =  $_POST['estado'];

$venta_cab  =  new Venta_cab('?','?',$cliente,$fecha_documento,'?',$estado);
$valor      =  $venta_cab->actualizar($id);

if ($valor=='ok') 
{
 
Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}


 ?>