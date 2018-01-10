<?php 

class Plan_mov_det
{


protected $numero;
protected $fecha_gasto;
protected $motivo;
protected $destino;
protected $viaje;
protected $tipo;

function __construct($numero='',$fecha_gasto='',$motivo='',$destino='',$viaje='',$tipo='')
{
  
  $this->numero         =  $numero;
  $this->fecha_gasto    =  $fecha_gasto;
  $this->motivo    		=  $motivo;
  $this->destino    	=  $destino;
  $this->viaje    		=  $viaje;
  $this->tipo    		=  $tipo;
 
}

function agregar (){

  try {
  $conexion  =  Conexion::get_conexion();
  $query     =  "INSERT INTO plan_mov_det(numero,fecha_gasto,motivo,destino,viaje,tipo)
   VALUES(:numero,:fecha_gasto,:motivo,:destino,:viaje,:tipo)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':numero',$this->numero);
  $statement->bindParam(':fecha_gasto',$this->fecha_gasto);
  $statement->bindParam(':motivo',$this->motivo);
  $statement->bindParam(':destino',$this->destino);
  $statement->bindParam(':viaje',$this->viaje);
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

  } catch (Exception $e) {
    
  }

}

 
 function eliminar($id)
{
	$conexion  =  Conexion::get_conexion();
	$query     =  "DELETE FROM plan_mov_det WHERE id=:id";
	$statement    = $conexion->prepare($query);
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
	$query     =  "UPDATE  plan_mov_det SET fecha_gasto=:fecha_gasto,motivo=:motivo,destino=:destino,viaje=:viaje,tipo=:tipo WHERE id=:id";
	$statement    = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':fecha_gasto',$this->fecha_gasto);
	$statement->bindParam(':motivo',$this->motivo);
	$statement->bindParam(':destino',$this->destino);
	$statement->bindParam(':viaje',$this->viaje);
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


function consulta($numero,$campo)
{
	
try {
$conexion  =  Conexion::get_conexion();
$query      =  "SELECT  * FROM plan_mov_det WHERE numero=:numero";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':numero',$numero);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMenssage();

}

}

function lista($numero)
{
try {
	
$conexion  =  Conexion::get_conexion();
$query     =  "SELECT  * FROM plan_mov_det WHERE numero=:numero  ORDER BY fecha_gasto";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':numero',$numero);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


}


 ?>