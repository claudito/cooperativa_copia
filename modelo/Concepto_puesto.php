<?php 
class Concepto_puesto
{

protected $concepto;
protected $puesto;


function __construct($concepto='',$puesto='')
{

	$this->concepto =  $concepto;
	$this->puesto   =  $puesto;

}


function agregar ()
{

	try {

	    $conexion  = Conexion::get_conexion();
	    $query     = "SELECT * FROM concepto_puesto WHERE id_concepto=:concepto AND codigo_puesto=:puesto";
	    $statement = $conexion->prepare($query);
	    $statement->bindParam(':concepto',$this->concepto);
	    $statement->bindParam(':puesto',$this->puesto);
	    $statement->execute();
	    $result   = $statement->fetchAll();
	    if (count($result)>0) 
	    {
	    return "existe";
	    } 
	    else 
	    {
		 
        
        $query     =  "INSERT INTO concepto_puesto(id_concepto,codigo_puesto)
		 VALUES(:concepto,:puesto)";
		$statement = $conexion->prepare($query);
		$statement->bindParam(':concepto',$this->concepto);
	    $statement->bindParam(':puesto',$this->puesto);
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
$conexion  =  Conexion::get_conexion();
$query     =  "DELETE FROM concepto_puesto WHERE id=:id";
$statement = $conexion->prepare($query);
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







function lista()
{
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT cp.id,c.descripcion concepto,p.codigo_puesto puesto,p.nombres,p.apellidos,p.tipo 
tipo_comerciante,
c.tipo tipo_concepto FROM concepto_puesto as cp 
INNER JOIN concepto as c ON cp.id_concepto=c.id
INNER JOIN 
(SELECT cp.codigo_puesto,c.nombres,c.apellidos,c.tipo FROM comerciante_puesto as cp 
INNER JOIN comerciante as c ON cp.id_comerciante=c.id)AS p ON 
cp.codigo_puesto=p.codigo_puesto";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function puesto()
{
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT cp.id,cp.id_concepto,cp.codigo_puesto,c.nombres,c.apellidos FROM concepto_puesto as cp
inner JOIN (SELECT id_comerciante,codigo_puesto,c.nombres,c.apellidos FROM comerciante_puesto as cp 
INNER JOIN comerciante as c  ON cp.id_comerciante=c.id)as c ON cp.codigo_puesto=c.codigo_puesto
GROUP BY cp.codigo_puesto;";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}




function concepto($puesto='')
{
try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT c.id,c.descripcion,c.tipo FROM concepto_puesto  as cp 
INNER JOIN concepto as c ON cp.id_concepto=c.id WHERE cp.codigo_puesto=:puesto";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}




}



 ?>