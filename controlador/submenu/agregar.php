<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$descripcion    =  	$_POST['descripcion'];
$item           =  	$_POST['item'];
$id_menu        = 	$_POST['id_menu'];
$ruta           = 	$_POST['ruta'];



$submenu = new SubMenu($descripcion,$item,$id_menu,$ruta);

$valor   =  $submenu->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
 #$permiso_submenu = new Permiso_submenu();
 #$permiso_submenu->agregar_submenu();

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

