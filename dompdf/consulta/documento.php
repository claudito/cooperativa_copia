
<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$requisc  =  new Egresos();

$id  =  $_GET['id'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>


		img{
			
			width: 100px;
			height: 100px;
			float: right;


		}

div{
	
	padding: 10px;
	background-color: #F4F6F7  ;
	width: 190px;
	height: 150px;
	float: left;
	
	
}
.contenedor{
	
	width: 1000px;
	height: 590px;
	background-color: #F4F6F7;
	
	

}
.centro{
	width: 500px;
	background-color: #F4F6F7  ;
	text-align-last: center;
	float: left;
	padding: 5px;
}
h2{
	color: green;

}
h3,h1,h4{
	color: green;
	margin: auto;

}

.base{
	margin: auto;
	width: 780px;
	height: 40px;
	padding: 70px;
	text-align-last: center;
}



label{
	color: green;
	text-align: justify;
	text-align-last: center;


}
.rojo{
	color: red;
}
.center
{
text-align: center;
}
.firmas
{
width:100%; 
text-align: left;  
border-collapse: collapse;
border: 1px solid #000;
padding-top: 5px;
padding-left: 40px;
}
.ventana{
	margin: auto;
	width: 780px;
	height: 50px;
	padding: 70px;
	text-align-last: left;
}
.left
{
text-align: left;
}
b{
	color: #17202A;
}

.right
{
text-align: right;   
}

table{
	margin: auto;
}
 .numero{
 	font-size: x-large
 }

	</style>

</head>
<body>
	<div class="contenedor">
<table>
	<tr>
		<td class="right"><img src="../../dompdf/img/cooperativa.jpg" alt=""></td>
		<td><div class="centro">
	<h3 align="center">COOPERATIVA DE SERVICIOS ESPECIALES</h3>
	<h4 align="center">MERCADO NUEVE DE FEBRERO DE <br>VENTANILLA ALTA - CALLAO <br>R.U.C 20210994735 <br>	

N° DE REGISTRO 21801044  <br> Domicilio Legal : Calle 13 Mz Q Lote 8 <br>
Telf.:5394586
	</h4>
	<h3 align="center">RECIBO DE EGRESO DE CAJA</h3>
	

</div></td>

		<td>
			<div>S/. <b class="numero"> <?php echo round($requisc->consulta($_GET['id'],'monto','EC'),2); ?></b>
<p></p>

<label for=""> <h2>Recibo</h2></label>
<label for=""><p><h2 class="rojo">N° <?php echo $requisc->consulta($_GET['id'],'numero','EC'); ?></h2></p></label>
</div>
		</td>



	</tr>

	<tr>
		
<td colspan="3">
	<div class="base">
	<h3>Recibi de la Cooperativa de Servicios Especiales Mercado "Nueve de Febrero " la suma de :
	..........................................(''<b><?php echo round($requisc->consulta($_GET['id'],'monto','EC'),2); ?></b>'')......................................................................................Nuevos Soles
	
	<br>Por Conceptos de :.............<b>("<?php echo $requisc->consulta($_GET['id'],'concepto','EC'); ?>")</b>.........................
	
	<br>
	</h3>
</div>

</td>

	</tr>
	<tr>
		<td colspan="3">
			<div class="ventana">
	<table width="100%">
		<tr class="firmas">
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3>GERENTE</h3></td>
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3>VIGILANCIA</h3></td>
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3>PRESIDENTE</h3></td>
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3>FIRMAS</h3></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr class="firmas">
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3></td>			
<td class="right" style="font-size: 14px; text-decoration: overline;"></td>
<td class="right" style="font-size: 14px; text-decoration: overline;"></td>
<td class="right" ><b><?php echo $requisc->consulta($_GET['id'],'personal','EC'); ?></b><h3 style="font-size: 14px; text-decoration: overline;">NOMBRES Y APELLIDOS</h3></td>
		</tr>
		<tr class="firmas">
<td class="right" style="font-size: 14px; text-decoration: overline;"><h3></td>			
<td class="right" style="font-size: 14px; text-decoration: overline;"></td>
<td class="right" style="font-size: 14px; text-decoration: overline;"></td>
<td class="right" ><b><?php echo $requisc->consulta($_GET['id'],'dni','EC'); ?></b><h3 style="font-size: 14px; text-decoration: overline;">DNI...... :</h3></td>
		</tr>
	
		<tr class="firmas">

<td colspan="4" class="right" style="font-size: 14px; "><h3>Ventanilla alta :<?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_registro','EC')),'d/m/Y') ?></h3></td>
		</tr>
	</table>
</div>

		</td>
	</tr>
</table>


	</div>
</body>
</html>