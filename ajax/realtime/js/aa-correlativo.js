
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/aa-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
