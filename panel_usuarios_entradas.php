<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
?>

<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Monitor .:. Hondarribiko Udala</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- For all browsers -->
	<link rel="stylesheet" href="css/reset.css?v=1">
	<link rel="stylesheet" href="css/style.css?v=1">
	<link rel="stylesheet" href="css/colors.css?v=1">
	<link rel="stylesheet" media="print" href="css/print.css?v=1">
    
	<!-- For progressively larger displays -->
	<link rel="stylesheet" media="only all and (min-width: 480px)" href="css/480.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 768px)" href="css/768.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 992px)" href="css/992.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="css/1200.css?v=1">
	<!-- For Retina displays -->
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="css/2x.css?v=1">

	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<!-- Additional styles -->
	<link rel="stylesheet" href="css/styles/form.css?v=1">
	<link rel="stylesheet" href="css/styles/switches.css?v=1">
	<link rel="stylesheet" href="css/styles/table.css?v=1">

	<!-- DataTables -->
	<link rel="stylesheet" href="js/libs/DataTables/jquery.dataTables.css?v=1">

	<!-- JavaScript at bottom except for Modernizr -->
	<script src="js/libs/modernizr.custom.js"></script>

	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="img/favicons/favicon.png">
	<!-- For everything else -->
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<!-- For retina screens -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-retina.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-ipad.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon.png">

	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on"> 
   
</head>

<body class="clearfix with-menu with-shortcuts">
	<?
		include("inc/conectar.php");
	?>

	<!-- Prompt IE 6 users to install Chrome Frame -->
	<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<!-- Title bar -->
	<header role="banner" id="title-bar">
    	<h2> </h2>
	</header>

	<!-- Button to open/hide menu -->
	<a href="#" id="open-menu"><span>Menu</span></a> 

	<!-- Button to open/hide shortcuts -->
	<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

	<!-- Main content -->
	<section role="main" id="main">

		<noscript class="message black-gradient simpler">Your browser does not support JavaScript! Some features won't work as expected...</noscript>

		<div class="with-padding" style="margin-bottom:30px;">

			<p class="wrapped anthracite-gradient glossy with-mid-padding align-left" style="font-size:22px;">
				Gestión de usuarios . <span class="orange">Entradas al sistema</span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->
			<div class="with-padding">

			<table class="table responsive-table" id="sorting-advanced">

				<thead>
					<tr>
						<th scope="col" class="align-center">Admin</th>
						<th scope="col">Nombre usuario</th>
						<th scope="col" class="align-center">Última entrada</th>
						<th scope="col" class="align-center">Ver...</th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="4">
							<?
								if ($_SESSION["k_admin_prin"])
									$result = mysql_query("SELECT * FROM tUsuarios");
								else
									$result = mysql_query("SELECT * FROM tUsuarios WHERE usuAdministradorPrincipal=0");
									
								$vCant = mysql_num_rows($result);
								echo mysql_num_rows($result)." usuarios encontrados";
							?>
						</td>
					</tr>
				</tfoot>
                
				<tbody>
                	<?
						if ($_SESSION["k_admin_prin"]) {
							$bdUsuarios = mysql_query("SELECT * FROM tUsuarios ORDER BY usuAdministradorPrincipal DESC, usuNombre");
							
							$bdAuxEntradas = mysql_query("SELECT COUNT(usuent.usuentId) as nEntradas
																	FROM tUsuariosEntradas usuent
																	INNER JOIN tUsuarios usu
																	ON usu.usuIdUsuario = usuent.usuentIdUsuario");
							$rowAuxEntradas = mysql_fetch_array($bdAuxEntradas);
							$vEntradasTotales = $rowAuxEntradas['nEntradas'];	
							
							$bdAuxEntradas = mysql_query("SELECT usuent.usuentFechaEntrada AS fEntrada,
																 usuent.usuentHoraEntrada AS hEntrada 							
																	FROM tUsuariosEntradas usuent
																	INNER JOIN tUsuarios usu
																	ON usu.usuIdUsuario = usuent.usuentIdUsuario
																	ORDER BY usuent.usuentFechaEntrada DESC");
							$rowAuxEntradas = mysql_fetch_array($bdAuxEntradas);
							$vUltimaEntradasTotales = $rowAuxEntradas['fEntrada']." ".$rowAuxEntradas['hEntrada'];																						
						} else {
							$bdUsuarios = mysql_query("SELECT * FROM tUsuarios WHERE usuAdministradorPrincipal=0 ORDER BY usuNombre");

							$bdAuxEntradas = mysql_query("SELECT COUNT(usuent.usuentId) AS nEntradas
																	FROM tUsuariosEntradas usuent
																	INNER JOIN tUsuarios usu
																	ON usu.usuIdUsuario = usuent.usuentIdUsuario
																	WHERE usu.usuAdministradorPrincipal=0");
							$rowAuxEntradas = mysql_fetch_array($bdAuxEntradas);
							$vEntradasTotales = $rowAuxEntradas['nEntradas'];
							
							$bdAuxEntradas = mysql_query("SELECT usuent.usuentFechaEntrada AS fEntrada,
																 usuent.usuentHoraEntrada AS hEntrada 							
																	FROM tUsuariosEntradas usuent
																	INNER JOIN tUsuarios usu
																	ON usu.usuIdUsuario = usuent.usuentIdUsuario
																	WHERE usu.usuAdministradorPrincipal=0
																	ORDER BY usuent.usuentFechaEntrada DESC");
							$rowAuxEntradas = mysql_fetch_array($bdAuxEntradas);
							$vUltimaEntradasTotales = $rowAuxEntradas['fEntrada']." ".$rowAuxEntradas['hEntrada'];															
						}
					?>
                        <tr>
                            <td></td>
                            <td style="vertical-align:middle">&nbsp;>>>> Entradas totales</td>
                            <td class="align-center" style="vertical-align:middle"><? echo $vUltimaEntradasTotales; ?></td>
                            <td class="align-center" style="vertical-align:middle">
                            	<a href="panel_usuarios_entradas_redirect.php?id=0"
                                	class="button margin-right">
                                    <span class="button-icon red-gradient glossy"><? echo $vEntradasTotales; ?></span>
									Entradas
                                </a>
                            </td>
                        </tr>
                     <?
						while ($rowUsuarios = mysql_fetch_array($bdUsuarios)){
							$vAuxId = $rowUsuarios['usuIdUsuario'];
							$result = mysql_query("SELECT * FROM tUsuariosEntradas 
															WHERE usuentIdUsuario='$vAuxId'
															ORDER BY usuentFechaEntrada DESC, usuEntHoraEntrada DESC");
							$vNEntradas = mysql_num_rows($result);
							$rowUsuEnt = mysql_fetch_array($result);
							$vUltimaEntrada = $rowUsuEnt['usuentFechaEntrada']." ".$rowUsuEnt['usuentHoraEntrada'];
						?>
                        <tr>
                            <td class="align-center" style="vertical-align:middle">
                            	<? if ($rowUsuarios['usuAdministrador']) {?><span class="icon-user red"></span><? } ?>
                            </td>
                            <td style="vertical-align:middle"><? echo $rowUsuarios['usuNombre']; ?></td>
                            <td class="align-center" style="vertical-align:middle"><? echo $vUltimaEntrada; ?></td>
                            <td class="align-center" style="vertical-align:middle">
                            	<a href="panel_usuarios_entradas_redirect.php?id=<? echo $rowUsuarios['usuIdUsuario']; ?>" 
                                	class="button margin-right">
                                    <span class="button-icon blue-gradient glossy"><? echo $vNEntradas; ?></span>
									Entradas
                                </a>
                            </td>
                        </tr> 
                        <?
						}
						?>
				</tbody>

			</table> 
            </div>                                  

<!-- Pantalla principal Fin -->


			

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->

    <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">	
        <li><a href="panel_control_principal.php" class="shortcut-dashboard" title="Panel de control principal">Panel de control principal</a></li>
        <li><a href="panel_alarmas.php" class="shortcut-notes" title="Alarmas">Alarmas</a></li>
        <li><a href="panel_precio_energia_redirect.php" class="shortcut-stats" title="Precio energía">Precio energía</a></li>
        <li><a href="panel_mapa_luminico.php" class="shortcut-messages" title="Mapa lumínico">Mapa lumínico</a></li>     
        <li class="current"><a href="panel_usuarios.php" class="shortcut-contacts" title="Gestión de usuarios">Gestión de usuarios</a></li>
    </ul>
	
	<!-- Sidebar/drop-down menu -->
	<section id="menu" role="complementary">

		<!-- This wrapper is used by several responsive layouts -->
		<div id="menu-content">

			<header>
				<span class="icon-user silver"></span>&nbsp;
				<? echo $_SESSION["k_nombre_usuario"]; ?>&nbsp;&nbsp;
                <a href="inc/logout.php"><strong style="font-size:11px;color:#F90;text-decoration: none;">[logout]</strong></a>                
			</header>

			<div id="profile_irun">
				<img src="img/logoProyecto.png" height="90" alt="">	
			</div>

			<!-- By default, this section is made for 4 icons, see the doc to learn how to change this, in "basic markup explained" -->
			<ul id="access" class="children-tooltip">
				<!--<li><a href="inc/logout.php" title="Logout"><span class="icon-extract"></span></a></li>-->
			</ul>

			<section class="navigable">
                <ul class="big-menu">
					<li><a href="panel_usuarios.php">Usuarios</a></li>
                    <li><a href="#" class="current navigable-current">Entradas al sistema</a></li>       
                </ul>
			</section>         
		
            <!-- End content wrapper -->
            
            <ul id="access" class="children-tooltip">
    
            </ul>
    
            <!-- This is optional -->
            <footer id="menu-footer_irun">
                <? include "inc/incPie.php"; ?>  
            </footer>
            
		</div>
        
	</section>
	<!-- End sidebar/drop-down menu -->

 
	<?
		include("inc/desconectar.php");
	?>
    
	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
    <script src="js/libs/jquery-1.8.2.min.js"></script>
	<script src="js/setup.js"></script>

	<!-- Template functions -->
	<script src="js/developr.input.js"></script>
	<script src="js/developr.navigable.js"></script>
	<script src="js/developr.notify.js"></script>
	<script src="js/developr.scroll.js"></script>
	<script src="js/developr.tooltip.js"></script>
	<script src="js/developr.table.js"></script>

	<!-- Plugins -->
	<script src="js/libs/jquery.tablesorter.min.js"></script>
	<script src="js/libs/DataTables/jquery.dataTables.min.js"></script>
    
	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Table sort - DataTables
		var table = $('#sorting-advanced');
		table.dataTable({
			'aoColumnDefs': [
				{ 'bSortable': false, 'aTargets': [ 0, 3 ] }
			],
			'sPaginationType': 'full_numbers',
			'sDom': '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
			'fnInitComplete': function( oSettings )
			{
				// Style length select
				table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
				tableStyled = true;
			}
		});



	</script>          
</body>
</html>