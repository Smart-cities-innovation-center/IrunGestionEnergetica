<?php
	session_start();

	include_once ('Mobile_Detect.php');
	$detect = new Mobile_Detect();
	
	$vDispositivo = "Ordenador";
	if ($detect->isMobile()) $vDispositivo = "Smartphone";
	if ($detect->isTablet()) $vDispositivo = "Tablet";

	$vIdUsuario = $_SESSION['k_userId'];
	$_SESSION["k_date"] = date("Y-m-d");
	$_SESSION["k_time"] = date("H:i:s");
	$vFecha = $_SESSION["k_date"];
	$vHora = $_SESSION["k_time"];
	
	// Grabar registro en tUsuariosEntradas
	$consulta = "INSERT INTO tUsuariosEntradas (usuentIdUsuario, usuentFechaEntrada, usuentHoraEntrada, usuentDispositivo)
					VALUES ('$vIdUsuario', '$vFecha', '$vHora', '$vDispositivo')";
	mysql_query($consulta) or die(mysql_error());
?>