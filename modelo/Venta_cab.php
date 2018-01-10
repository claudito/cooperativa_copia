<?php 
class Venta_cab
{

protected $serie;
protected $numero;
protected $codigo_socio_negocio;
protected $fecha_documento;
protected $tipo_documento;
protected $estado;





function __construct($serie='',$numero='',$codigo_socio_negocio='',$fecha_documento='',$tipo_documento='',$estado='')
{
  


  $this->serie                  =  $serie;
  $this->numero                 =  $numero;
  $this->codigo_socio_negocio   =  $codigo_socio_negocio;
  $this->fecha_documento        =  $fecha_documento;
  $this->tipo_documento         =  $tipo_documento;
  $this->estado                 =  $estado;

  

}

function agregar ()
{

	try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM venta_cab WHERE numero=:numero AND 
    codigo_socio_negocio=:codigo_socio_negocio AND tipo_documento=:tipo_documento";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':codigo_socio_negocio',$this->codigo_socio_negocio);
    $statement->bindParam(':tipo_documento',$this->tipo_documento);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO venta_cab(serie,numero,codigo_socio_negocio,fecha_documento,tipo_documento)VALUES(:serie,:numero,:codigo_socio_negocio,:fecha_documento,:tipo_documento)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':serie',$this->serie);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':codigo_socio_negocio',$this->codigo_socio_negocio);
    $statement->bindParam(':fecha_documento',$this->fecha_documento);
    $statement->bindParam(':tipo_documento',$this->tipo_documento);
    

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
 

 function eliminar_cab($id)
{

  $conexion   =  new Conexion();
  $db         =  $conexion->get_conexion();
  $query     =  "DELETE FROM venta_cab WHERE id=:id";
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
  $query     =  "DELETE FROM venta_det WHERE id_compra_cab=:id";
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
	$query     =  "UPDATE  venta_cab SET codigo_socio_negocio=:codigo_socio_negocio,fecha_documento=:fecha_documento,estado=:estado WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
  $statement->bindParam(':codigo_socio_negocio',$this->codigo_socio_negocio);
  $statement->bindParam(':fecha_documento',$this->fecha_documento);
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
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT v.id,s.razon_social as nombres,s.direccion1,s.ruc,v.codigo_socio_negocio,v.tipo_documento,v.fecha_documento,v.numero,v.serie FROM venta_cab AS v
 INNER JOIN socio_negocio as s ON s.codigo = v.codigo_socio_negocio WHERE v.id=:id ";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}

function lista()
{
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT v.id,v.estado,s.razon_social as nombres,s.direccion1,s.ruc,v.tipo_documento,v.fecha_documento,v.numero,v.serie FROM socio_negocio as s INNER JOIN venta_cab AS v ON s.codigo = v.codigo_socio_negocio ORDER BY v.tipo_documento";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}

function lista_nav()
{
try {
  
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT s.razon_social as nombres,s.direccion1,s.ruc,v.tipo_documento,v.fecha_documento,v.numero FROM socio_negocio as s INNER JOIN venta_cab AS v ON s.codigo = v.codigo_socio_negocio";
$statement  =  $db->prepare($query);

$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
  echo "Error:".$e->getMessage();
}

}



/*function lista_pdf($mes)
{
  
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  " SELECT v.numero as cantidades,d.numero,right(LEFT(t.fecha,7),2) as meses,v.ruc as ruc_cabecera,v.numero,v.fecha,v.tipo_documento,c.t_documento,c.ruc as ruc_cliente,c.razon_social,d.precio_unitario,d.cantidad,d.precio_unitario*d.cantidad as total ,t.venta FROM 
ventas_cab as v
INNER JOIN clientes as c on v.ruc = c.ruc
INNER JOIN ventas_det as d on v.numero = d.numero
INNER JOIN tipo_cambio as t on v.fecha = t.fecha  WHERE LEFT(v.fecha,7)=:mes group by c.razon_social";
$statement  =  $db->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
  

  echo "Error:".$e->getMessage();

}
}
*/
}


 ?>