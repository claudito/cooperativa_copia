<?php 


class Presupuesto_anual
{

protected $id_producto;
protected $anio;
protected $mes;
protected $costo_soles;



function __construct($id_producto='',$anio='',$mes='',$costo_soles='')
{
	$this->id_producto 	= $id_producto;
	$this->anio 		    = $anio;
	$this->mes 			    = $mes;
	$this->costo_soles 	= $costo_soles;

}

function agregar()
{

try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM presupuesto_anual WHERE id_producto=:id_producto AND anio=:anio AND mes=:mes";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_producto',$this->id_producto);
    $statement->bindParam(':anio',$this->anio);
    $statement->bindParam(':mes',$this->mes);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO presupuesto_anual(id_producto,anio,mes,costo_soles)VALUES(:id_producto,:anio,:mes,:costo_soles)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_producto',$this->id_producto);
    $statement->bindParam(':anio',$this->anio);
    $statement->bindParam(':mes',$this->mes);
    $statement->bindParam(':costo_soles',$this->costo_soles);
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

function actualizar()
{

 try {
   
  $conexion     =  new Conexion();
  $db           =  $conexion->get_conexion();
  $query        =  "UPDATE  presupuesto_anual SET costo_soles=:costo_soles WHERE mes=:mes AND anio=:anio AND
        id_producto=:id_producto";
  $statement    = $db->prepare($query);
  $statement->bindParam(':mes',$this->mes);
  $statement->bindParam(':costo_soles',$this->costo_soles);
  $statement->bindParam(':anio',$this->anio);
  $statement->bindParam(':id_producto',$this->id_producto);
  
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

  echo "Error: ".$e->getMessage();
   
 }


  
}


function lista_mes()
{

try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM mes ORDER BY id";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} 

	catch (Exception $e) 
	{
		echo "Error:".$e->getMessage();
	}

}


function lista_anio()
{

try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM anio ORDER BY codigo";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} 

	catch (Exception $e) 
	{
		echo "Error:".$e->getMessage();
	}

}

function lista($anio)
{

try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  p.id,p.cuenta,p.descripcion,enero.costo_soles as enero,febrero.costo_soles as febrero,marzo.costo_soles as marzo, abril.costo_soles as abril, mayo.costo_soles as mayo, junio.costo_soles as junio, julio.costo_soles as julio, agosto.costo_soles as agosto, septiembre.costo_soles as septiembre, octubre.costo_soles as octubre, noviembre.costo_soles as noviembre, diciembre.costo_soles as diciembre FROM producto as p
INNER JOIN presupuesto_anual as enero ON p.id=enero.id_producto AND  enero.anio=:anio AND enero.mes='01'  
INNER JOIN presupuesto_anual as febrero ON p.id=febrero.id_producto AND  febrero.anio=:anio AND febrero.mes='02'
INNER JOIN presupuesto_anual as marzo ON p.id=marzo.id_producto AND  marzo.anio=:anio AND marzo.mes='03'
INNER JOIN presupuesto_anual as abril ON p.id=abril.id_producto AND  abril.anio=:anio AND abril.mes='04'
INNER JOIN presupuesto_anual as mayo ON p.id=mayo.id_producto AND  mayo.anio=:anio AND mayo.mes='05'
INNER JOIN presupuesto_anual as junio ON p.id=junio.id_producto AND  junio.anio=:anio AND junio.mes='06' 
INNER JOIN presupuesto_anual as julio ON p.id=julio.id_producto AND  julio.anio=:anio AND julio.mes='07'
INNER JOIN presupuesto_anual as agosto ON p.id=agosto.id_producto AND  agosto.anio=:anio AND agosto.mes='08'
INNER JOIN presupuesto_anual as septiembre ON p.id=septiembre.id_producto AND  septiembre.anio=:anio AND septiembre.mes='09'
INNER JOIN presupuesto_anual as octubre ON p.id=octubre.id_producto AND  octubre.anio=:anio AND octubre.mes='10'
INNER JOIN presupuesto_anual as noviembre ON p.id=noviembre.id_producto AND  noviembre.anio=:anio AND noviembre.mes='11'
INNER JOIN presupuesto_anual as diciembre ON p.id=diciembre.id_producto AND  diciembre.anio=:anio AND diciembre.mes='12'
ORDER BY p.descripcion";
$statement  =  $db->prepare($query);
$statement->bindParam(':anio',$anio);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} 

	catch (Exception $e) 
	{
		echo "Error:".$e->getMessage();
	}

}


function consulta($mes,$campo)
{
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT * FROM presupuesto_anual WHERE anio=:anio AND mes=:mes
  AND id_producto=:id_producto";
$statement  =  $db->prepare($query);
$statement->bindParam(':id_producto',$this->id_producto);
$statement->bindParam(':mes',$mes);
$statement->bindParam(':anio',$this->anio);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];

} catch (Exception $e) {
    

  echo "Error:".$e->getMessage();

}

}


}


?>