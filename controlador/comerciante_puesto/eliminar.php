<?php 

include'../../autoload.php';
include'../../session.php';

$id       =   Funciones::validar_xss($_POST['id']);

$valor    =  Comerciante_puesto::eliminar($id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Registro Eliminado Correctamente',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>