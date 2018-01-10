
<?php 

include'../../autoload.php';


$id        =  $_POST['id'];
$cuenta    =  $_POST['cuenta'];
$descripcion   =  $_POST['descripcion'];
$familia       =  $_POST['familia'];
$unidad        =  $_POST['unidad'];


$mensaje  =  new Mensaje();
$producto  =  new Producto($cuenta,$descripcion,$familia,$unidad);
$valor    =  $producto->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>