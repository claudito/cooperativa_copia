
<?php 

include'../../autoload.php';


$id        		= $_POST['id'];
$descripcion   	= $_POST['submenu'];
$item 			= $_POST['item'];
$id_menu 		= $_POST['menu'];
$ruta 			= $_POST['ruta'];

$mensaje  =  new Mensaje();
$submenu  =  new SubMenu($descripcion,$item,$id_menu,$ruta);
$valor    =  $submenu->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>