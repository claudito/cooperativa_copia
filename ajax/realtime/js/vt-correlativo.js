function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/vt-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );