<?php
	session_start();
	$_SESSION["k_mapa_luminico_zona"] = $_GET['zona'];
?>
	<script languaje="javascript">
    	location.href = "panel_mapa_luminico.php";
    </script>
    <?	
?>
