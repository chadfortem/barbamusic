<?php 
	include 'conexion.php';
	$id=$_GET["id"];
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
	<title>Editar</title>
	<link rel="shortcut icon" href="vectores/icon.svg" />
	<!-- Estilos de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<header>
	<div class="container justify-content-center">
		<div class="col-">
			<h2>Ediatar Usuario</h2>
		</div>
	</div>
</header>
<?php 
	//Comienza el Formulario
	if (empty($_POST)) {
	?>
<body id="lista">
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
				<?php 
				$result=$conn->query("SELECT * FROM usuarios WHERE id=$id");
				$row = $result->fetch_assoc();
				?>
				<form action=<?php echo "'editar_usuario.php?id=".$id."'";?> method="post" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Nombre</span></div>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre" value=<?php echo $row["nombre"]; ?>>
							<input type="text" class="form-control" name="paterno" placeholder="Paterno" value=<?php echo $row["paterno"]; ?>>
							<input type="text" class="form-control" name="materno" placeholder="Materno" value=<?php echo $row["materno"]; ?>>
						</div>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Correo</span></div>
							<input type="email" class="form-control" name="correo" placeholder="email@dominio.com" value=<?php echo $row["correo"]; ?>>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Usuario</span></div>
							<input type="text" class="form-control" name="usuario" placeholder="Usuario" value=<?php echo $row["usuario"]; ?>>
							<div class="input-group-prepend"><span class="input-group-text">Contrasena</span></div>
							<input type="password" class="form-control" name="contrasena" value=<?php echo $row["contrasena"]; ?>>
							<div class="input-group-prepend"><span class="input-group-text">Confimar</span></div>
							<input type="password" class="form-control" name="confirmar" value=<?php echo $row["contrasena"]; ?>>
						</div>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">Roll</div>
							<select name="roll" class="form-control">
								<option value="root" <?php if ($row["roll"]=="root") {echo "selected";} ?>>Root</option>
								<option value="organizador" <?php if ($row["roll"]=="organizador") {echo "selected";} ?>>Organizador</option>
								<option value="fotografo" <?php if ($row["roll"]=="fotografo") {echo "selected";} ?>>Fotografo</option>
								<option value="administrador" <?php if ($row["roll"]=="administrador") {echo "selected";} ?>>Administrador</option>
							</select>
							<div class="input-group-prepend"><span class="input-group-text">Estado</div>
							<select name="estado" class="form-control" selected=<?php echo $row["estado"];?>>
								<option value="1" <?php if ($row["estado"]==1) {echo "selected";} ?>>Activado</option>
								<option value="0" <?php if ($row["estado"]==0) {echo "selected";} ?>>Desactivado</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend""><span class="input-group-text">Biografia</span></div>
							<textarea class="form-control" rows="5" id="comment" name="biografia"><?php echo $row["biografia"];?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="btn-group">
							<div class="btn-group">
								<input type="submit" class="btn btn-primary" value="Editar">
								<a href=<?php echo "'eliminar_usuario.php?id=".$id."'";?> class="btn btn-danger">Eliminar</a>
								<a href="panel_usuarios.php" class="btn btn-primary">Regresar</a>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</body>
<?php 
	}
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
			header('location: editar_usuario.php?alert=usuario&id='.$id);
		}

		// Si el Correo ya esta Registrado
		$result = $conn->query("SELECT * FROM usuarios WHEN correo='$correo'");
		if($result->num_rows > 0){
			header('location: editar_usuario.php?alert=correo&id='.$id);
		}

		// Si la contrasena no cumple con los requisitos
		// Si la contrasena no coincide
		if($pasword!=$confirm){
			header('location: editar_usuario.php?alert=contrasena&id='.$id);
		}
		// Si la contrasena no mide lo adecuado
		if (strlen($pasword)<=5||strlen($pasword)>25) {
			header('location: editar_usuario.php?alert=contrasenaleg&id='.$id);
		}

		//Foto de Perfil 
		if (!$conn->query("UPDATE usuarios SET nombre='$nombre', paterno='$paterno', materno='$materno', correo='$correo', usuario='$username', contrasena='$pasword', roll='$roll', estado='$estado', biografia='$biografia' WHERE id=$id"))
    	{
    		echo "Fallo el Registro:".$conn->error;
    		die();
		}

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 alert-success">
				<h4>Usuario Actualizado</h4>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php 
				$result=$conn->query("SELECT * FROM usuarios WHERE id=$id");
			?>
			<div id="table" class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Usuario</th>
							<th scope="col">Roll</th>
							<th scope="col">Estado</th>
							<th scope="col">Biografia</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							 if($result->num_rows > 0){
							 	while ($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo $row["nombre"]." ".$row["paterno"]." ".$row["materno"]; ?></td>
							<td><?php echo $row["correo"]; ?></td>
							<td><?php echo $row["usuario"]; ?></td>
							<td><?php echo $row["roll"]; ?></td>
							<td><?php if ($row["estado"]==1) {
								echo "<span class='alert-success'>Activo</span>";
							} else {
								echo "<span class='alert-danger'>Desactivado</span>";
								}?></td>
							<td><?php echo $row["biografia"]; ?></td>
					    <?php 
					    		}
					    	 }
					    ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-">
				<div class="btn-group">
					<a href="panel_usuarios.php" class="btn btn-primary">Regresar</a>
					<a href=<?php echo "'editar_usuario.php?id=".$id."'";?> class="btn btn-primary">Editar</a>
				</div>
			</div>
		</div>
	</div>
</body>
<?php 	
	}//if Termina Actualizacion
?>
</html>