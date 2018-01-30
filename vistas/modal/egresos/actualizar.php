<?php 
include'../../../autoload.php';

$id          =  $_GET['id'];
$egresos  = new Egresos();

?>

<?php if (count($egresos->consulta($id,'numero'))>0): ?>
<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">




<div class="row">
  <div class="col-md-6">
<div class="form-group">
<label >MONTO</label>
<input type="number" step="any"  name="monto"  class="form-control" value="<?php echo round($egresos->consulta($id,'monto'),2); ?>"  placeholder="0.00">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>DOCUMENTOS INTERNOS</label>
<select name="documento" id="" class="form-control">
<option value="<?php echo $egresos->consulta($id,'id_documento') ?>"><?php echo $egresos->consulta($id,'documento') ?></option>
<?php 
$area = new Documento_interno();
foreach ($area->lista() as $key => $value): ?>
<?php if ($egresos->consulta($id,'id')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
</div>
</div>

</div>


<div class="form-group">
<label >CONCEPTO</label>
<textarea name="concepto" id="" class="form-control"  rows="3" required=""><?php echo $egresos->consulta($id,'concepto') ?></textarea>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>RESPONSABLE</label>
<select name="personal" id="" class="form-control" required="">
<option value="<?php echo $egresos->consulta($id,'id_personal'); ?>"><?php echo $egresos->consulta($id,'personal'); ?></option>
<?php 
$personal = new Personal();
foreach ($personal->lista() as $key => $value): ?>
<?php if ($egresos->consulta($id,'id_personal')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'],' ',$value['apellidos']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE REGISTRO</label>
<input type="date" name="fecha_registro" id="" class="form-control" required="" value="<?php echo $egresos->consulta($id,'fecha_registro');?>">
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
          url: "../controlador/egresos/actualizar.php",
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



<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>
