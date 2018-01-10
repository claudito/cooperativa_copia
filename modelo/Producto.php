<?php 
class Producto

{

protected $cuenta;
protected $descripcion;
protected $familia;
protected $unidad;




function __construct($cuenta='',$descripcion='',$familia='',$unidad='')
{
  
  
  $this->cuenta        =  $cuenta;
  $this->descripcion   =  $descripcion;
  $this->familia       =  $familia;
  $this->unidad        =  $unidad;
 
  

}

function agregar (){

	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO producto(cuenta,descripcion,familia,unidad)
	 VALUES(:cuenta,:descripcion,:familia,:unidad)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':cuenta',$this->cuenta);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':familia',$this->familia);
	$statement->bindParam(':unidad',$this->unidad);

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
	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM producto WHERE id=:id";
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
	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE producto SET cuenta=:cuenta,descripcion=:descripcion,familia=:familia,unidad=:unidad
	 WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':cuenta',$this->cuenta);
	$statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':familia',$this->familia);
    $statement->bindParam(':unidad',$this->unidad);
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
$conexion =  new Conexion();
$db         =  $conexion->get_conexion();
$query    =  "SELECT p.id, p.cuenta, p.descripcion, u.id AS id_unidad, u.codigo AS codigo_unidad, u.descripcion AS unidad, f.id AS id_familia, f.codigo AS codigo_familia, f.descripcion AS familia
FROM producto AS p
LEFT JOIN unidad AS u ON p.unidad = u.codigo
LEFT JOIN familia AS f ON p.familia = f.codigo WHERE p.id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result   =  $statement->fetch();
return $result[$campo];
} catch (Exception $e) {
	echo "error: ".$e->getMessage();
}

}

function lista()
{
	
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT p.id, p.cuenta, p.descripcion, u.id AS id_unidad, u.codigo AS codigo_unidad, u.descripcion AS unidad, f.id AS id_familia, f.codigo AS codigo_familia, f.descripcion AS familia
FROM producto AS p
LEFT JOIN unidad AS u ON p.unidad = u.codigo
LEFT JOIN familia AS f ON p.familia = f.codigo ORDER BY p.id";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) 
{
	echo "Error:".$e->getMessage();
}

}





}


 ?>