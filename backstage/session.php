<?php
	session_start();
	session_destroy();
	if (empty($_POST)) {
		header("location: index.php?alert=start");
	}
	else{
		// Usuario y contrasena solicitados
		$user=$_POST['usuario'];
		$pass=$_POST['contrasena'];

		// Conexion a base de datos
		include 'conexion.php';

		// Pedir informacion de usuario
		$sql="SELECT * FROM usuarios WHERE usuario='$user'";
		$result = $conn->query($sql);
		if ($result->num_rows>0) {

			$row = $result->fetch_array();
				if ($row["contrasena"]==$pass){
					session_start();
					$_SESSION["usuario"]=$row["usuario"];
					$_SESSION["sesion"]=true;
					$_SESSION["roll"]=$row["roll"];
					$_SESSION["nombre"]=$row["nombre"];
					$_SESSION["paterno"]=$row["paterno"];
					$_SESSION["materno"]=$row["materno"];
					$_SESSION["correo"]=$row["correo"];
					$_SESSION["estado"]=$row["estado"];
					$_SESSION["biografia"]=$row["biografia"];
					$_SESSION["fb"]=$row["fb"];
					$_SESSION["insta"]=$row["insta"];
					$_SESSION["tw"]=$row["tw"];
					if ($row["estado"]!=1) {
						session_destroy();
						header("location: index.php?alert=noautorizado");
					}
					else{
						header("location: backstage.php");
					}
				}else{
					header('location: index.php?alert=contrasena');
				}
			}else{
				header('location: index.php?alert=usuario');
			}
	}
?>