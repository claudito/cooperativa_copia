
<?php 

include'../../autoload.php';


$id        		= $_POST['id'];
$codigo     	= $_POST['codigo'];
$descripcion 	= $_POST['descripcion'];


$mensaje  =  new Mensaje();
$unidad  =  new Unidad($codigo,$descripcion);
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