<?php 

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Iniciar Sesión');
$assets ->sweetalert();
$html   ->header();

?>

<link rel="stylesheet" href="<?php echo URL ?>/assets/css/login.css">

<div class="container-fluid">
	<script src="ajax/login.js"></script>



    <div class="container">
        <div class="card card-container">

        <div id="mensaje"></div>
      
            <img id="profile-img" class="profile-img-card" 
            src="<?php echo URL; ?>assets/img/login.png" />
            <p id="profile-name" class="profile-name-card">Cooperativa 9 de Febrero</p>
            <form class="form-signin" autocomplete="off">
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>

                <input type="password" id="pass" class="form-control" placeholder="Contraseña" required>

              
        <input type="hidden" id="url" value="<?php echo URL ?>">


                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin"   value="Ingresar" id="login">



            </form><!-- /form -->
          
        </div><!-- /card-container -->
    </div><!-- /container -->





<script src="ajax/login.js"></script>
<?php 

$html->footer('Cooperativa');

 ?>