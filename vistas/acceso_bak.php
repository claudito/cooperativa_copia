<?php 

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Acceso');
$assets ->sweetalert();
$html   ->header();

?>
<!-- CSS  -->
<link href="assets/css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>


<div class="container">
<div class="card card-container">


<p id="profile-name" class="profile-name-card"></p>

<div id="mensaje"></div>
<center>
<img id="profile-img" class="profile-img-card" src="assets/img/cooperativa.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
</center>
<br>

<form   autocomplete="off" role="form" class="form-signin" autocomplete="off">

<input class="form-control" placeholder="Usuario" id="usuario" 
 name="usuario" type="text" value="" autofocus="" required>

<input class="form-control" placeholder="Contraseña" id="pass"
  name="pass" type="password" value=""    autocomplete="off" required>

<input type="hidden" id="url" value="<?php echo URL; ?>">


<input type="submit" id="login" class="btn btn-lg btn-success btn-block btn-signin" 
 value="Iniciar Sesión">

</form><!-- /form -->


</div><!-- /card-container -->
</div><!-- /container -->

<script src="ajax/login.js"></script>
<?php 

$html->footer('Cooperativa');

 ?>