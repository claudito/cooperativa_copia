<?php 

class Documento_interno
{

protected $descripcion;

function __construct($descripcion='')
{
  $this->descripcion    =  $descripcion;
}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO documento_interno(descripcion)
	 VALUES(:descripcion)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':descripcion',$this->descripcion);
	
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
	$query     =  "DELETE FROM documento_interno WHERE id=:id";
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
	$query     =  "UPDATE  documento_interno SET descripcion=:descripcion WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	
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
$query      =  "SELECT  * FROM documento_interno WHERE id=:id";
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
$query      =  "SELECT  * FROM documento_interno";
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