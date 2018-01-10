<?php 

include'../autoload.php';

$archivo  =  $_FILES['archivo'];

if ($archivo['size']<=MAX_FILE_SIZE) 
{

$funciones  =  new Funciones();

if ($funciones->tipo_archivo($archivo['type'])=='ok')
 {

$valor  = move_uploaded_file($archivo['tmp_name'],'../files/'.$archivo['name']); 

if ($valor) 
{
 echo "archivo subido";
}
else 
{
 echo "error";
}

} 
else 
{
  echo "Archivo no permitido";
}





    



} 
else 
{
	echo "archivo demasiado pesado";
}




 ?>