<?php
	session_start();

	if ($_SESSION["k_precio_diaInicio"]=="") {
		$_SESSION["k_precio_diaInicio"] = date('Y-m-d');
	} else {
		$_SESSION["k_precio_diaInicio"] = $_POST['datepicker'];	
	}
	
	?>
	<script languaje="javascript">
	location.href = "panel_precio_energia.php";
	</script>
	<?		
?>