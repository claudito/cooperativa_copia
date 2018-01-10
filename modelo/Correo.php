<?php 
class Correo

{


protected $fecha;
protected $asunto;
protected $destinatario,
protected $contenido;



function __construct($fecha='',$asunto='',$destinatario='',$contenido='')
{
  
  
  $this->fecha    		=  $fecha;
  $this->asunto    		=  $asunto;
  $this->destinatario   =  $destinatario;
  $this->contenido    	=  $contenido;
  

}

function agregar ()

{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO correo(fecha,asunto,destinatario,contenido)VALUES(:fecha,:asunto,:destinatario,:contenido)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':fecha',$this->fecha);
	$statement->bindParam(':asunto',$this->asunto);
	$statement->bindParam(':destinatario',$this->destinatario);
	$statement->bindParam(':contenido',$this->contenido);
	
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
	$query     =  "DELETE FROM correo WHERE id=:id";
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
	$query     =  "UPDATE  correo SET fecha=:fecha,asunto=:asunto,destinatario=:destinatario,contenido=:contenido WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':fecha',$this->fecha);
	$statement->bindParam(':asunto',$this->asunto);
	$statement->bindParam(':destinatario',$this->destinatario);
	$statement->bindParam(':contenido',$this->contenido);
	
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
$query      =  "SELECT  * FROM correo WHERE id=:id";
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
$query      =  "SELECT  * FROM correo ORDER BY id";
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