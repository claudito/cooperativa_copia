<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$nombres    =  $_POST['nombres'];
$apellidos  =  $_POST['apellidos'];
$dni        =  $_POST['dni'];
$user       =  $_POST['user'];
$pass       =  $_POST['pass'];
$tipo       =  $_POST['tipo'];

$usuario = new Usuarios($nombres,$apellidos,$dni,$user,md5($pass),$tipo);

$valor   =  $usuario->agregar();


if ($valor=='ok') 
{
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

