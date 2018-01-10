<?php 

include'../../autoload.php';

$id       =   $_POST['id'];

$mensaje  =  new Mensaje();
$producto  =  new Proveedor();
$valor    =  $producto->eliminar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','producto Eliminado Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>