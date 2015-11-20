<?php
	session_start();

	$_SESSION["k_entradas_idUsuario"] = $_GET['id'];

	?>
	<script languaje="javascript">
	location.href = "panel_usuarios_entradas_mostrar.php";
	</script>
	<?	

?>