<?php
session_start();

include("incGuardarSalida.php");

// Borramos toda la sesion
session_destroy();
$_SESSION['k_username'] == "";
?>
<SCRIPT LANGUAGE="javascript">
location.href = "../index.php";
</SCRIPT>