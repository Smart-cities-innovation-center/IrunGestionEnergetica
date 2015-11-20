<?php
	session_start();
	
	//Proceso de verificación de usuario
	
	$usuario = trim($_POST["login"]);
	$password = trim($_POST["pass"]);
	$conf = "";

	//Conexion con la base de datos
	include("inc/conectar.php");
	$result = mysql_query("SELECT * FROM tUsuarios WHERE usuUsuario='$usuario'");
	if(mysql_num_rows($result)>0){
		while ($row = mysql_fetch_array($result)){
			if($row["usuPassword"] == $password){
				if ($row["usuEstado"] == 1) {	
					$_SESSION["k_userId"] = $row['usuIdUsuario']; //Usuario y contraseña correctos
					$_SESSION["k_nombre_usuario"] = $row['usuNombre'];
					$_SESSION["k_admin"] = $row['usuAdministrador'];
					$_SESSION["k_admin_prin"] = $row['usuAdministradorPrincipal'];
					$conf = "ok";
					include("inc/incGuardarEntrada.php");
				} else {
					$conf = "estadoNo";
				}
			}
		}
		if ($conf == "")
			$conf = "passNo";		//Contraseña incorrecta	
	}
	else {
		$conf = "loginNo";		//Usuario no registrado
	}
	
	//Desconexion con la base de datos
	include("inc/desconectar.php");
	
	echo $conf;
?>