<?php 
$ventas  =  new Venta_cab();
$mes  =  $_GET['mes'];

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>LISTA DE REGISTRO DE VENTAS</title>
  <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>


 <?php if (count($ventas->lista_pdf($mes))>0): 
$suma = 0;
$sub2 = 0;
$igv2 = 0;


 ?>




  <h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>

   <h3>RUC: 20210994735</h3>
   <h3>FORMATO 14.1 : REGISTRO DE VENTAS E INGRESOS
     <?php 
     //$mes = substr($_GET['mes'], 5,7); 
     $anio = substr($_GET['mes'], 0,4); 
     
     echo Funciones::get_month($mes);
     echo " DEL ";
     echo Funciones::get_year($anio);
     
    ?>

      </h3> 

 <h3>Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>



<h3>Cantidad de Registro : <?php echo count($ventas->lista_pdf($mes)) ?> </h3>

  <table width="100%" border="1">
    <thead>
  <tr>
    <th rowspan="3">N°</th>
    <th rowspan="3">FECHA DE EMISION DEL COMPROBANTE DE PAGO O DOCUMENTO</th>
    <th rowspan="3">FECHA DE VENCIMIENTO O PAGO</th>
    <th colspan="3">COMPROBANTE DE PAGO O DOCUMENTO</th>
    <th colspan="3" >INFORMACIÒN DEL CLIENTE</th>
     <th class="center" rowspan="3">VALOR FACTURADO DE LA EXPORTACIÓN</th>
      <th class="center" rowspan="3">BASE INPONIBLE DE LA OPERACIÓN GRAVADA</th>
    <th colspan="2">INPORTE TOTAL DE LA OPERACIÒN EXONERADA O INAFECTA</th>
     <th class="center" rowspan="3">ISC</th>
      <th class="center" rowspan="3">IGV Y/O IPM</th>
        <th class="center" rowspan="3">OTROS TRIBUTOS Y CARGOS QUE NO FORMAN PARTE DE LA BASE INPONIBLE</th>
      <th class="center" rowspan="3">IMPORTE TOTAL DEL COMPROVANTE DE PAGO</th>
      <th class="center" rowspan="3">TIPO DE CAMBIO</th>
      <th class="center" colspan="4" ="4">REFERENCIA DEL CONPROBANTE DE PAGO O DOCUMENTO ORIGINAL QUE SE MODIFICA</th>
  </tr>
    <tr>
      
     
      <th class="center" rowspan="2">TIPO (TABLA 10)</th>
      <th class="center" rowspan="2">N° SERIE O N° DE SERIE DE LA MAQUINA REGISTRADORA</th>
      <th class="center" rowspan="2">NÚMERO</th>
    
      <th class="center" colspan="2">DOCUMENTO DE IDENTIDAD</th>
     
      <th class="center" rowspan="2">APELLIDOS Y NOMBRES, DENOMINACIÓN O RAZON SOCIAL</th>
     
      
      <th class="center" rowspan="2">EXONERADA</th>
      <th class="center" rowspan="2">INAFECTA</th>
     

      
      <th class="center" rowspan="2">FECHA</th>
      <th class="center" rowspan="2">TIPO TABLA(10)</th>
      <th class="center" rowspan="2">SERIE</th>
      <th class="center" rowspan="2">N° DEL COMPROBANTE DE PAGO O DOCUMENTO</th>
      
    </tr>
    <tr>
        <th class="center">TIPO (TABLA 2)</th>
      <th class="center">NÚMERO</th>

    </tr>
  </thead>
    <tbody>
      <?php 
      foreach ($ventas->lista_pdf($mes) as $key => $value): ?>
<?php 
$precio = ($value['cantidad']*$value['precio_unitario']);
 $subtotal = round($precio-$precio/1.18,2);
 $igv  = round($precio-$subtotal,2) ;
 
 ?>

      <tr>
      
      <td class="center"><?php echo $item = $item+1; ?></td>
      <td class="center"><?php echo $value['fecha']; ?></td>
      <td> </td>
      <td class="center"><?php echo $value['tipo_documento']; ?></td>
      <td class="center"><?php echo '001'; ?></td>
      <td class="center"><?php echo $value['numero']; ?></td>
      <td class="center"><?php echo $value['t_documento']; ?></td>
      <td class="center"><?php echo $value['ruc_cliente']; ?></td>
      <td class="center"><?php echo $value['razon_social']; ?></td>
      <td> </td>
      <td class="center"><?php echo $igv;?></td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td class="center"><?php echo $subtotal; ?></td>
      <td></td>
      <td class="center"><?php echo $precio;?></td>
      <td class="center"><?php echo $value['venta']; ?></td>
     <td></td>
     <td></td>
      <td></td>
          <td></td>
        <?php 
      
        $suma =  $suma+$igv;
       
        $sub2= $sub2+$subtotal;
        $igv2=$igv2+$precio;
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
        <td class="center">TOTALES:</td>
        <td></td>
        <td class="center"><?php echo $suma; ?></td>
        <td> </td>
        <td> </td>
        <td></td>

        <td class="center"><?php echo $sub2; ?></td>
        <td></td>
        <td class="center"><?php echo $igv2; ?></td>
        <td></td>
        <td></td>
          <td></td>
        <td></td>
        <td></td>
      </tr>


    </tbody>
  </table>


 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros.</p> 

 <?php endif ?>
</body>
</html>