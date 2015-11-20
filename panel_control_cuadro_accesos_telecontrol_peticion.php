<?php
	session_start();
	
	
	$vId = $_GET['id'];
	$vEstado = $_GET['estado'];

	//Conexion con la base de datos
	include("inc/conectar.php");
	$result = mysql_query("SELECT * FROM tCuadrosAccesosTelecontrol WHERE cuaacctelId='$vId'");
	$row = mysql_fetch_array($result);
	$vVarAcceso = $row['cuaacctelCuaIdAcceso'];
	
	//Datos para el registro de la tabla de tPeticiones
	$vEstacion = "Hondarribi_".$row['cuaacctelNumero'];
	$vUsuario = $_SESSION["k_nombre_usuario"];
	if ($vEstado == 0) {
		$vNuevoEstado = 1;
		$vComando = "setcoil=".$row['cuaacctelCanalSalida'].",slave=18";
	} else {
		$vNuevoEstado = 0;	
		$vComando = "resetcoil=".$row['cuaacctelCanalSalida'].",slave=18";
	}

	$vEstadoPeticiones = 0;

	// Grabar registro en tPeticiones
	$consulta = "INSERT INTO tPeticiones (petEstacion, petComando, petUsuario, petEstado)
					VALUES ('$vEstacion', '$vComando', '$vUsuario', '$vEstadoPeticiones')";
	mysql_query($consulta) or die(mysql_error());		

	//Actualizar el estado de la lámpara en tCuadrosLamparasTelecontrol
	$consulta = "UPDATE tCuadrosAccesosTelecontrol SET cuaacctelEstado='$vNuevoEstado'
					WHERE cuaacctelId='$vId'";
	mysql_query($consulta) or die(mysql_error());
				
	//Desconexion con la base de datos
	include("inc/desconectar.php");

	?>
		<script languaje="javascript">
			location.href = "panel_control_cuadro_accesos_telecontrol.php?vId=<? echo $vVarAcceso; ?>&est=<? echo $vNuevoEstado; ?>";
		</script>
	<?	

?>
