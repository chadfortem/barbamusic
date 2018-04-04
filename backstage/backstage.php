<?php 
	session_start();
	if (!$_SESSION["sesion"]) {
		header("location: index.php?alert=start");
	}
	$roll=$_SESSION["roll"];
?>
<style>
	body{
	    background: lightblue url("bg.jpg") no-repeat fixed center;
	    background-size: cover;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" href="vectores/icon.svg" />
	<!-- Estilos de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<!-- Script's de Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<header>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6 text-center">
				<h1>Barba Music <i class="text-warning">Backstage</i></h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-6 text-center">
				<h3>Bienvenido <?php echo $_SESSION["nombre"]; ?></h3>
			</div>
		</div>
	</div>
</header>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<?php
			if ($roll=="root"||$roll=="organizador"||$roll=="administrador") {
			?>
			<div class="card col-12 col-md-3" id="banner" style="width: 18rem;">
				<div class="card-body">
					<img src="vectores/svg/monitor.svg" class="img-fluid">
					<h5 class="card-title text-center">Banner</h5>
					<div id="Botonera">
						<div class="btn-group">
							<a href="#" class="btn btn-primary d-none d-md-block">Agregar</a>
							<a href="#" class="btn btn-primary d-none d-md-block">Configuracion</a>
						</div>
						<div class="d-block d-md-none">
							<a href="#" class="btn btn-primary btn-lg btn-block">Agregar</a>
							<a href="#" class="btn btn-primary btn-lg btn-block">Configuracion</a>
						</div>
					</div>
				</div>
			</div>
			<?php } 
			if ($roll=="root"||$roll=="aministrador") {
			?>
			<div class="card col-12 col-md-3" id="eventos" style="width: 18rem;">
				<div class="card-body">
					<img src="vectores/svg/book.svg" class="img-fluid">
					<h5 class="card-title text-center">Fechas</h5>
					<div id="Botonera">
						<div class="btn-group">
							<a href="agregar_fecha.php" class="btn btn-primary d-none d-md-block">Agregar</a>
							<a href="panel_fechas.php" class="btn btn-primary d-none d-md-block">Configuracion</a>
						</div>
						<div class="d-block d-md-none">
							<a href="agregar_fecha.php" class="btn btn-primary btn-lg btn-block">Agregar</a>
							<a href="panel_fechas.php" class="btn btn-primary btn-lg btn-block">Configuracion</a>
						</div>
					</div>
				</div>
			</div>
			<?php } 
			if ($roll=="root"||$roll=="administrador"||$roll=="fotografo") {
			?>
			<div class="card col-12 col-md-3" id="galeria" style="width: 18rem;">
				<div class="card-body">
					<img src="vectores/svg/photo-camera.svg" class="img-fluid">
					<h5 class="card-title text-center">Galeria</h5>
					<div id="Botonera">
						<div class="btn-group">
							<a href="agregar_galeria.php" class="btn btn-primary d-none d-md-block">Agregar</a>
							<a href="panel_galerias.php" class="btn btn-primary d-none d-md-block">Configuracion</a>
						</div>
						<div class="d-block d-md-none">
							<a href="agregar_galeria.php" class="btn btn-primary btn-lg btn-block">Agregar</a>
							<a href="panel_galerias.php" class="btn btn-primary btn-lg btn-block">Configuracion</a>
						</div>
					</div>
				</div>
			</div>
			<?php } 
			if ($roll=="root"||$roll=="administrador") {
			?>
			<div class="card col-12 col-md-3" id="usuarios" style="width: 18rem;">
				<div class="card-body">
					<img src="vectores/svg/avatar.svg" class="img-fluid">
					<h5 class="card-title text-center">Usuarios</h5>
					<div id="Botonera">
						<div class="btn-group">
							<a href="agregar_usuario.php" class="btn btn-primary d-none d-md-block">Agregar</a>
							<a href="panel_usuarios.php" class="btn btn-primary d-none d-md-block">Configuracion</a>
						</div>
						<div class="d-block d-md-none">
							<a href="agregar_usuario.php" class="btn btn-primary btn-lg btn-block">Agregar</a>
							<a href="panel_usuarios.php" class="btn btn-primary btn-lg btn-block">Configuracion</a>
						</div>
					</div>
				</div>
			</div>
			<?php } 
			if ($roll=="root") {
			?>
			<div class="card col-12 col-md-3" id="mensajes" style="width: 18rem;">
				<div class="card-body">
					<img src="vectores/svg/envelope.svg" class="img-fluid">
					<h5 class="card-title text-center">Mensajes</h5>
					<div id="Botonera">
						<div class="btn-group">
							<a href="mensajes.php" class="btn btn-primary d-none d-md-block">Buzon</a>
						</div>
						<div class="d-block d-md-none">
							<a href="mensajes.php" class="btn btn-primary btn-lg btn-block">Buzon</a>
						</div>
					</div>
				</div>
			</div>
			<?php }
			?>
			<div class="card col-12 col-md" id="mensajes" style="width: 18rem;">
				<div class="card-body">
					<h3 class="card-title">Noticias</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>

		</div>
	</div>
</body>
<footer style="height: 5rem;">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-">
				<div class="btn-group">
					<a href="configuracion_usuario.php" class="btn btn-primary">Configuracion</a>
					<a href="session_out.php" class="btn btn-danger">Cerrar Sesion</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<source src="js/bootstrap.js" type="">
</html>



