<?php 

$fecha          =  $_GET['fecha'];
$puesto         =  $_GET['codigo'];
$mes            = substr($fecha,5,2);
$year           = substr($fecha,0,4);
$mes_anterior   =  Funciones::mes_anterior($fecha.'-01');
$mes_anterior_f = substr($mes_anterior,0,7);

$costo = Reporte::estado_cuenta_anterior($mes_anterior,$puesto,'costo');
$pago  = Reporte::estado_cuenta_anterior($mes_anterior,$puesto,'pago');



 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estado de Cuenta</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body >

<br>

<center><img src="img/market.png" alt="" width="150"><br><br>
<label class="center" style="font-size: 20px;font-weight: bold">Estado de Cuenta: <?php echo Funciones::get_month($mes).' '.$year; ?></label><br>
<label class="center" style="font-size: 14px;">Coop. Servicio Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao Ltda.</label><br>
<label class="center" style="font-size: 14px;">RUC: 20210994735</label>
</center>

<table class="cabecera_2">
<tr>
<td>SOCIO / INQUILINO</td>
<td><?php echo Comerciante_puesto::consulta($puesto,'nombres').' '.Comerciante_puesto::consulta($puesto,'apellidos'); ?></td>
</tr>
<tr>
<td>CORREO</td>
<td><?php echo Comerciante_puesto::consulta($puesto,'correo') ?></td>
</tr>
<tr>
<td>TELEFÓNO - CELULAR</td>
<td><?php echo Comerciante_puesto::consulta($puesto,'telefono').'  '.Comerciante_puesto::consulta($puesto,'celular') ?></td>
</tr>
<tr>
<td>PUESTO</td>
<td>N° <?php echo Comerciante_puesto::consulta($puesto,'puesto') ?></td>
</tr>
<tr>
<td>FECHA DE EMISIÓN</td>
<td></td>
</tr>
</table>


<table class="cabecera">
<thead>
<tr>
<th class="cabecera-td  center">FECHA</th>
<th class="cabecera-td ">DESCRIPCIÓN</th>
<th class="cabecera-td center">POR PAGAR</th>
<th class="cabecera-td center">PAGADO</th>
</tr>
</thead>

<tbody>
<tr>
<td class="detalle-td center">
<?php echo date_format(date_create($mes_anterior_f),'m/Y'); ?>
</td>
<td class="detalle-td" style="padding-left: 20px">Saldo del Mes anterior a favor de la cooperativa
(Deuda del socio del mes anterior)
</td>
<td class="detalle-td center"><?php echo $costo; ?></td>
<td class="detalle-td center"><?php echo $pago; ?></td>
</tr>
</tbody>

<tbody>
<tr>
<td class="detalle center">
<?php echo date_format(date_create($fecha),'m/Y'); ?>
</td>
<td class="detalle" style="padding-left: 20px">
<?php foreach (Reporte::estado_cuenta_actual($fecha,$puesto) as $key => $value): ?>
<?php echo $value['concepto']."<br>"; ?>
<?php endforeach ?>
</td>
<td class="detalle center">
<?php $costo_data = 0; ?>
<?php foreach (Reporte::estado_cuenta_actual($fecha,$puesto) as $key => $value): ?>
<?php 
//costodata
$costo_data = $value['costo']+$costo_data;   
 ?>
<?php echo round($value['costo'],2)."<br>"; ?>
<?php endforeach ?>
</td>
<td class="detalle center">
<?php $pago_data = 0; ?>
<?php foreach (Reporte::estado_cuenta_actual($fecha,$puesto) as $key => $value): ?>
<?php 
//pagodata
$pago_data = $value['pago']+$pago_data;   
 ?>
<?php echo round($value['pago'],2)."<br>"; ?>
<?php endforeach ?>
</td>
</tr>
</tbody>
<tbody>
<tr>
<td class="detalle-td right" colspan="2">Total</td>
<td class="detalle-td center">S/. <?php  $costo_total = $costo_data+$costo;echo $costo_total; ?></td>
<td class="detalle-td center">S/. <?php  $pago_total = $pago_data+$pago;echo $pago_total; ?></td>
</tr>
</tbody>

<tbody>
<tr>
<td class="detalle-td right" colspan="3">Saldo de Mes</td>
<td class="detalle-td center" >S/. <?php echo $costo_total-$pago_total; ?></td>
</tr>
</tbody>

</table>

<div style="text-align: right;padding-top: 20px;font-size: 12px">Administración.</div>


</body>
</html>

