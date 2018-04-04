<?php 
	include 'conexion.php';
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
	<title>Panel De Usuarios</title>
	<link rel="shortcut icon" href="vectores/icon.svg" />
	<!-- Estilos de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<header>
	<div class="container justify-content-center">
		<div class="col-">
			<h2>Panel de Usuarios</h2>
		</div>
	</div>
</header>
<body id="lista">
	<div class="container">
		<div class="row">
			<?php 
				$result=$conn->query("SELECT * FROM usuarios");
			?>
			<div id="table" class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nombre</th>
							<th scope="col">Usuario</th>
							<th scope="col">Roll</th>
							<th scope="col">Estado</th>
							<th scope="col">Configuracion</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							 if($result->num_rows > 0){
							 	$i=1;
							 	while ($row = $result->fetch_assoc()) {
						?>
						<tr>
						    <th scope="row"><?php echo $i; ?></th>
							<td><?php echo $row["nombre"]." ".$row["paterno"]." ".$row["materno"]; ?></td>
							<td><?php echo $row["usuario"]; ?></td>
							<td><?php echo $row["roll"]; ?></td>
							<td><?php if ($row["estado"]==1) {
								echo "<span class='alert-success'>Activo</span>";
							} else {
								echo "<span class='alert-danger'>Desactivado</span>";
								}?></td>
							<td>
								<a href=<?php echo "'ver_usuario.php?id=".$row["id"]."'";?> class="btn btn-primary">Ver</a>
								<a href=<?php echo "'editar_usuario.php?id=".$row["id"]."'";?> class="btn btn-primary">Editar</a>
								<a href=<?php echo "'eliminar_usuario.php?id=".$row["id"]."'";?> class="btn btn-danger">Eliminar</a>
							</td>
					    </tr>
					    <?php 
					    			$i++;
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
					<a href="agregar_usuario.php" class="btn btn-primary">Agregar Usuario</a>
					<a href="index.php" class="btn btn-primary">Regresar</a>
				</div>
			</div>
		</div>
	</div>
</body>