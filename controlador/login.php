<?php 

include'../autoload.php';


$user  = trim($_POST['usuario']);
$pass  = trim($_POST['pass']);


if (strlen($user)==0 AND strlen($pass)==0) 
{
   echo "userpassvacio";
} 
else if (strlen($user)==0)
{
   echo "uservacio";
}
else if (strlen($pass)==0)
{
   echo "passvacio";
}
else 
{
    
$acceso  = new Acceso($user,md5($pass));

echo $acceso->login();


}








 ?>