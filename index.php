<?php 

include'autoload.php';

session_start();

#isset($nombre) : si existe.
#!isset($nombre) : no existe.

if (!isset($_SESSION[KEY.ID])) 
{
  include'vistas/acceso.php';
} 
else 
{


if ($_SESSION[KEY.TIPO]=='socio') 
{
	include'pages/estado-cuenta.php';
} 
else 
{
	include'vistas/home.php';
}




}



 ?>