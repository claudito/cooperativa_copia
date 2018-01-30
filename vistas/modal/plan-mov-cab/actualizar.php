<?php 

include'../../../autoload.php';

$numero   = $_GET['numero'];

$personal = Plan_mov_cab::consulta($numero,'personal') ;

 ?>
 <form id="actualizar">

<input type="hidden" name="numero" value="<?php echo $numero ?>">
 	
<div class="row">
<div class="col-md-6">
<label>PERSONAL</label>
<div class="form-group">
<select name="personal"  class="form-control" required>
<option value="<?php echo $numero; ?>"><?php echo Plan_mov_cab::consulta($numero,'nombres').' '.Plan_mov_cab::consulta($numero,'apellidos') ?></option>
<?php foreach (Personal::lista() as $key => $value): ?>
<?php if ($value['id']!==$personal): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'].' '.$value['apellidos'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha_emision"  class="form-control" required 
value="<?php  echo Plan_mov_cab::consulta($numero,'fecha_emision'); ?>">
</div>
</div>      
</div>

<div class="form-group">

<button class="btn btn-primary">Actualizar</button>
</div>


 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/plan-mov-cab/actualizar.php",
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
          loadTabla();
          }
      });
  });
</script>