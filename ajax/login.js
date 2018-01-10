$(document).ready(function(){

$("#login").click(function(){	
usuario = $("#usuario").val();
pass    = $("#pass").val();
url     = $("#url").val();
$.ajax({
type: "POST",
url: "controlador/login.php",
data: "usuario="+usuario+"&pass="+pass,
success: function(html){    
if(html=='ok')    
{

window.location=""+url+"?ok";

}
else if (html =='uservacio')
{

$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese el Usuario',timer:2000,showConfirmButton: false})</script>");
$('#usuario').val("");
$('#usuario').focus();
$('#pass').val("");

}
else if (html =='passvacio')
{

$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese la Contraseña',timer:2000,showConfirmButton: false})</script>");
$('#pass').val("");
$('#pass').focus();

}
else if (html =='userpassvacio')
{

$("#mensaje").html("<script>swal({type:'warning',title:'Usuario y Contraseña Vacios',timer:2000,showConfirmButton: false})</script>");
$('#pass').val("");
$('#pass').focus();

}
else   
{

$("#mensaje").html("<script>swal({type:'error',title:'Usuario o Contraseña Incorrectos',timer:2000,showConfirmButton: false})</script>");
//$('#usuario').val("");
//$('#usuario').focus();
$('#pass').val("");

}
},
beforeSend:function()
{

$("#mensaje").html("Cargando...")
}
});
return false;
});
});