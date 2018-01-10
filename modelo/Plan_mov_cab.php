<?php 
class Plan_mov_cab
{

protected $numero;
protected $personal;
protected $fecha_emision;

function __construct($numero='',$personal='',$fecha_emision='')
{
  
  $this->numero         =  $numero;
  $this->personal       =  $personal;
  $this->fecha_emision  =  $fecha_emision;  

}

function agregar ()
{

	try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM plan_mov_cab WHERE numero=:numero";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO plan_mov_cab(numero,id_personal,fecha_emision)VALUES(:numero,:personal,:fecha_emision)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':personal',$this->personal);
    $statement->bindParam(':fecha_emision',$this->fecha_emision);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }

}
 

function eliminar_cab($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM plan_mov_cab WHERE numero=:numero";
$statement = $conexion->prepare($query);
$statement->bindParam(':numero',$numero);
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

function eliminar_det($numero)
{

$conexion   =  Conexion::get_conexion();
$query      =  "DELETE FROM plan_mov_det WHERE numero=:numero";
$statement  = $conexion->prepare($query);
$statement->bindParam(':numero',$numero);
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
	$query     =  "UPDATE  plan_mov_cab SET mes=:mes,trabajador=:trabajador,dni=:dni,cargo=:cargo,fecha_emision=:fecha_emision WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
  $statement->bindParam(':mes',$this->mes);
	$statement->bindParam(':trabajador',$this->trabajador);
  $statement->bindParam(':dni',$this->dni);
  $statement->bindParam(':cargo',$this->cargo);
  $statement->bindParam(':fecha_emision',$this->fecha_emision);
 
	
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


function consulta($numero,$campo)
{
	
try {
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT pm.id,pm.numero,p.nombres,p.apellidos,pm.fecha_emision,p.cargo,p.dni FROM plan_mov_cab as pm INNER JOIN personal as p 
ON pm.id_personal=p.id WHERE numero=:numero";
$statement  =  $db->prepare($query);
$statement->bindParam(':numero',$numero);
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
$query      =  "SELECT pm.id,pm.numero,p.nombres,p.apellidos,pm.fecha_emision FROM plan_mov_cab as pm INNER JOIN personal as p 
ON pm.id_personal=p.id";
$statement  =  $db->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



}


 ?>