<?php 

class Pago
{

protected $puesto;
protected $concepto;
protected $costo;
protected $pago;
protected $fecha;
protected $month;
protected $year;
protected $day;
protected $tipo;

function __construct($puesto='',$concepto='',$costo='',$pago=0,$fecha='',$month='',$year='',$day='',$tipo='')
{
    $this->puesto     = $puesto;
    $this->concepto   = $concepto;
    $this->costo      = $costo;
    $this->pago       = $pago;
    $this->fecha      = $fecha;
    $this->month      = $month;
    $this->year       = $year;
    $this->day        = $day;
    $this->tipo       = $tipo;
}

public function agregar()
{
   try {
    $conexion  = Conexion::get_conexion();
    $query     = "SELECT * FROM pago WHERE
     codigo_puesto=:puesto AND id_concepto=:concepto AND fecha=:fecha";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':puesto',$this->puesto);
    $statement->bindParam(':concepto',$this->concepto);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO pago(codigo_puesto,id_concepto,costo,fecha,month,year,tipo,day,fecha_pago,fecha_vencimiento)VALUES(:puesto,:concepto,:costo,:fecha,:month,:year,:tipo,:day,:fecha_pago,:fecha_vencimiento)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':puesto',$this->puesto);
    $statement->bindParam(':concepto',$this->concepto);
    $statement->bindParam(':costo',$this->costo);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':month',$this->month);
    $statement->bindParam(':year',$this->year);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':day',$this->day);
    $statement->bindParam(':fecha_pago',$this->fecha);
    $statement->bindParam(':fecha_vencimiento',$this->fecha);
    if($statement)
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



function lista($puesto='',$concepto='',$year='',$month='',$day='',$tipo='')
{

try {
$conexion  = Conexion::get_conexion();
if ($tipo=='diario') 
{

$query     = "
SELECT p.id,p.codigo_puesto,pt.descripcion puesto,c.descripcion concepto,
p.id_concepto,p.costo,p.pago,p.fecha,p.tipo,p.fecha_pago,p.fecha_vencimiento,
p.month,p.year,p.day,p.fecha_actualizacion FROM pago as p
INNER JOIN puesto as pt ON p.codigo_puesto=pt.codigo
INNER JOIN concepto as c ON p.id_concepto=c.id
WHERE year=:year AND month=:month AND  p.codigo_puesto=:puesto 
AND p.id_concepto=:concepto AND p.tipo=:tipo";
$statement = $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->bindParam(':concepto',$concepto);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':year',$year);
$statement->bindParam(':month',$month);
$statement->execute();
$result   = $statement->fetchAll();
return $result;

}
else 
{

$query     = "
SELECT p.id,p.codigo_puesto,pt.descripcion puesto,c.descripcion concepto,
p.id_concepto,p.costo,p.pago,p.fecha,p.tipo,p.fecha_pago,p.fecha_vencimiento,
p.month,p.year,p.day,p.fecha_actualizacion FROM pago as p
INNER JOIN puesto as pt ON p.codigo_puesto=pt.codigo
INNER JOIN concepto as c ON p.id_concepto=c.id
WHERE year=:year AND month=:month AND  p.codigo_puesto=:puesto 
AND p.id_concepto=:concepto AND p.tipo=:tipo AND p.fecha=:fecha ";
$statement = $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->bindParam(':concepto',$concepto);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':year',$year);
$statement->bindParam(':month',$month);
$fecha = $year.'-'.$month.'-'.$day;
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result   = $statement->fetchAll();
return $result;

}



} catch (Exception $e) {

echo "ERROR: " . $e->getMessage();

}


}



function consulta($id,$campo)
{

try {

$conexion   = Conexion::get_conexion();
$query      =  "SELECT * FROM pago WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result    = $statement->fetch();
return $result[$campo];

} catch (Exception $e) {

echo "ERROR: " . $e->getMessage();
    
}



}


function actualizar($id,$pago,$fecha)
{

try {

$conexion   = Conexion::get_conexion();
$query      =  "UPDATE pago SET pago=:pago,fecha_actualizacion=:fecha  WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':pago',$pago);
$statement->bindParam(':fecha',$fecha);
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

echo "ERROR: " . $e->getMessage();
    
}



}






}



 ?>