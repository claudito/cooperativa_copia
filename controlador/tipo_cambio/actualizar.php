
<?php 

include'../../autoload.php';


$id       	= $_POST['id'];
$fecha     	= $_POST['fecha'];
$compra 	= $_POST['compra'];
$venta 	    = $_POST['venta'];

$mensaje  =  new Mensaje();
$unidad  =  new Tipo_cambio($fecha,$compra,$venta);
$valor    =  $unidad->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>