
<?php 

include'../../autoload.php';


$id        		=  $_POST['id'];
$nombres        =  $_POST['nombres'];
$apellidos      =  $_POST['apellidos'];
$dni 			=  $_POST['dni'];
$ruc 			=  $_POST['ruc'];
$razon_social   =  $_POST['razon_social'];
$direccion 		=  $_POST['direccion'];
$telefono 		=  $_POST['telefono'];
$celular 		=  $_POST['celular'];
$correo 		=  $_POST['correo'];
$cargo 			=  $_POST['cargo'];

$objeto  =  new Personal($nombres,$apellidos,$dni,$ruc,$razon_social,$telefono,$celular,$direccion,$correo,$cargo);
$valor    =  $objeto->actualizar($id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>