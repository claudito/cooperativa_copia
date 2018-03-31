<?php 
class Concepto

{

protected $descripcion;
protected $costo;
protected $porcentaje;
protected $tipo;



function __construct($descripcion='',$costo='',$porcentaje='',$tipo='')
{
  $this->descripcion    =  $descripcion;
  $this->costo    		=  $costo;
  $this->porcentaje     =  $porcentaje;
  $this->tipo    		=  $tipo;
  

}

function agregar ()
{

	try {
		$modelo    = new Conexion();
	    $conexion  = $modelo->get_conexion();
	    $query     = "SELECT * FROM concepto WHERE descripcion=:descripcion";
	    $statement = $conexion->prepare($query);
	    $statement->bindParam(':descripcion',$this->descripcion);
	    $statement->execute();
	    $result   = $statement->fetchAll();
	    if (count($result)>0) 
	    {
	    return "existe";
	    } 
	    else 
	    {
	    $conexion   =  new Conexion();
		$db         =  $conexion->get_conexion();
		$query     =  "INSERT INTO concepto(descripcion,porcentaje,costo,tipo)
		 VALUES(:descripcion,:porcentaje,:costo,:tipo)";
		$statement    = $db->prepare($query);
		$statement->bindParam(':descripcion',$this->descripcion);
		$statement->bindParam(':costo',$this->costo);
		$statement->bindParam(':porcentaje',$this->porcentaje);
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
	$query     =  "DELETE FROM concepto WHERE id=:id";
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
	$query     =  "UPDATE  concepto SET descripcion=:descripcion,costo=:costo,porcentaje=:porcentaje,tipo=:tipo WHERE id=:id";
	$statement    = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':porcentaje',$this->porcentaje);
	$statement->bindParam(':costo',$this->costo);
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
$query      =  "SELECT  * FROM concepto WHERE id=:id";
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
$query      =  "SELECT  * FROM concepto";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}

}


 ?>