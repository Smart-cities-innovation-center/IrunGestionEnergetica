<?php
	session_start();
	
	if (isset($_POST['id']) && isset($_POST['estado'])) {	
		$vId = $_POST['id'];
		$vEstado = $_POST['estado'];

		//Conexion con la base de datos
		include("inc/conectar.php");
		
		if ($vId != 99) {		// Es sólo un circuito
			$result = mysql_query("SELECT * FROM tCuadrosLamparasTelecontrol WHERE cualamtelId='$vId'");
			$row = mysql_fetch_array($result);
			$vVarLampara = $row['cualamtelCuaIdLampara'];
			
			//Datos para el registro de la tabla de tPeticiones
			$vEstacion = "Hondarribi_".$row['cualamtelNumero'];
			$vUsuario = $_SESSION["k_nombre_usuario"];
			if ($vEstado == 0) {
				$vNuevoEstado = 1;
				$vComando = "setcoil=".$row['cualamtelCanalSalida'].",slave=18";
				//$datoAccion = "Encendido";
			} else {
				$vNuevoEstado = 0;	
				$vComando = "resetcoil=".$row['cualamtelCanalSalida'].",slave=18";
				//$datoAccion = "Apagado";
			}
		
			$vEstadoPeticiones = 0;
		
			// Grabar registro en tPeticiones
			$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
							VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
			mysql_query($consulta) or die(mysql_error());	
			
		} else {		// Son TODOS los ciercuitos
			
			$result = mysql_query("SELECT * FROM tCuadrosLamparasTelecontrol");
			while ($row = mysql_fetch_array($result)) {
				$vVarLampara = $row['cualamtelCuaIdLampara'];
				
				//Datos para el registro de la tabla de tPeticiones
				$vEstacion = "Hondarribi_".$row['cualamtelNumero'];
				$vUsuario = $_SESSION["k_nombre_usuario"];
				if ($vEstado == 0) {
					$vNuevoEstado = 1;
					$vComando = "setcoil=".$row['cualamtelCanalSalida'].",slave=18";
					//$datoAccion = "Encendido";
				} else {
					$vNuevoEstado = 0;	
					$vComando = "resetcoil=".$row['cualamtelCanalSalida'].",slave=18";
					//$datoAccion = "Apagado";
				}
			
				$vEstadoPeticiones = 0;
			
				// Grabar registro en tPeticiones
				$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
								VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
				mysql_query($consulta) or die(mysql_error());
			}
		}
	
		// Recopilamos y guardamos en tUsuariosAcciones
		/*$datoIdUsuario = $_SESSION['k_userId'];
		$datoFecha = date("Y-m-d");
		$datoHora = date("H:i:s");
		$datoNCuadro = $row['cualamtelNumero'];
			
		$datoNumRef = $_GET['ref'];	
		$datoDireccion = $_GET['dir'];
		$datoTipo = "Alumbrado";
	
		$consulta = "INSERT INTO tUsuariosAcciones (usuaccIdUsuario, usuaccFecha, usuaccHora, usuaccNCuadro, usuaccNumRef, usuaccDireccion, usuaccTipo, usuaccAccion)
						VALUES ('$datoIdUsuario', '$datoFecha', '$datoNCuadro', '$datoNumRef', '$datoDireccion', '$datoTipo', '$datoAccion')";
		mysql_query($consulta) or die(mysql_error());*/
							
		//Desconexion con la base de datos
		include("inc/desconectar.php");
	}
?>
