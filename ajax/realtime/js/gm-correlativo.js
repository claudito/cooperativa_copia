
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/gm-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
