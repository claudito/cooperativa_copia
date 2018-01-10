<?php 
class Puesto
{


protected $codigo;
protected $descripcion;
protected $estado;
protected $tipo;



function __construct($codigo='',$descripcion='',$estado='',$tipo='')
{
  
  $this->codigo    		=  $codigo;
  $this->descripcion    =  $descripcion;
  $this->estado         =  $estado;
  $this->tipo           =  $tipo;

  

}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query      =  "SELECT * FROM puesto WHERE codigo=:codigo";
	$statement  = $db->prepare($query);
	$statement->bindParam(':codigo',$this->codigo);
	$statement->execute();
	$result     = $statement->fetchAll();
	if (count($result)>0)
	{
		return "existe";
	} 
	else
	{

	$query     =  "INSERT INTO puesto(codigo,descripcion,tipo,estado)
	 VALUES(:codigo,:descripcion,:tipo,:estado)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':codigo',$this->codigo);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':tipo',$this->tipo);
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
	

}
 

 function eliminar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM puesto WHERE id=:id";
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
	$query     =  "UPDATE  puesto SET descripcion=:descripcion,estado=:estado,
	tipo=:tipo WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':tipo',$this->tipo);
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
$query      =  "SELECT  * FROM puesto WHERE id=:id";
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
$query      =  "SELECT  * FROM puesto ORDER BY codigo";
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