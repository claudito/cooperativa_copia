
<?php 

include'../../autoload.php';


$id        =  $_POST['id'];
$nombres   =  $_POST['nombres'];
$apellidos =  $_POST['apellidos'];
$tipo      =  $_POST['tipo'];
$dni       =  $_POST['dni'];


$mensaje  =  new Mensaje();
$usuarios =  new Usuarios($nombres,$apellidos,$dni,'?','?',$tipo);
$valor    =  $usuarios->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>
