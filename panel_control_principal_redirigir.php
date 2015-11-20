<?php
	session_start();
	
	//Guardamos el número de cuadro para usarlo luego en panel_control_cuadro
	
	$_SESSION["k_numCuadro"] = trim($_GET["numero"]);

	?>
		<script languaje="javascript">
			location.href = "panel_control_cuadro.php";
		</script>
	<?
?>