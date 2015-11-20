<?php 
//Conexión a la base de datos
	$_SESSION["con"] = mysql_connect("qso744.dbname.net","qso744","SQL57h24Tx") or die (mysql_error());
	mysql_select_db("qso744",$_SESSION["con"]) or die (mysql_error());
	mysql_query("SET NAMES 'utf8'");
?> 
