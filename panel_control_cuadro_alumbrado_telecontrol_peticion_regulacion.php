<?php
	session_start();

	if (isset($_POST['id']) && isset($_POST['regulador'])) {	
		$vId = $_POST['id'];
		$vPorcPotencia = $_POST['regulador'];

		//Conexion con la base de datos
		include("inc/conectar.php");	
	
		//Actualizar el valor del regulador de la lámpara en tCuadrosLamparasTelecontrol
		$consulta = "UPDATE tCuadrosLamparasTelecontrol SET cualamtelRegulador='$vPorcPotencia'
						WHERE cualamtelId='$vId'";
		mysql_query($consulta) or die(mysql_error());
		
		//Cogemos datos que nos faltan para enviar a tPeticiones
		$result = mysql_query("SELECT * FROM tCuadrosLamparasTelecontrol WHERE cualamtelId='$vId'");
		$row = mysql_fetch_array($result);
			
		//Datos para el registro de la tabla de tPeticiones
		$vEstacion = "Hondarribi_".$row['cualamtelNumero']; //$vEstacion = "Microcom"; 
		$vUsuario = $_SESSION["k_nombre_usuario"];
		$vComando = "LAMP".$row['cualamtelIdLamRegulacion']."=".$vPorcPotencia;
		$vEstadoPeticiones = 0;
	
		// Grabar registro en tPeticiones
		$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
						VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
		mysql_query($consulta) or die(mysql_error());			
					
		//Desconexion con la base de datos
		include("inc/desconectar.php");
	}
		
?>
