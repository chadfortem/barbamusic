<?php 
	session_start();
	if ($_SESSION["sesion"]) {
		header("location: backstage.php");
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
	</div>
</header>
<body>
<?php
	if (!empty($_GET["alert"])) {
		switch ($_GET["alert"]) {
			case 'start':
				$alerta='Debe iniciar sesion';
				break;
			case 'usuario':
				$alerta='Tu usario no existe';
				break;
			case 'contrasena':
				$alerta='Contrasena incorrecta';
				break;
			case 'noautorizado':
				$alerta='Tu sesion no es autorizada, por favor contacta a tu administrador';
				break;
			default:
				$alerta='Revisa bien tu registro, existe un problema';
				break;
		}
?>
	<div class="container alert-danger">
		<div class="row">
			<div class="col-10"><h3>Ups...</h3></div>
		</div>
		<div class="row">
			<div class="col-10"><?php echo $alerta; ?></div>
		</div>
	</div>
<?php 
	}
?>
	<div class="container">
		<div class="row justify-content-center">

			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<h3>Inicia Sesion</h3>
					</div>
					<form action="session.php" method="post">
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" name="usuario" class="form-text" required>
						</div>
						<div class="form-group">
							<label>Contrasena</label>
							<input type="password" name="contrasena" class="form-text" required>
						</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Inicia</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</body>
<source src="js/bootstrap.js" type="">
</html>