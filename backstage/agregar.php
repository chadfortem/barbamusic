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
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">

				<form action="agregar.php" method="post">
					<div class="form-group">
						<div class="input-group">
							<label class="input-group-text" style="width: 7rem;">Nombre</label>
							<input type="text" class="input-group-prepend" name="Nombre">
							<input type="file" class="input-group-addon" name="imagen">
						</div>
						<div class="input-group">
							<label class="input-group-text" style="width: 7rem;">Titulo</label>
							<input type="text" class="input-group-prepend" name="titulo">
							<label class="input-group-text" style="width: 7rem;">Encabezado</label>
							<input type="text" class="input-group-prepend" name="encabezado">
						</div>
						<div class="input-group">
							<label class="input-group-text" style="width: 7rem;">Estado</label>
							<select name="estado">
								<option value="TRUE">Activado</option>
								<option value="FALSE">Desactivado</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<div class="btn-group">
							<div class="btn-group">
								<input type="submit" class="btn btn-primary" value="Agregar">
								<input type="reset" class="btn btn-primary" value="Limpiar">
								<a href="" class="btn btn-primary">Inicio</a>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</body>
<source src="js/bootstrap.js" type="">
</html>
