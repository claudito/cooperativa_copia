<?php 


session_start();

if(!isset($_SESSION[KEY.ID]))
{
  header('Location: '.URL.'');
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado


 ?>