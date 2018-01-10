<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$egresos  =  new Egresos();

$mes  =  $_GET['mes'];

 ?>

<link rel="stylesheet" href="../estilos/estilos.css">
<h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>


<h1 class="center">PLANILLA EGRESOS</h1>

<h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
	
</h3>


 <?php if (count($egresos->lista_pdf($mes))>0): ?>

<?php  
 $suma = 0;
     
	?>
	<table width="100%">
		<thead>

		<tr>

			<th class="center">RECIBO</th>
			<th class="center">MONTO</th>
		    <th class="center">CONCEPTO</th>
			<th class="center">PERSONAL</th>
			<th class="center">FECHA</th>
			
			
		</tr>
	</thead>
		<tbody>

	    <?php 

	   
	    foreach ($egresos->lista_pdf($mes) as $key => $value): ?>
	    <tr>
	    <td class="center"><?php echo $value['numero']; ?></td>
	    <td class="center"><?php echo $value['monto']; ?></td>
	    <td class="center"><?php echo $value['concepto']; ?></td>
	    <td class="center"><?php echo $value['personal']; ?></td>
	    <td class="center"><?php echo $value['fecha_registro']; ?></td>
	    
	   <?php 

        $suma =  $suma+$value['monto'];
       
	    ?>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>

<p>Valor del Monto Total: <?php echo $suma; ?></p>

 <?php else: ?>
 <p >No Hay Registros.</p>	
 <?php endif ?>