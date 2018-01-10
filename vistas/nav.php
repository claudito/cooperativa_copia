<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>"><i class="fa fa-home"></i>  Inicio</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
    
       
<?php 
$menu  =  new Menu();
foreach ($menu->lista_nav() as $key_menu => $value_menu): ?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $value_menu['descripcion'] ?> <span class="caret"></span></a>
<ul class="dropdown-menu">
<?php
$submenu   =  new SubMenu();
foreach ($submenu->lista_nav($value_menu['id']) as $key => $value_submenu): ?>
<?php 
$permiso_submenu = new Permiso_submenu($value_submenu['id'],$_SESSION[KEY.ID]);
if ($permiso_submenu->permiso_nav('estado')==1): ?>
<li><a href="<?php echo URL.$value_submenu['ruta'] ?>"><?php echo $value_submenu['submenu']; ?></a></li> 
<?php else: ?>
<li class="disabled"><a href="#"><?php echo $value_submenu['submenu']; ?></a></li>
<?php endif ?>
<?php endforeach ?>
</ul>

</li>
<?php endforeach ?>




      </ul>
     
   
      <!-- 
        <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar Clientes">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>

       -->


      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user text-success" aria-hidden="true"></i>  <?php echo $_SESSION[KEY.NOMBRES]; ?> </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Configuración</a></li>
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Herramientas</a></li>
            <li role="separator" class="divider"></li>
            <li><a style="cursor:pointer;"  onclick="logout();">Salir</a></li>



          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>