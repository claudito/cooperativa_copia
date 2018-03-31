<?php 

$fecha    =  $_GET['fecha'];
$tipo     =  $_GET['tipo'];
$fecha_f  =  date_format(date_create($fecha),'d-m-Y');//fecha formateada
$fecha_a  =  Funciones::dia_anterior($fecha);
$fecha_af =  date_format(date_create($fecha_a),'d-m-Y');//fecha formateada


if($tipo=='socio')
{
$data     =  Reporte::cobranza_diaria_socio($fecha);
}
else
{
$data     =  Reporte::cobranza_diaria_inquilino($fecha);
}



 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cobranza Diaria</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body >

<br>

<center><img src="img/market.png" alt="" width="150"><br><br>
<label class="center" style="font-size: 20px;font-weight: bold">Cobranza Diaria Por <?php echo ucwords($tipo); ?>: <?php echo $fecha_f; ?></label><br>
<label class="center" style="font-size: 14px;">Coop. Servicio Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao Ltda.</label><br>
<label class="center" style="font-size: 14px;">RUC: 20210994735</label>
</center>
<label style="padding-left: 40px;font-size: 14px">Fecha de Emisión: <?php echo $fecha_af; ?></label>

<table class="cabecera">
<thead>
<tr>
<th class="cabecera-td left"><?php echo strtoupper($tipo); ?></th>
<th class="cabecera-td center">GUARDIANIA Y LIMPIEZA</th>
<th class="cabecera-td center">ADMINISTRACIÓN</th>
<th class="cabecera-td center">APORTACIONES</th>
<th class="cabecera-td center">VIGILANCIA</th>
<th class="cabecera-td center">ARBITRIOS</th>
<th class="cabecera-td center">TOTAL</th>
</tr>
</thead>
<tbody>
<?php

$_1    = 0 ;
$_2    = 0 ;
$_3    = 0 ;
$_6    = 0 ;
$_7    = 0 ;
$t     = 0;
 foreach ($data as $key => $value): ?>
<tr>
<td class="detalle-td left"><?php echo $value['SOCIO'] ?></td>
<td class="detalle-td center"><?php echo round($value['1'],2) ?></td>
<td class="detalle-td center"><?php echo round($value['2'],2) ?></td>
<td class="detalle-td center"><?php echo round($value['3'],2) ?></td>
<td class="detalle-td center"><?php echo round($value['6'],2) ?></td>
<td class="detalle-td center"><?php echo round($value['7'],2) ?></td>
<td class="detalle-td center"><?php $total = $value['1']+$value['2']+$value['3']+$value['6']+$value['7']; echo $total; ?></td>
</tr>
<?php 

//totales:
$_1 = $value['1']+$_1;
$_2 = $value['2']+$_2;
$_3 = $value['3']+$_3;
$_6 = $value['6']+$_6;
$_7 = $value['7']+$_7;
$t  = $total+$t;

 ?>
<?php endforeach ?>

</tbody>
<tbody>
<tr>
<td class="detalle-td center" style="font-weight: bold">Total</td>
<td class="detalle-td center"><?php echo $_1; ?></td>
<td class="detalle-td center"><?php echo $_2; ?></td>
<td class="detalle-td center"><?php echo $_3; ?></td>
<td class="detalle-td center"><?php echo $_6; ?></td>
<td class="detalle-td center"><?php echo $_7; ?></td>
<td class="detalle-td center"><?php echo $t; ?></td>
</tr>
</tbody>
</table>


<footer>
<div id="piedepagina">
<table style="width: 100%;padding-left: 40px;padding-right: 40px">
<tr>
<td style="text-align: center;">______________________________________</td>
<td style="text-align: center;">______________________________________</td>
</tr>
<tr>
<td style="text-align: center;">Secretaria</td>
<td style="text-align: center">Gerente General </td>
</tr>
</table>
</div>
</footer>

</body>
</html>

