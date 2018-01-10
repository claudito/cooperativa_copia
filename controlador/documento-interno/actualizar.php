
<?php 

include'../../autoload.php';
$mensaje        =  new Mensaje();
$id       		=  $_POST['id'];
$descripcion   	=  $_POST['descripcion'];

$documento_interno  =  new Documento_interno($descripcion);
$valor    			=  $documento_interno->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);
}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>