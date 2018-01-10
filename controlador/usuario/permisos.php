<?php 

include'../../autoload.php';
include'../../session.php';

$submenu  =  new SubMenu();
$mensaje  =  new Mensaje();

if (isset($_POST['usuario'])) 
{
	
 $usuario  = $_POST['usuario'];

foreach ($submenu->lista() as $key => $value) 
{ 	
    $permiso_submenu   =  new Permiso_submenu($value['id'],$usuario);

     $estado = ($_POST[$value['id']]=='on') ? 1 : 0 ;

     $permiso_submenu  =  new Permiso_submenu($value['id'],$usuario,$estado);
     $valor         =  $permiso_submenu->actualizar();

	if ($valor=='ok') 
	{
	echo $mensaje->sweetalert('Permisos Actualizados','success','...',2);
	} 
	else
	{
	echo $mensaje->sweetalert('Error de registro','error','Intentar de Nuevo',2);
	}

} 

} 
else 
{
	echo $mensaje->sweetalert('Usuario Desconocido','error','Intentar de Nuevo',2);
}



 ?>