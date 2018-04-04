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
	<title>Ver</title>
	<link rel="shortcut icon" href="vectores/icon.svg" />
	<!-- Estilos de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<header>
	<div class="container justify-content-center">
		<div class="col-">
			<h2>Ver</h2>
		</div>
	</div>
</header>
<body id="lista">
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
							<th scope="col">Facebook</th>
							<th scope="col">Instgram</th>
							<th scope="col">Twitter</th>
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
							<td><?php echo $row["fb"]; ?></td>
							<td><?php echo $row["insta"]; ?></td>
							<td><?php echo $row["tw"]; ?></td>
					    </tr>
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
					<a href=<?php echo "'eliminar_usuario.php?id=".$id."'";?> class="btn btn-danger">Eliminar</a>
				</div>
			</div>
		</div>
	</div>
</body>