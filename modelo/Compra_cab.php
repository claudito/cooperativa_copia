<?php 
class Compra_cab{



protected $serie;
protected $numero;

protected $codigo_socio_negocio;
protected $fecha_documento;




function __construct($serie='',$numero='',$codigo_socio_negocio='',$fecha_documento='')
{
  
     
     
     
     $this->serie    =  $serie;
     $this->numero    =  $numero;
     $this->codigo_socio_negocio    =  $codigo_socio_negocio;
     $this->fecha_documento    =  $fecha_documento;
  

}

function agregar ()
{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO compra_cab(serie,numero,codigo_socio_negocio,fecha_documento)
	 VALUES(:serie,:numero,:codigo_socio_negocio,:fecha_documento)";
	$statement    = $db->prepare($query);
	
	

	$statement->bindParam(':serie',$this->serie);
	$statement->bindParam(':numero',$this->numero);
	$statement->bindParam(':codigo_socio_negocio',$this->codigo_socio_negocio);
	$statement->bindParam(':fecha_documento',$this->fecha_documento);
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
 

 function eliminar_cab($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM compra_cab WHERE id=:id";
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

 function eliminar_det($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM compra_det WHERE id_compra_cab=:id";
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
	$query     =  "UPDATE  compra_cab SET codigo_socio_negocio=:codigo_socio_negocio,serie=:serie,numero=:numero,fecha_documento=:fecha_documento WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':codigo_socio_negocio',$this->codigo_socio_negocio);
	
	
	$statement->bindParam(':serie',$this->serie);
	$statement->bindParam(':numero',$this->numero);
	
	$statement->bindParam(':fecha_documento',$this->fecha_documento);
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
$query      =  "SELECT  c.id,c.codigo_socio_negocio,c.fecha_documento,p.codigo,p.razon_social,p.direccion1,p.ruc,p.tipo,c.serie,c.numero  FROM
 compra_cab as c INNER JOIN socio_negocio as p ON c.codigo_socio_negocio=p.codigo  WHERE c.id=:id";
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
$query      =  "SELECT  c.id,c.codigo_socio_negocio,c.fecha_documento,p.codigo,p.razon_social,p.direccion1,p.ruc,p.tipo,c.serie,c.numero  FROM
 compra_cab as c INNER JOIN socio_negocio as p ON c.codigo_socio_negocio=p.codigo  ORDER BY c.id";
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
$query      =  "SELECT  c.id,c.fecha_documento,c.serie,c.numero,p.codigo,p.ruc,p.razon_social,d.cantidad,d.precio_uni,SUM(d.cantidad*d.precio_uni) as total FROM compra_cab as c
 INNER JOIN compra_det as d ON c.id=d.id_compra_cab 
 INNER JOIN socio_negocio as p ON c.codigo_socio_negocio=p.codigo  WHERE LEFT(fecha_documento,7)=:mes GROUP BY c.numero   ;";
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


 ?>