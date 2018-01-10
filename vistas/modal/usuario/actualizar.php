<?php 
include'../../../autoload.php';

$id        =  $_GET['id'];
$usuarios  = new Usuarios();
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
  
<div class="form-group">
<label >NOMBRES</label>
<input type="text" name="nombres"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $usuarios->consulta($id,'nombres'); ?>" >
</div>

<div class="form-group">
<label >APELLIDOS</label>
<input type="text" name="apellidos"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $usuarios->consulta($id,'apellidos'); ?>" >
</div>

<div class="form-group">
<label >DNI</label>
<input type="text" name="dni"  class="form-control" 
 value="<?php echo $usuarios->consulta($id,'dni'); ?>" maxlength="8">
</div>

<div class="form-group">
<label >USUARIO</label>
<input type="text" name="user"  class="form-control" 
 value="<?php echo $usuarios->consulta($id,'user'); ?>" readonly>
</div>

 <div class="form-group">
<label>TIPO</label><br>
<div class="form-group">
  <?php 

  switch ($usuarios->consulta($id,'tipo')) {
    case 'admin':
     echo '<label class="radio-inline">
          <input type="radio" name="tipo" value="admin" checked> ADMINISTRADOR
          </label>
          <label class="radio-inline">
          <input type="radio" name="tipo" value="user"> USUARIO
          </label>
          ';
 break;
 case 'user':
     echo '<label class="radio-inline">
          <input type="radio" name="tipo" value="admin"> ADMINISTRADOR
          </label>
          <label class="radio-inline">
          <input type="radio" name="tipo" value="user" checked> USUARIO
          </label>
          ';
    break;
    default:
echo "no existe";
      break;
  }

   ?>
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
          url: "../controlador/usuario/actualizar.php",
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