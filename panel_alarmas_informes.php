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
				Alarmas . <span class="orange">Informes</span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->
			<div class="with-padding">
				<div class="columns">
                    <div class="new-row ten-columns">
                          <h3 class="thin underline">Seleccionar datos para informe</h3>
                    </div> 
                        
                    <div class="new-row two-columns" style="margin-left:50px;">
                            <h6 style="font-size:14px; margin-bottom:5px;">CUADRO<br></h6>
                            <select class="select white-gradient check-list" multiple>
                                <option selected='selected'>
                                    Todos
                                </option>
                                <option>
                                    Cuadro 047
                                </option>
                                <option>
                                    Cuadro 048
                                </option>
                                <option>
                                    Cuadro 153
                                </option>
                            </select>

                    </div>
                           
                    <div class="two-columns" style="margin-left:150px;">
                            <h6 style="font-size:14px; margin-bottom:5px;">ESTADO<br></h6>
                            <select class="select white-gradient check-list" multiple>
                                <option selected='selected'>
                                    Todos
                                </option>
                                <option>
                                    Activas
                                </option>
                                <option>
                                    En comprobación
                                </option>
                                <option>
                                    Solucionadas
                                </option>
                            </select>

                    </div>

                    <div class="new-row two-columns"  style="margin-left:50px; margin-top:30px;">
                            <h6 style="font-size:14px; margin-bottom:5px;">PERIODO<br></h6>
                            <select class="select white-gradient check-list" multiple>
                                <option selected='selected'>
                                    (A) Día
                                </option>
                                <option>
                                    (B) Mes
                                </option>
                                <option>
                                    (C) Desde - Hasta
                                </option>
                            </select>

                    </div>
                            
                    <div class="four-columns"  style="margin-left:150px; margin-top:30px;">
                            <h6 style="font-size:14px; margin-bottom:5px;">Periodo A<br></h6>
                            <p class="button-height">
                                <span class="input">
                                    <label class="button blue-glossy">Día</label>
                                    <input type="text" class="input-unstyled" value="2014-06-20">
                                    <span class="icon-calendar"></span>
                                </span>
                            </p>
                            <br>
                            
                            <h6 style="font-size:14px; margin-bottom:5px;">Periodo B<br></h6>
                            <p class="button-height">
                                <select class="select check-list">
                                	<option value='2004' selected>2014</option>
                                </select>
                                &nbsp;
                                <select class="select check-list">
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6" selected>Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </p>
                            <br>
                            
                            <h6 style="font-size:14px; margin-bottom:5px;">Periodo C<br></h6>
                            <p class="button-height">
                                <span class="input">
                                    <label class="button blue-glossy">Desde</label>
                                    <input type="text" class="input-unstyled" value="2014-06-14">
                                    <span class="icon-calendar"></span>
                                </span>
                                <br>
                                <span class="input">
                                    <label class="button blue-glossy">Hasta&nbsp;</label>
                                    <input type="text" class="input-unstyled" value="2014-06-20">
                                    <span class="icon-calendar"></span>
                                </span>
                            </p>
                    </div> 
                    
                  	<div class="new-row ten-columns">
                          <h3 class="thin underline">&nbsp;</h3>
                    </div> 
                    
                    <div class="new-row four-columns" style="margin-left:50px;">
                    	<button type="submit" class="button glossy">
								<span class="button-icon green-gradient"><span class="icon-pages"></span></span>
								Generar PDF&nbsp;&nbsp;
						</button>
                    </div>

				</div>
                
                
            </div>                                  

<!-- Pantalla principal Fin -->


			

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->

    <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">	
        <li><a href="panel_control_principal.php" class="shortcut-dashboard" title="Panel de control principal">Panel de control principal</a></li>
        <li class="current"><a href="panel_alarmas.php" class="shortcut-notes" title="Alarmas">Alarmas</a></li>
        <li><a href="panel_precio_energia_redirect.php" class="shortcut-stats" title="Precio energía">Precio energía</a></li>
        <li><a href="panel_mapa_luminico.php" class="shortcut-messages" title="Mapa lumínico">Mapa lumínico</a></li>     
        <li><a href="panel_usuarios.php" class="shortcut-contacts" title="Gestión de usuarios">Gestión de usuarios</a></li>
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
					<li><a href="panel_alarmas.php">Activas</a></li>
                    <li class="with-right-arrow"><a href="panel_alarmas_historicos_completo.php">Históricos</a></li>
                    <li><a href="#" class="current navigable-current">Informes</a></li> 
                    <li><a href="panel_alarmas_configuracion.php">Configuración</a></li>      
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
				{ 'bSortable': false, 'aTargets': [ 1, 2, 3, 4, 5 ] }
			],
			'aaSorting': [[ 0, "desc" ]],
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