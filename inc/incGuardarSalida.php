<?php
	session_start();
	
	include("conectar.php");
	$vIdUsuario = $_SESSION['k_userId'];
	$vFecha = $_SESSION["k_date"];
	$vHora = $_SESSION["k_time"];
	$vHoraSalida = date("H:i:s");
	
	// Grabar registro en tUsuariosEntradas
	$consulta = "UPDATE tUsuariosEntradas SET usuentHoraSalida='$vHoraSalida'
					WHERE usuentIdUsuario='$vIdUsuario' AND usuentFechaEntrada='$vFecha' AND usuentHoraEntrada='$vHora'";
	mysql_query($consulta) or die(mysql_error());
	include("desconectar.php");
?>