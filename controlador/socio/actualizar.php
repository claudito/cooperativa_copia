
<?php 

include'../../autoload.php';


$id        		=  $_POST['id'];
$nombres   		=  $_POST['nombres'];
$apellidos 		=  $_POST['apellidos'];
$dni       		=  $_POST['dni'];
$telefono   	=  $_POST['telefono'];
$direccion_1 	=  $_POST['direccion_1'];
$direccion_2 	=  $_POST['direccion_2'];
$correo     	=  $_POST['correo'];
$area       	=  $_POST['area'];


$mensaje  =  new Mensaje();
$socios  =  new Socio($nombres,$apellidos,$dni,$telefono,$direccion_1,$direccion_2,$correo,$area);
$valor    =  $socios->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>