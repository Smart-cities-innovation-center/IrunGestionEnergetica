<?php
	session_start();

	$_SESSION["k_indicador_sel"] = $_GET['ind'];
	$_SESSION["k_indicador_sel_sinFormato"] = $_GET['indSin'];

	?>
	<script languaje="javascript">
	location.href = "panel_control_cuadro_indicadores.php";
	</script>
	<?	

?>