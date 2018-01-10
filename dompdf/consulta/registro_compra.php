<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$egresos  =  new Compra_cab();

$mes  =  $_GET['mes'];

 ?>

<link rel="stylesheet" href="../estilos/estilos.css">
<h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>


<h1 class="center">REGISTRO DE COMPRA</h1>

<h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>


 <?php if (count($egresos->lista_pdf($mes))>0): ?>


<?php  
 $suma = 0;
 $item = 0;


	?>

	
	<table width="100%" border="1">
		<thead>
			<tr>

				<th  class="center" rowspan="3">NUMERO CORRELATIVO DEL REGISTRO O CODIGO UNICO DE LA OPERACION</th>
				<th class="center" rowspan="3">FECHA_EMISION DEL COMPROBANTE DE PAGO O DOCUMENTO</th>
				<th class="center" rowspan="3">FECHA VENCIMINETO O FECHA DE PAGO</th>
				<th class="center" colspan="3" rowspan="2">COMPROBANTE DE PAGO O DOCUMENTO</th>
				<th class="center" rowspan="3">Nº DE COMPROBANTE DE PAGO, DOCUMENTO,Nº DEL ORDEN DEL FORMULARIO FISICO O VIRTUAL,Nº DE DUA ,DSI O LIQUIDACION DE COBRANZA U OTROS DOCUMENTOS EMITIDOS POR SUNAT PARA ACREDITAR EL CREDITO FISCAL EN LA IMPORTACION</th>
				<th colspan="3">IMFORMACION DEL PROVVEDOR</th>
				<th colspan="2">ADQUISICIONES GRATADAS DESTIMADAS T/O DE EXPORTACION</th>
				<th colspan="2">ADQUISICIONES GRATADAS DESTIMADAS T/O DE EXPORTACION TA NO GRATADAS</th>
				<th colspan="2">ADQUISICIONES GRATADAS DESTIMADAS  DE OPERACIONES NO GRATADAS</th>
				<th rowspan="3">VALOR DE LAS ADQUISICIONES NO GRAVADAS</th>
				<th rowspan="3">ISC</th>
				<th rowspan="3">OTROS TRIBUTOS CARGOS</th>
				<th rowspan="3">IMPORTE TOTAL</th>
				<th rowspan="3">Nº DE COMPROBANTE DE PAGO EMITIDO POR SUJETO NO DOMICILIARIO(2)</th>
				<th colspan="2">CONSTACIA DE DPOSITO DE DETRACCION (3)</th>
				<th rowspan="3">TIPO DE CAMBIO</th>
				<th colspan="4"> REFERENCIA DE COMPROBANTE DE PAGO O DOCUMENTO ORIGINAL QUE SE MODIFICA</th>
			</tr>
			<tr>
				<th colspan="2">DOCUMENTO DE IDENTIDAD</th>
				<th rowspan="2">APELLIDOS Y NOMBRES,DENOMINACION O RAZON SOCIAL</th>
				<th rowspan="2">BASE IMPONIBLE</th>
				<th rowspan="2">IGV</th>
				<th rowspan="2">BASE IMPONIBLE</th>
				<th rowspan="2">IGV</th>
				<th rowspan="2">BASE IMPONIBLE</th>
				<th rowspan="2">IGV</th>
				<th rowspan="2">NUMERO </th>
				<th rowspan="2">FECHA DE EMISION</th>
				<th rowspan="2">FECHA</th>
				<th rowspan="2">TIPO  TABLA(10)</th>
				<th rowspan="2">SERIE</th>
				<th rowspan="2">N° DEL COMPROBANTE DE PAGO O DOCUMENTO</th>
			</tr>
			
		<tr>
			<th class="center">TIPO</th>
			<th class="center">SERIE</th>
			<th class="center">ANIO DE EMISION DE LA DUA</th>
			<th class="center">TIPO TABLA(2)</th>
			<th class="center">NUMERO</th>

		
			
			
			


		</tr>
	</thead>
		<tbody>
	    <?php
	    foreach ($egresos->lista_pdf($mes) as $key => $value): ?>
	   
	    <?php 

	            $costo=($value['cantidad']*$value['precio_uni']);
                $sub=round($value['total']-$value['total']/1.18,2);
                $igv=round($value['total']-$sub,2); 

         ?>

	    <tr>
	    <td><?php echo $item = $item+1; ?></td>
	    <td class="center"><?php echo $value['fecha_documento']; ?></td>
	    <td class="center">-</td>	
	    <td class="center"><?php echo $value['tipo_documento']; ?></td>
	    
	    <td class="center"><?php echo $value['serie']; ?></td>
	    <td class="center">-</td>
	    <td class="center"><?php echo $value['numero']; ?></td>
	   <td class="center"><?php echo $value['comprobante']; ?></td>
	    <td class="center"><?php echo $value['ruc']; ?></td>
	    <td class="center"><?php echo $value['razon_social']; ?></td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	     <td class="center"><?php  echo $igv; ?></td>
	    <td class="center"><?php   echo $sub;?></td>
	   <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center"><?php   echo  round($value['total'],2);?></td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>
	    <td class="center">-</td>


	   <?php 
	    
        $suma =  $suma+$costo;
       
        $sub=round($suma/1.18,2);
        $igv=$suma-$sub;
	    ?>

	    </tr>
	    <?php endforeach ?>
	    <tr>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	
	    	<td class="center"><?php echo $sub; ?></td>
	    	<td class="center"><?php echo $igv; ?></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td class="center"><?php echo $suma; ?></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    </tr>

		</tbody>
	</table>

	
	
     
 
	
 <?php else: ?>
 <p class="center" >No Hay Registros.</p>	
 <?php endif ?><?php 

