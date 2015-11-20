<?php
	session_start();
	
	
	$vId = $_GET['id'];
	$vEstado = $_GET['estado'];

	//Conexion con la base de datos
	include("inc/conectar.php");
	$result = mysql_query("SELECT * FROM tCuadrosIndicadoresTelecontrol WHERE cuaindtelId='$vId'");
	$row = mysql_fetch_array($result);
	$vVarIndicador = $row['cuaindtelCuaIdIndicador'];
	
	//Datos para el registro de la tabla de tPeticiones
	$vEstacion = "Hondarribi_".$row['cuaindtelNumero'];
	$vUsuario = $_SESSION["k_nombre_usuario"];
	if ($vEstado == 0) {
		$vNuevoEstado = 1;
		$vComando = "setcoil=".$row['cuaindtelCanalSalida'].",slave=18";
	} else {
		$vNuevoEstado = 0;	
		$vComando = "resetcoil=".$row['cuaindtelCanalSalida'].",slave=18";
	}

	$vEstadoPeticiones = 0;

	// Grabar registro en tPeticiones
	$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
					VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
	mysql_query($consulta) or die(mysql_error());		

	//Actualizar el estado de la lámpara en tCuadrosLamparasTelecontrol
	$consulta = "UPDATE tCuadrosIndicadoresTelecontrol SET cuaindtelEstado='$vNuevoEstado'
					WHERE cuaindtelId='$vId'";
	mysql_query($consulta) or die(mysql_error());
				
	//Desconexion con la base de datos
	include("inc/desconectar.php");

	?>
		<script languaje="javascript">
			location.href = "panel_control_cuadro_indicadores_telecontrol.php?vId=<? echo $vVarIndicador; ?>&est=<? echo $vNuevoEstado; ?>";
		</script>
	<?	

?>
