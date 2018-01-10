<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];


 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-2">
<div class="form-group">
<label >CÓDIGO</label>
<input type="text" name="codigo"  class="form-control" onchange="Mayusculas(this)" value="N° <?php echo Puesto::consulta($id,'codigo'); ?>" readonly>
</div>   
</div>
<div class="col-md-4">
<div class="form-group">
<label >DESCRIPCIÓN</label>
<input type="text" name="descripcion"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Puesto::consulta($id,'descripcion'); ?>" >
</div>  
</div>
<div class="col-md-3">
<div class="form-group">
<label>ESTADO</label>
<select name="estado" class="form-control" required="">
<option value="<?php echo Puesto::consulta($id,'estado'); ?>"><?php echo strtoupper(Puesto::consulta($id,'estado')); ?></option>
<?php $estado = array('libre','socio','cooperativa'); ?>
<?php foreach ($estado as $key => $value): ?>
<?php if ($value!==Puesto::consulta($id,'estado')): ?>
<option value="<?php echo $value; ?>"><?php echo strtoupper($value); ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>TIPO</label>
<select name="tipo" class="form-control" required="">
<option value="<?php echo Puesto::consulta($id,'tipo'); ?>"><?php echo strtoupper(Puesto::consulta($id,'tipo')); ?></option>
<?php $tipo = array('exterior','interior','puesto'); ?>
<?php foreach ($tipo as $key => $value): ?>
<?php if ($value!==Puesto::consulta($id,'tipo')): ?>
<option value="<?php echo $value; ?>"><?php echo strtoupper($value); ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
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
          url: "../controlador/puesto/actualizar.php",
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