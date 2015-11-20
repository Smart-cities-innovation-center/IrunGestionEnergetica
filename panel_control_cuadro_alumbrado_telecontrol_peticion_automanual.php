<?php
	session_start();
	
	if (isset($_POST['estado'])) {	
		$vEstado = $_POST['estado'];

		//Conexion con la base de datos
		include("inc/conectar.php");
		
			
		//Datos para el registro de la tabla de tPeticiones
		$vEstacion = "Hondarribi_016";
		$vUsuario = $_SESSION["k_nombre_usuario"];

		if ($vEstado == 1) {
			$vComando = "setcoil=6,slave=18";
			//$datoAccion = "Manual";
		} else {
			$vComando = "resetcoil=6,slave=18";
			//$datoAccion = "Automático";
		}
	
		$vEstadoPeticiones = 0;
	
		// Grabar registro en tPeticiones
		$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
						VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
		mysql_query($consulta) or die(mysql_error());	

		include("inc/desconectar.php");
	}
?>
