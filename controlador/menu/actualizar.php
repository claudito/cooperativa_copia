
<?php 

include'../../autoload.php';


$id        		=  $_POST['id'];
$descripcion   	=  $_POST['descripcion'];
$item 			=  $_POST['item'];

$mensaje  =  new Mensaje();
$menu  =  new Menu($descripcion,$item);
$valor    =  $menu->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>