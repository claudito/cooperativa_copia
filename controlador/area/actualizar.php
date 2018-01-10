
<?php 

include'../../autoload.php';


$id 			= $_POST['id'];
$descripcion   	= $_POST['descripcion'];


$mensaje  	=  new Mensaje();
$area 		= new Area($descripcion);
$valor    	=  $area->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>