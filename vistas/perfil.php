<?php 
include'../autoload.php';
session_start();
if (!isset($_SESSION[KEY.ID])) 
{
   echo "<script>
   alert('Inicie Sesión');
   window.location='".URL."';
   </script>";
}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mi Perfil</title>
</head>
<body>
	
<ul>
<li>Nombres: <?php echo $_SESSION[KEY.NOMBRES]; ?></li>
<li>Apellidos: <?php echo $_SESSION[KEY.APELLIDOS]; ?></li>
</ul>


</body>
</html>