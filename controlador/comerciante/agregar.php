<?php 

include'../../autoload.php';
include'../../session.php';

 $nombres        =  (isset($_POST['nombres'])) ? Funciones::validar_xss($_POST['nombres']) : '' ;
 $apellidos      =  (isset($_POST['apellidos'])) ? Funciones::validar_xss($_POST['apellidos']) : '' ;
 $dni            =  (isset($_POST['dni'])) ? Funciones::validar_xss($_POST['dni']) : '' ;
 $ruc            =  (isset($_POST['ruc'])) ? Funciones::validar_xss($_POST['ruc']) : '' ;
 $razon_social   =  (isset($_POST['razon_social'])) ? Funciones::validar_xss($_POST['razon_social']) : '' ;
 $direccion      =  (isset($_POST['direccion'])) ? Funciones::validar_xss($_POST['direccion']) : '' ;
 $telefono       =  (isset($_POST['telefono'])) ? Funciones::validar_xss($_POST['telefono']) : '' ;
 $celular        =  (isset($_POST['celular'])) ? Funciones::validar_xss($_POST['celular']) : '' ;
 $correo         =  (isset($_POST['correo'])) ? Funciones::validar_xss($_POST['correo']) : '' ;
 $area           =  (isset($_POST['area'])) ? Funciones::validar_xss($_POST['area']) : '' ;
 $fecha_ingreso  =  (isset($_POST['fecha_ingreso'])) ? Funciones::validar_xss($_POST['fecha_ingreso']) : '' ;
 $fecha_salida   =  '';
 $tipo           =  (isset($_POST['tipo'])) ? Funciones::validar_xss($_POST['tipo']) : '' ;


$comerciante    = new Comerciante($nombres,$apellidos,$dni,$ruc,$razon_social,$direccion,$telefono,$celular,$correo,$area,$fecha_ingreso,$fecha_salida,$tipo);

$valor   =  $comerciante->agregar();


if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

