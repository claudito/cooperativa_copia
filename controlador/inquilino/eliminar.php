<?php 

include'../../autoload.php';

$id       =   $_POST['id'];

$mensaje  	=  new Mensaje();
$inquilino  =  new Inquilino();
$valor    	=  $inquilino->eliminar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Usuario Eliminado Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>