
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/cp-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
