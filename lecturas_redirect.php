<?php
	session_start();

	$periodo_tipo = $_POST['periodo_tipo'];

	if ($_SESSION["k_D_diaInicio"]=="" || $periodo_tipo=="") {
		include("inc/conectar.php");
		$resBD = mysql_query("SELECT * FROM tLecturas ORDER BY lectFecha DESC"); 	
		$rowBD = mysql_fetch_array($resBD);
		$_SESSION["k_D_diaInicio"] = $rowBD['lectFecha'];
		$_SESSION["k_M_mesInicio"] = substr($rowBD['lectFecha'], 5, 2);
		$_SESSION["k_M_anioInicio"] = substr($rowBD['lectFecha'], 0, 4);		
		include("inc/desconectar.php");
		?>
		<script languaje="javascript">
		location.href = "panel_control_cuadro_alumbrado_lecturas_dia.php";
		</script>
		<?	
		break;		
	}

	if ($periodo_tipo=="D") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?>
		<script languaje="javascript">
		location.href = "panel_control_cuadro_alumbrado_lecturas_dia.php";
		</script>
		<?	
		break;		
	}

	if ($periodo_tipo=="S") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?>
		<script languaje="javascript">
		location.href = "panel_control_cuadro_alumbrado_lecturas_semana.php";
		</script>
		<?	
		break;		
	}

	if ($periodo_tipo=="M") {
		$_SESSION["k_M_mesInicio"] = $_POST['dMes'];
		$_SESSION["k_M_anioInicio"] = $_POST['dAnio'];
		?>
		<script languaje="javascript">
		location.href = "panel_control_cuadro_alumbrado_lecturas_mes.php";
		</script>
		<?	
		break;		
	}
/*	
	if ($periodo_tipo=="DC") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "climatizacion_dia.php";
		</script><?
		break;
	}	
	
	if ($periodo_tipo=="DR") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "resto_dia.php";
		</script><?
		break;
	}	
	
	if ($periodo_tipo=="DT") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "total_dia.php";
		</script><?
		break;
	}
	
	if ($periodo_tipo=="SL") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "luminarias_semana.php";
		</script><?
		break;
	}
	
	if ($periodo_tipo=="SC") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "climatizacion_semana.php";
		</script><?
		break;
	}	
	
	if ($periodo_tipo=="SR") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "resto_semana.php";
		</script><?
		break;
	}	
	
	if ($periodo_tipo=="ST") {
		$_SESSION["k_D_diaInicio"] = $_POST['datepicker'];
		?><script languaje="javascript">
		location.href = "total_semana.php";
		</script><?
		break;
	}
			
	if ($periodo_tipo=="ML") {
		$_SESSION["k_M_mesInicio"] = $_POST['dMes'];
		$_SESSION["k_M_anioInicio"] = $_POST['dAnio'];
		?><script languaje="javascript">
		location.href = "luminarias_mes.php";
		</script><?
		break;
	}	

	if ($periodo_tipo=="MC") {
		$_SESSION["k_M_mesInicio"] = $_POST['dMes'];
		$_SESSION["k_M_anioInicio"] = $_POST['dAnio'];
		?><script languaje="javascript">
		location.href = "climatizacion_mes.php";
		</script><?
		break;
	}
	
	if ($periodo_tipo=="MR") {
		$_SESSION["k_M_mesInicio"] = $_POST['dMes'];
		$_SESSION["k_M_anioInicio"] = $_POST['dAnio'];
		?><script languaje="javascript">
		location.href = "resto_mes.php";
		</script><?
		break;
	}	
	
	if ($periodo_tipo=="MT") {
		$_SESSION["k_M_mesInicio"] = $_POST['dMes'];
		$_SESSION["k_M_anioInicio"] = $_POST['dAnio'];
		?><script languaje="javascript">
		location.href = "total_mes.php";
		</script><?
		break;
	}	
*/
?>