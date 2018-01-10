<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$nombres   		=  $_POST['nombres'];
$apellidos 		=  $_POST['apellidos'];
$dni       		=  $_POST['dni'];
$telefono  		=  $_POST['telefono'];
$direccion_1  	=  $_POST['direccion_1'];
$direccion_2  	=  $_POST['direccion_2'];
$correo    		=  $_POST['correo'];
$area    		=  $_POST['area'];


$socios = new Inquilino($nombres,$apellidos,$dni,$telefono,$direccion_1,$direccion_2,$correo,$area);

$valor   =  $socios->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

