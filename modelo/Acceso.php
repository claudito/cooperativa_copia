<?php 

class Acceso
{

protected $user;
protected $pass;


function __construct($user='',$pass='')
{
   
   $this->user  = addslashes($user);
   $this->pass  = addslashes($pass);

}


function login()
{ 

try {
	
 $conexion =  new Conexion();
 $db       =  $conexion->get_conexion();
 $query    =  "SELECT  * FROM usuarios  WHERE user=:user AND 
              pass=:pass";
 $statement = $db->prepare($query);
 $statement->bindParam(':user',$this->user);
 $statement->bindParam(':pass',$this->pass);
 $statement->execute();
 $result   = $statement->fetchAll();
	if (count($result)>0) 
	{
	    $statement->execute();
	    $dato  =  $statement->fetch();
		session_start();
		$_SESSION[KEY.ID]        = $dato['id'];
		$_SESSION[KEY.NOMBRES]   = $dato['nombres'];
		$_SESSION[KEY.APELLIDOS] = $dato['apellidos'];
		$_SESSION[KEY.TIPO]		 = $dato['tipo'];


		return "ok";
	} 
	else
	{
	    return "error";
	}





} catch (Exception $e) {
	
  echo "Error:".$e->getMessage();

}
 

}

function logout()
{
  
session_start();

if (isset($_SESSION[KEY.ID])) 
{
	unset($_SESSION[KEY.ID]);
	unset($_SESSION[KEY.NOMBRES]);
	unset($_SESSION[KEY.APELLIDOS]);
	unset($_SESSION['puesto']);   
    unset($_SESSION['concepto']);  
    unset($_SESSION['month']);     
    unset($_SESSION['year']);      
    unset($_SESSION['day']);       
    unset($_SESSION['tipo']);     

	echo "<script>
	alert('Adios');
    window.location='".URL."';
	</script>";
} 
else 
{
	echo "<script>
	alert('No ha iniciado Sesión');
    window.location='".URL."';
	</script>";
}
  
  

	
}




}


 ?>