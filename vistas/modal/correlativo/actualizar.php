<?php 
include'../../../autoload.php';

$id           =  $_GET['id'];
$correlativo  = new Correlativo();


//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label >CÓDIGO</label>
<input type="text" readonly name="codigo"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $correlativo->consulta($id,'codigo'); ?>" >
</div>
  
<div class="form-group">
<label >DESCRIPCIÓN</label>
<input type="text" readonly name="descripcion"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $correlativo->consulta($id,'descripcion'); ?>" >
</div>

<div class="form-group">
<label >NÚMERO</label>
<input type="number" name="numero"  class="form-control" min="0" value="<?php echo $correlativo->consulta($id,'numero'); ?>" >
</div>

<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/correlativo/actualizar.php",
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