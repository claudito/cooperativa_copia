<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" class="form-control" onchange="Mayusculas(this)" required="" value="<?php echo Personal::consulta($id,'nombres') ; ?>">
</div>  
</div>
<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id="" class="form-control" onchange="Mayusculas(this)" required="" value="<?php echo Personal::consulta($id,'apellidos') ; ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label >DNI</label>
<input type="text" name="dni"  class="form-control" maxlength="8" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'dni') ; ?>" >
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label >RUC</label>
<input type="text" name="ruc"  class="form-control" maxlength="11" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'ruc') ; ?>" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" id="" required="" class="form-control" maxlength="200" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'razon_social') ; ?>">
</div>
</div>
</div>

<div class="form-group">
<label >DIRECCION</label>
<input type="text" name="direccion"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'direccion') ; ?>" >
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >TELEFONO</label>
<input type="text" name="telefono"  class="form-control" maxlength="7" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'telefono') ; ?>" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label >CELULAR</label>
<input type="text" name="celular"  class="form-control" maxlength="9" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'celular') ; ?>" >
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >CORREO</label>
<input type="text" name="correo"  class="form-control" value="<?php echo Personal::consulta($id,'correo') ; ?>" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label >CARGO</label>
<input type="text" name="cargo"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Personal::consulta($id,'cargo') ; ?>" >
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
          url: "../controlador/personal/actualizar.php",
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