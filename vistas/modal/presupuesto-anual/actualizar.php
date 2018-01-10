<?php 
include'../../../autoload.php';

$id_producto        = $_GET['id_producto'];
$anio               = $_GET['anio'];
$carpeta            = "presupuesto-anual";
$presupuesto_anual  = new Presupuesto_anual($id_producto,$anio);


?>


<form id="actualizar" autocomplete="off">

<input type="hidden" value="<?php echo $id_producto; ?>" name="id_producto">
<input type="hidden" value="<?php echo $anio; ?>" name="anio">

  

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>ENERO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" 
 value="<?php echo round($presupuesto_anual->consulta('01','costo_soles'),2) ?>" required>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>FEBRERO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('02','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>MARZO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('03','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>ABRIL</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('04','costo_soles'),2) ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>MAYO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('05','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>JUNIO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('06','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>JULIO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('07','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>AGOSTO</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('08','costo_soles'),2) ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>SEPTIEMBRE</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('09','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>OCTUBRE</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('10','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>NOVIEMBRE</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('11','costo_soles'),2) ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>DICIEMBRE</label>
<input type="number" step="any" min="0.00" name="mes[]" id="" class="form-control" value="<?php echo round($presupuesto_anual->consulta('12','costo_soles'),2) ?>">
</div>
</div>
</div>





<button class="btn btn-primary">Actualizar</button>

</form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>