
<?php 

include'../../autoload.php';


$id        		=  $_POST['id'];
$codigo   		=  $_POST['codigo'];
$descripcion    =  $_POST['descripcion'];
$numero   		=  $_POST['numero'];

$mensaje  =  new Mensaje();
$correlativo  =  new Correlativo($codigo,$descripcion,$numero);
$valor    =  $correlativo->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>