<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$unidad  = new Socio_negocio();

//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
  

<div class="form-group">
<label >CODIGO</label>
<input type="text" readonly  name="codigo" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'codigo'); ?>" >
</div>

<div class="form-group">
<label >RUC</label>
<input type="number" maxlength="11" name="ruc"  class="form-control"  value="<?php echo $unidad->consulta($id,'ruc') ; ?>" >
</div>

<div class="form-group">
<label >RAZÓN_SOCIAL</label>
<input type="text" name="razon_social" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'razon_social'); ?>" >
</div>

<div class="form-group">
<label >CONTACTO</label>
<input type="text" name="contacto" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'contacto'); ?>" >
</div>

<div class="form-group">
<label >DIRECCIÓN 1</label>
<input type="text" name="direccion1" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'direccion1'); ?>" >
</div>

<div class="form-group">
<label >DIRECCIÓN2</label>
<input type="text" name="direccion2" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'direccion2'); ?>" >
</div>

<div class="form-group">
<label >TELEFONO 1</label>
<input type="text"  name="telefono1" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'telefono1'); ?>" >
</div>

<div class="form-group">
<label >TELEFONO 2</label>
<input type="text"  name="telefono2" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'telefono2'); ?>" >
</div>

<div class="form-group">
<label >CUENTA BANCARIA</label>
<input type="text"  name="cuenta_bancaria" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'cuenta_bancaria'); ?>" >
</div>

<div class="form-group">
<label >COMENTARIO</label>
<input type="text"  name="comentario" class="form-control" onchange="Mayusculas(this)" value="<?php echo $unidad->consulta($id,'comentario'); ?>" >
</div>

<div class="form-group">
<label>TIPO</label>
<select name="tipo" id="" class="form-control">
<?php if (Socio_negocio::consulta($id,'tipo')==1): ?>
<option value="C">CLIENTE</option>
<option value="P">PROVEEDOR</option> 
<?php else: ?>
<option value="P">PROVEEDOR</option>  
<option value="C">CLIENTE</option>

<?php endif ?>
</select>
</div>




<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/socio_negocio/actualizar.php",
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