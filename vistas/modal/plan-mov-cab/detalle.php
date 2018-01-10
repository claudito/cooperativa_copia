<?php 
include'../../../autoload.php';
include'../../../session.php';

$numero    =  $_GET['numero'];
$folder    =  "plan-mov-det";
 ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Agregar Detalle</h3>
	</div>
	<div class="panel-body">
	<form id="detalle">

<input type="hidden" name="numero" value="<?php echo $numero; ?>">
	
<div class="row">
<div class="col-md-5">
<div class="form-group">
<label>MOTIVO</label>
<input type="text" name="motivo"  class="form-control" required 
 onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-7">
<div class="form-group">
<label>DESTINO</label>
<input type="text" name="destino"  class="form-control" required 
 onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>FECHA DE GASTO</label>
<input type="date" name="fecha"  class="form-control" required>
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<label>COSTO</label>
<input type="number"  step="any" min="0.01" name="costo"  class="form-control" required>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>TIPO</label>
<select name="tipo"  class="form-control" required>
<option value="ida">IDA</option>
<option value="vuelta">VUELTA</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<div style="padding-bottom: 24px"></div>
<button class="btn btn-success"><i class="fa fa-plus"></i> Agregar</button>
</div>
</div>

</div>

</form>
	</div>
</div>
<script>
    $("#detalle").submit(function(e){
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
          $('#modal-detalle').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla();
          }
      });
  });
</script>


<?php if (count(Plan_mov_det::lista($numero))>0): ?>
<form id="actualizar" autocomplete="off">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Detalle</h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th width="13%">FECHA DE GASTO</th>
				<th width="30%">MOTIVO</th>
				<th width="30%">DESTINO</th>
				<th width="10%">COSTO</th>
				<th width="20%">TIPO</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach (Plan_mov_det::lista($numero) as $key => $value): ?>
		<tr>
		<input type="hidden" name="id[]" value="<?php echo $value['id']; ?>">
		<td><input type="date" name="fecha[]"  class="form-control" 
			value="<?php echo $value['fecha_gasto']; ?>" required></td>
		<td><input type="text" name="motivo[]"  class="form-control" 
			 value="<?php echo $value['motivo']; ?>" required onchange="Mayusculas(this)"></td>
		<td><input type="text" name="destino[]"  class="form-control" 
			 value="<?php echo $value['destino']; ?>" required onchange="Mayusculas(this)"></td>
		<td><input type="text" name="costo[]"  class="form-control" 
			 value="<?php echo round($value['viaje'],2); ?>" required></td>
		<td>
		<select name="tipo[]"  class="form-control" required>
		<?php if ($value['tipo']=='ida'): ?>
		<option value="ida">IDA</option>
		<option value="vuelta">VUELTA</option>	
		<?php else: ?>
		<option value="vuelta">VUELTA</option>
		<option value="ida">IDA</option>	
		<?php endif ?>
		</select>
		</td>
		<td><a  data-toggle="modal" data-target="#modal-delete-item" data-id="<?php echo $value['id'] ?>"  class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<button  type="submit"  class="btn btn-primary">Actualizar</button>
	</div>
</div>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $folder; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          }
      });
  });
</script>

<form id="delete-item">
<div class="modal fade" id="modal-delete-item">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Eliminar</h4>
			</div>
			<div class="modal-body">
			¿Estas seguro de eliminar el registro seleccionados?
			<input type="hidden" name="id" id="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-danger">Si</button>
			</div>
		</div>
	</div>
</div>

</form>
<script>
$('#modal-delete-item').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id') 
      var modal = $(this)
      modal.find('#id').val(id)

    })


$("#modal-delete-item").on('hidden.bs.modal', function () {
            //$("body").removeAttr("style");
            //$('.modal-backdrop').remove();
    });
 $("#modal-detalle").on('hidden.bs.modal', function () {
           $('.modal-backdrop').remove();
    });



$( "#delete-item" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $folder; ?>/eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
		$("#mensaje").html(datos);
		$('#modal-detalle').modal('hide');
		$('body').removeClass('modal-open');
		$("body").removeAttr("style");
		$('.modal-backdrop').remove();
          }
      });
      event.preventDefault();
    });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles</p>
<?php endif ?>
