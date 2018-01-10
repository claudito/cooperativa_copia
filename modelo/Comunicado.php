<?php 
class Comunicado{

protected $asunto;
protected $fecha;
protected $usuario;
protected $contenido;
protected $estado;

function __construct($asunto='',$fecha='',$usuario='',$contenido='',$estado='')
{
  
$this->asunto    		=  	$asunto;
$this->fecha 	        =	$fecha;
$this->usuario   		=  	$usuario;
$this->contenido    	=  	$contenido;
 $this->estado    	=  	$estado; 
}

function agregar ()
{

try {

$conexion  =  Conexion::get_conexion();
$query     =  "INSERT INTO comunicado(asunto,fecha,id_usuario,contenido)
VALUES(:asunto,:fecha,:usuario,:contenido)";
$statement    = $conexion->prepare($query);
$statement->bindParam(':asunto',$this->asunto);
$statement->bindParam(':fecha',$this->fecha);
$statement->bindParam(':usuario',$this->usuario);
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

catch (Exception $e) 
{
echo "ERROR: " . $e->getMessage();	
}

}
 

 function eliminar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM comunicado WHERE id=:id";
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
	$conexion  =  Conexion::get_conexion();
	$query     =  "UPDATE  comunicado SET fecha=:fecha,asunto=:asunto,contenido=:contenido,estado=:estado WHERE id=:id";
	$statement = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':asunto',$this->asunto);
    $statement->bindParam(':fecha',$this->fecha);
	$statement->bindParam(':contenido',$this->contenido);
	$statement->bindParam(':estado',$this->estado);
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
$query      =  "SELECT c.id,c.asunto,c.fecha,c.contenido,c.estado,u.nombres,u.apellidos
 FROM comunicado as c INNER JOIN usuarios as u ON c.id_usuario=u.id WHERE c.id=:id";
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
$query      =  "SELECT c.id,c.asunto,c.fecha,c.contenido,c.estado,u.nombres,u.apellidos
 FROM comunicado as c INNER JOIN usuarios as u ON c.id_usuario=u.id";
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