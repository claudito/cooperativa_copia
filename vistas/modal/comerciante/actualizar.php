<?php 
include'../../../autoload.php';

$id      =  $_GET['id'];
$folder  =  "comerciante";
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" class="form-control" onchange="Mayusculas(this)" required="" value="<?php echo Comerciante::consulta($id,'nombres'); ?>">
</div>  
</div>
<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" class="form-control" onchange="Mayusculas(this)" required=""  value="<?php echo Comerciante::consulta($id,'apellidos'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni"  class="form-control" maxlength="8" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'dni'); ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc"  class="form-control" maxlength="11" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'ruc'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social"  class="form-control" maxlength="200" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'razon_social'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN</label>
<input type="text" name="direccion"  class="form-control" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'direccion'); ?>">
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono"  class="form-control" maxlength="7" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'telefono'); ?>">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular"  class="form-control" maxlength="9" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'celular'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo"  class="form-control"  value="<?php echo Comerciante::consulta($id,'correo'); ?>">
</div>
</div>
</div>

<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>ÁREA</label>
<select name="area" class="form-control" >
<?php $area = Comerciante::consulta($id,'id_area');  ?>
<option value="<?php echo $area ?>"><?php echo Comerciante::consulta($id,'area') ?></option>
<?php foreach (Area::lista() as $key => $value): ?>
<?php if ($value['id']!==$area): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>FECHA DE INGRESO</label>
<input type="date" name="fecha_ingreso"  class="form-control" onchange="Mayusculas(this)"  value="<?php echo Comerciante::consulta($id,'fecha_ingreso'); ?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>TIPO</label>
<select name="tipo" class="form-control" >
<?php if (Comerciante::consulta($id,'tipo')=='socio'): ?>
<option value="socio">SOCIO</option>
<option value="inquilino">INQUILINO</option>
<?php else: ?>
<option value="inquilino">INQUILINO</option>
<option value="socio">SOCIO</option> 
<?php endif ?>
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
          url: "../controlador/<?php echo $folder; ?>/actualizar.php",
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