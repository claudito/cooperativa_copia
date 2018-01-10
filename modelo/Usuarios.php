<?php 
class Usuarios

{

protected $nombres;
protected $apellidos;
protected $dni;
protected $user;
protected $pass;
protected $tipo;
function __construct($nombres='',$apellidos='',$dni='',$user='',$pass='',$tipo='')
{
  
  
  $this->nombres     =  $nombres;
  $this->apellidos   =  $apellidos;
  $this->dni         =  $dni;
  $this->user        =  $user;
  $this->pass        =  $pass;
  $this->tipo        =  $tipo;
  


}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO usuarios(nombres,apellidos,dni,user,pass,tipo)
	 VALUES(:nombres,:apellidos,:dni,:user,:pass,:tipo)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':user',$this->user);
	$statement->bindParam(':pass',$this->pass);
	$statement->bindParam(':tipo',$this->tipo);

	if ($statement) 
	{   
		$statement->execute();
		return "ok";
	} 
	else 
	{
		return "error";
	}

}
 

function eliminar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM usuarios WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	if ($statement) 
	{   
		$statement->execute();
		return "ok";
	} 
	else 
	{
		return "error";
	}
	
}

function actualizar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE  usuarios SET nombres=:nombres,apellidos=:apellidos, dni=:dni,tipo=:tipo  WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':tipo',$this->tipo);
	
	if ($statement) 
	{   
		$statement->execute();
		return "ok";
	} 
	else 
	{
		return "error";
	}
			
}


function consulta($id,$campo)
{
	
try {
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM usuarios WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMenssage();

}

}

function lista()
{
	
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM usuarios ORDER BY id";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}

}


 ?>