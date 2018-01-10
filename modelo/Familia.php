<?php 
class Familia{


protected $codigo;
protected $descripcion;


function __construct($codigo='',$descripcion='')
{
  
  
  $this->codigo    =  $codigo;
  $this->descripcion  =  $descripcion;

  

}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO familia(codigo,descripcion)
	 VALUES(:codigo,:descripcion)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':codigo',$this->codigo);
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
	$query     =  "DELETE FROM familia WHERE id=:id";
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

function actualizar ($id)
{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE  familia SET codigo=:codigo,descripcion=:descripcion WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':codigo',$this->codigo);
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
$query      =  "SELECT  * FROM familia WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}


function lista()
{
	
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM familia";
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