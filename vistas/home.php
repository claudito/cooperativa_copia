<?php 

$assets  =  new Assets();
$html    =  new Html();
$mensaje =  new Mensaje();
$assets ->principal('Bienvenidos');
$assets->sweetalert();
$html   ->header();

if (isset($_GET['ok'])) 
{

$mensaje->sweetalert('Bienvenido','success',$_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS],2);
}

?>

<div class="row">
	
<div class="col-md-12">
<?php include'vistas/nav.php'; ?>
</div>	

</div>


<div class="row">
<div class="col-md-12">
<div class="jumbotron">
<div class="row">
<div class="col-md-3">
<img src="assets/img/market.png" alt="" class="img-responsive">
</div>
<div class="col-md-9">
<div class="container">
<h1>Cooperativa 9 de Febrero</h1>
<p>Aplicación Web Gestión de Cobranza Diaria</p>
<p>
<a class="btn btn-primary btn-lg"  data-toggle="modal" href='#modal-info'>Conoce más del sistema. <i class="fa fa-laptop"></i></a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>




<?php 

$html->footer('Cooperativa');

 ?>

 <div class="modal fade" id="modal-info">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 				<h4 class="modal-title">Conoce más del Sistema</h4>
 			</div>
 			<div class="modal-body">
 			<p>
 				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore facilis ipsum dicta obcaecati repellendus. Culpa non, earum ipsa cupiditate, sequi nesciunt molestias, eaque accusamus ipsum assumenda optio perferendis temporibus! Eius!</span>
 				<span>Labore quibusdam eum eveniet adipisci explicabo aliquid rem delectus, itaque, quae pariatur veniam quo! Fuga id laboriosam aut, repellat est repellendus commodi nihil dolores, enim iure sunt quaerat laudantium delectus?</span>
 				<span>Placeat nisi nam beatae. Magnam eveniet vero explicabo enim incidunt minima odio, necessitatibus autem reiciendis nam voluptate, magni facilis assumenda placeat est, perspiciatis nisi vel. Quisquam eligendi est vel beatae.</span>
 				<span>Consequatur itaque id animi rem iusto atque fuga ducimus voluptatum voluptates minus. Vel quae eos iure praesentium accusamus laborum! Voluptatem cumque a ab, sit facere veritatis alias, voluptates error. Iure!</span>
 			</p>
 			</div>
 		</div>
 	</div>
 </div>