<?php 

#fecha
date_default_timezone_set('America/Lima');

#URL Local
define("URL","http://192.168.1.15/dev/cooperativa/");

#Configuración Remota
#define("URL","http://cooperativa.perutec.com.pe/");

#Datos de Conexion al servidor
define("SERVERBD", "localhost");
define("USERBD", "root");
define("PASSBD", "perutec");
#define("PASSBD", "userperutecdb");
define("BD", "cooperativa_bd");

#Variables de Sesión
define("KEY", date('d-m-Y').'cooperativa');
define("ID","id");
define("NOMBRES","nombres");
define("APELLIDOS","apellidos");
define("TIPO", "tipo");
define("ANIO_PA", "anio_pa");

#Configuración
define("IGV", "18");


 ?>