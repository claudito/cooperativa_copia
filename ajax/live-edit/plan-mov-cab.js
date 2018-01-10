var carpeta     = "plan-mov-cab";
var carpeta_det = "plan-mov-det";

/*Función Listar tabla*/
function fetch_data(numero){
var parametros = {"numero":numero};
$("#loader_data").fadeIn('slow');
$.ajax({
 url:'../vistas/modal/'+carpeta+'/listar-detalle.php',
data: parametros,
beforeSend: function(objeto){
},
success:function(data){
$("#live_data").html(data).fadeIn('slow');
}
})
}


/*Función Agregar*/
$(document).on('click', '#btn_add', function(){ 
 var numero      = $('#numero').val(); 
 var fecha       = $('#fecha').val();
 var motivo      = $('#motivo').val();
 var destino     = $('#destino').val();
 var viaje       = $('#viaje').val();
 var tipo        =  $('select[id=tipo]').val();
if(fecha == '')  
{   
$('#mensaje_data').html('<div class="alert alert-warning">Seleccione la fecha de Gasto.</div>');
return false;  
}

if(motivo == '')  
{   
$('#mensaje_data').html('<div class="alert alert-warning">Seleccione el motivo de viaje.</div>');
return false;  
}

if(destino == '')  
{   
$('#mensaje_data').html('<div class="alert alert-warning">Seleccione el destino.</div>');
return false;  
}

if(viaje == '')  
{   
$('#mensaje_data').html('<div class="alert alert-warning">Seleccione el monto del viaje.</div>');
return false;  
}

if(tipo == '')  
{   
$('#mensaje_data').html('<div class="alert alert-warning">Seleccione el tipo.</div>');
return false;  
}

$.ajax({  
url:'../controlador/'+carpeta_det+'/agregar.php', 
method:"POST",  
data:{numero:numero,fecha:fecha,motivo:motivo,destino:destino,viaje:viaje,tipo:tipo},  
dataType:"text",  
success:function(data)  
{  
$('#mensaje_data').html(data);
fetch_data(numero);  
}  
})  
});  


 

/*Función Eliminar*/
 $(document).on('click', '.btn_delete', function(){  
           var id      = $(this).data("id3");
           var codigo  = $(this).data("codigo"); 
           var tipo    = $(this).data("tipo");
    
swal({
      title: "¿Estas seguro de eliminar el registro seleccionado?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Si",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
    url:'../controlador/'+carpeta+'/eliminar_concepto.php', 
    method:"POST",  
    data:{id:id,codigo:codigo,tipo:tipo},  
    dataType:"text"
      })
      .done(function(data) {

        if (data=='ok')
        {
         
    swal({
    title: "Buen Trabajo",
    text: "Registro Eliminado",
    type:"success",
    timer: 2000,
    showConfirmButton: false
    });
    //$('#mensaje_data').html(data);
    fetch_data(codigo,tipo); 

        }
        else
        {
        swal("Error", "Consulte al área de Soporte", "error");
        }



      })
      .error(function(data) {
        swal("Error", "Consulte al área de Soporte", "error");
      });
    });
  

      });  

