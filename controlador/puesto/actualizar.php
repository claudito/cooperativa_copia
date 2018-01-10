<?php 

include'../../autoload.php';

$id          =  $_POST['id'];
$codigo 	 =  $_POST['codigo'];
$descripcion =  $_POST['descripcion'];
$tipo        =  $_POST['tipo'];
$estado      =  $_POST['estado'];

$puesto  =  new Puesto($codigo,$descripcion,$estado,$tipo);
$valor    =  $puesto->actualizar($id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>