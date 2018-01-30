<?php 
include'../../../autoload.php';
$folder  =  "comerciante_puesto";

 ?>

<form id="agregar" autocomplete="off">

<div class="modal fade" id="modal-agregar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Agregar</h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>COMERCIANTE</label>
<select name="comerciante"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php foreach (Comerciante_puesto::comerciante() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'].' '.$value['apellidos'] ?></option>	
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>PUESTO</label>
<select name="puesto"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php foreach (Comerciante_puesto::puesto() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>">N° <?php echo $value['codigo'].' - '.$value['estado'].' - '.$value['tipo'] ?></option>	
<?php endforeach ?>
</select>
</div>
</div>
</div>



</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Agregar</button>
</div>
</div>
</div>
</div>





</form>

 <script>
    $("#agregar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $folder; ?>/agregar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-agregar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla();
          loadModalAgregar()
          }
      });
  });
</script>