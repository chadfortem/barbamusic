<?php 
	session_start();
	if (!$_SESSION["sesion"]) {
		header("location: index.php?alert=start");
	}
	$roll=$_SESSION["roll"];
	switch ($roll) {
		case 'root':
			break;
		
		case 'administrador':
			break;

		default:
			header("location: index.php");
			break;
	}
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
	<title>Registar Usuario</title>
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

<?php 
	//Comienza el Formulario
	if (empty($_POST)) {
	?>
<body>
		<?php
		if (!empty($_GET["alert"])) {
			switch ($_GET["alert"]) {
				case 'usuario':
					$alerta='Usuario ya registrado';
					break;
				case 'contrasena':
					$alerta='La contrasena no coincide';
					break;
				case 'contrasenaleg':
					$alerta='Tu contrasena debe medir mas de 5 caracteres y menos de 18';
					break;
				default:
					$alerta='Problema desconocido';
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
		}//
	?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-10">

				<form action="agregar_usuario.php" method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Nombre</span></div>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre">
							<input type="text" class="form-control" name="paterno" placeholder="Paterno">
							<input type="text" class="form-control" name="materno" placeholder="Materno">
						</div>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Correo</span></div>
							<input type="email" class="form-control" name="correo" placeholder="email@dominio.com">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Usuario</span></div>
							<input type="text" class="form-control" name="usuario" placeholder="Usuario">
							<div class="input-group-prepend"><span class="input-group-text">Contrasena</span></div>
							<input type="password" class="form-control" name="contrasena">
							<div class="input-group-prepend"><span class="input-group-text">Confimar</span></div>
							<input type="password" class="form-control" name="confirmar">
						</div>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Roll</div>
							<select name="roll" class="form-control">
								<option value="root">Root</option>
								<option value="organizador">Organizador</option>
								<option value="fotografo">Fotografo</option>
								<option value="administrador">Administrador</option>
							</select>
							<div class="input-group-prepend"><span class="input-group-text">Estado</div>
							<select name="estado" class="form-control">
								<option value="1">Activado</option>
								<option value="0">Desactivado</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group" style="height: 8rem;">
							<div class="input-group-prepend""><span class="input-group-text">Biografia</span></div>
							<textarea class="form-control" rows="5" id="comment" name="biografia"></textarea>
						</div>
					</div>
					
					<div class="form-group" style="margin-top: 2rem;">
						<div class="btn-group">
							<div class="btn-group">
								<input type="submit" class="btn btn-primary" value="Agregar">
								<input type="reset" class="btn btn-primary" value="Limpiar">
								<a href="index.php" class="btn btn-primary">Inicio</a>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</body>
<?php 
	
	}//if Termina Formulario

	//Comienza Registro de Usuario
	if (!empty($_POST)) {

		include 'conexion.php';

		//Varibales POST
		$nombre=$_POST["nombre"];
		$paterno=$_POST["paterno"];
		$materno=$_POST["materno"];
		$correo=$_POST["correo"];
		$username=$_POST["usuario"];
		$pasword=$_POST["contrasena"];
		$confirm=$_POST["confirmar"];
		$roll=$_POST["roll"];
		$estado=$_POST["estado"];
		$biografia=$_POST["biografia"];
		$fb="";
		$insta="";
		$tw="";

		// Tratamiento de Caracteres
		$username = strtolower($username);
		$nombre=ucwords($nombre);
		$paterno=ucwords($paterno);
		$materno=ucwords($materno);

		// Condicionales
		//Si el Ususario ya Existe
		$result = $conn->query("SELECT * FROM usuarios WHEN usuario='$username'");
		if($result->num_rows > 0){
			header('location: agregar_usuario.php?alert=usuario');
		}

		// Si el Correo ya esta Registrado
		$result = $conn->query("SELECT * FROM usuarios WHEN correo='$correo'");
		if($result->num_rows > 0){
			header('location: agregar_usuario.php?alert=correo');
		}

		// Si la contrasena no cumple con los requisitos
		// Si la contrasena no coincide
		if($pasword!=$confirm){
			header('location: agregar_usuario.php?alert=contrasena');
		}
		// Si la contrasena no mide lo adecuado
		if (strlen($pasword)<=5||strlen($pasword)>25) {
			header('location: agregar_usuario.php?alert=contrasenaleg');
		}

		//Foto de Perfil
		$image = $_FILES['imagen']['tmp_name'];
        $img = addslashes(file_get_contents($image));
    	
    	if (!$conn->query("INSERT INTO usuarios (nombre, paterno, materno, correo, usuario, contrasena, roll, estado, biografia, fb, insta, tw) VALUES ('$nombre' ,'$paterno' ,'$materno' ,'$correo' ,'$username' ,'$pasword' ,'$roll' ,'$estado' ,'$biografia' ,'$fb' ,'$insta' ,'$tw');")||!$conn->query("INSERT INTO img_perfil (image) VALUES ('$img')")) 
    	{
    		echo "Fallo el Registro:".$conn->error;
		}

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 alert-success">
				<h4>Usuario Registrado</h4>
				<div class="btn-group">
					<a href="agregar_usuario.php" class="btn btn-primary">Agregar Usuario</a>
					<a href="index.php" class="btn btn-primary">Inicio</a>
				</div>
			</div>
		</div>
	</div>
</body>
<?php 	
	}//if Termina Registro
?>
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
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>
