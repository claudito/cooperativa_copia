<?php 
class Egresos{


protected $monto;
protected $numero;
protected $concepto;
protected $id_personal;
protected $documento;
protected $fecha_registro;



function __construct($monto='',$numero='',$concepto='',$id_personal='',$documento='',$fecha_registro='')
{
  
  
  $this->monto            =  $monto;
  $this->numero       	  =  $numero;
  $this->concepto         =  $concepto;
  $this->id_personal      =  $id_personal;
  $this->documento      =  $documento;
  $this->fecha_registro   =  $fecha_registro;
  

}

function agregar ()
{

	try {
		$modelo    = new Conexion();
	    $conexion  = $modelo->get_conexion();
	    $query     = "SELECT * FROM egresos_caja WHERE numero=:numero";
	    $statement = $conexion->prepare($query);
	    $statement->bindParam(':numero',$this->numero);
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
		$query     =  "INSERT INTO egresos_caja(monto,numero,concepto,id_personal,id_documento,fecha_registro)
		 VALUES(:monto,:numero,:concepto,:id_personal,:documento,:fecha_registro)";
		$statement    = $db->prepare($query);
		$statement->bindParam(':monto',$this->monto);
		$statement->bindParam(':numero',$this->numero);
		$statement->bindParam(':concepto',$this->concepto);
		$statement->bindParam(':id_personal',$this->id_personal);
		$statement->bindParam(':documento',$this->documento);
		$statement->bindParam(':fecha_registro',$this->fecha_registro);
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
	$query     =  "DELETE FROM egresos_caja WHERE id=:id";
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

function actualizar ()
{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE  egresos_caja SET monto=:monto,concepto=:concepto,id_personal=:id_personal,id_documento=:documento,fecha_registro=:fecha_registro WHERE numero=:numero";
	$statement    = $db->prepare($query);
	$statement->bindParam(':numero',$this->numero);
	$statement->bindParam(':monto',$this->monto);
	$statement->bindParam(':concepto',$this->concepto);
	$statement->bindParam(':id_personal',$this->id_personal);
	$statement->bindParam(':documento',$this->documento);
	$statement->bindParam(':fecha_registro',$this->fecha_registro);

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
$query      =  "

SELECT e.id,e.monto, e.numero,e.monto_letras,e.concepto,e.fecha_registro, p.id as id_personal,d.descripcion as documento,concat(p.nombres,' ',p.apellidos) as personal,p.dni
FROM egresos_caja as e 
INNER JOIN personal as p ON e.id_personal = p.id
INNER JOIN documento_interno as d ON e.id_documento=d.id

  AND numero=:id";
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
$query      =  "
SELECT e.id,e.monto, e.numero,e.monto_letras,e.concepto,e.fecha_registro, p.id as id_personal,d.descripcion as documento,concat(p.nombres,' ',p.apellidos) as personal
FROM egresos_caja as e 
INNER JOIN personal as p ON e.id_personal = p.id
INNER JOIN documento_interno as d ON e.id_documento=d.id";
$statement  =  $db->prepare($query);

$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}

function lista_pdf($mes)
{
	
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT e.numero,e.monto,e.concepto,concat(p.nombres,' ',p.apellidos) as personal,e.fecha_registro
FROM egresos_caja as e 
INNER JOIN personal as p ON e.id_personal = p.id
WHERE LEFT(e.fecha_registro,7)=:mes";
$statement  =  $db->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}

function lista_sum($mes)
{
	
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT e.numero,sum(e.monto) as monto_total,e.concepto, p.personal,e.fecha_registro
FROM egresos_caja as e 
INNER JOIN personal as p ON e.id_personal = p.id
WHERE LEFT(e.fecha_registro,7)=:mes";
$statement  =  $db->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}

}


}

}
 ?>