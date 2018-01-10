<?php 

include'../../autoload.php';

$id       =   $_POST['id'];

$valor    =  Personal::eliminar($id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Usuario Eliminado Correctamente',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>