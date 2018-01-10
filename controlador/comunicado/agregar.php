<?php 

include'../../autoload.php';
include'../../session.php';

$asunto 	      = Funciones::validar_xss($_POST['asunto']);
$fecha            = $_POST['fecha'];
$usuario 	      = $_SESSION[KEY.ID];
$contenido	      = Funciones::validar_xss($_POST['contenido']);

$comunicado  =  new Comunicado($asunto,$fecha,$usuario,$contenido);

$valor   =  $comunicado->agregar();

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
 Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

