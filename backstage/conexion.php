<?php 
	$servidor="localhost";
	$usuario="root";
	$contrasena="";
	$basedatos="barbamusic";

	$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);

	if ($conn->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
?>