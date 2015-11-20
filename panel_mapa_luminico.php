<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vZona = $_SESSION['k_mapa_luminico_zona'];
	$vAuxZonaDescripcion = "Zona Eibar";

	include("inc/conectar.php");
	
	if ($vZona != "") {
		$BDZonas = mysql_query("SELECT * FROM tMapaLuminicoZonas WHERE zonaZona='$vZona'");
		$rowBDZonas = mysql_fetch_array($BDZonas);	
		$vAuxZonaDescripcion = "Zona ".utf8_encode($rowBDZonas['zonaDescripcion']);
	}

	function quitarEspacios($string){
		return str_replace(' ', '', $string);
	}
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
    <link rel="stylesheet" href="css/styles/dashboard.css?v=1">

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
   
<!-- Mapa Inicio -->
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" /> 
		<link type="text/css" rel="stylesheet" href="mapa/css/960/min/960_16_col.css" />
		
		
		<link type="text/css" rel="stylesheet" href="mapa/css/style_mapa.css" />
		<!-- <script type="text/javascript" src="mapa/js/modernizr-2.0.6/modernizr.min.js"></script>  --> 
<!-- Mapa Fin --> 

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts 
	<script src="js/libs/jquery-1.8.2.min.js"></script> -->
    <script type="text/javascript" src="mapa/js/jquery-1.7.1/jquery.min.js"></script>

	<!-- Template functions -->
	<script src="js/developr.input.js"></script>
	<script src="js/developr.navigable.js"></script>
	<script src="js/developr.notify.js"></script>
	<script src="js/developr.scroll.js"></script>
	<script src="js/developr.tooltip.js"></script>
	<script src="js/developr.table.js"></script> 
   
</head>

<body class="clearfix with-menu with-shortcuts">

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
				Mapa lumínico Eibar (Demo) . <span class="orange"><? echo $vAuxZonaDescripcion; ?></span>
			</p>
			<br><br>
            
<!-- Mapa Inicio -->

<div class="container_16">
			<article class="grid_16">
            
            	<!-- Cuadro contenedor del mapa -->
 				<div class="item rounded light">
					<div id="map_canvas" class="map rounded"></div>
				</div> 
                  
                <!-- Cuadro izquierdo con checkbox -->
				<div id="radios" class="item gradient_mapa rounded shadow" style="margin:5px;padding:5px 5px 5px 10px;"></div> 
				<!--<div id="tipo-control" class="item gradient rounded shadow" style="margin:5px;padding:5px 5px 5px 10px;">
					<label style="color:#555;font-size:12px; font-weight:bold;" for="tipo">Filter by tag</label>
					<select id="tipo" style="outline:none;"></select>
				</div>-->


				
			</article>
		</div>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>    <!-- Street -->      
		<script type="text/javascript" src="mapa/js/underscore-1.2.2/underscore.min.js"></script>
		<script type="text/javascript" src="mapa/js/backbone-0.5.3/backbone.min.js"></script>
		<script type="text/javascript" src="mapa/js/prettify/prettify.min.js"></script>
		<script type="text/javascript" src="mapa/js/demo.js"></script>
		<script type="text/javascript" src="mapa/ui/jquery.ui.map.js"></script>
		<!-- <script type="text/javascript" src="mapa/ui/jquery.ui.map.services.js"></script>	Street -->  
		<!--<script type="text/javascript" src="mapa/ui/jquery.ui.map.microformat.js"></script>   Street -->      
        <script type="text/javascript" src="mapa/ui/jquery.ui.map.overlays.js"></script>  
		<script type="text/javascript">
		
		<?
			if ($vZona!="")
				$BDZonas = mysql_query("SELECT AVG(lectLatitud), AVG(lectLongitud) FROM tMapaLuminicoLecturas WHERE lectZona='$vZona'");
			else
				$BDZonas = mysql_query("SELECT AVG(lectLatitud), AVG(lectLongitud) FROM tMapaLuminicoLecturas");
				
			$rowBDZonas = mysql_fetch_array($BDZonas);
			$vLat = $rowBDZonas[0]; $vLon = $rowBDZonas[1];
		?>
			
            $(function() { 
				demo.add(function() {
					
					$('#map_canvas').gmap({ 
						'disableDefaultUI':false,
						'panControl': false,				// 'Joystick' para poder moverse por el mapa
						'zoomControl': false,				// Barra para modificar el zoom
						'scaleControl': false,				// Indicador de la escala del mapa				
						'streetViewControl': false,			// 'Hombrecillo naranja' para street view
						'overviewMapControl': true,			// Cuadro 'oculto' con visión más amplia del mapa (abajo a la derecha)
						'mapTypeControl': true,				// Selección de tipo de mapa (Mapa, Satélite)			
						'mapTypeId': google.maps.MapTypeId.SATELLITE,
						<?
							if ($vZona!="") {
						?>
								'zoom': 18,
						<?
							} else {
						?>
								'zoom': 15,
						<?
							}
						?>
						'center': new google.maps.LatLng(<? echo $vLat; ?>, <? echo $vLon; ?>)
						})
						.bind('init', function(evt, map) {
							$('#map_canvas').gmap('addControl', 'radios', google.maps.ControlPosition.TOP_LEFT);
							var images = ['img/colores/01.png', 'img/colores/02.png', 'img/colores/03.png', 'img/colores/04.png', 'img/colores/05.png', 'img/colores/06.png', 'imgs/colores/07.png', 'img/colores/08.png', 'img/colores/09.png'];
							var tags = ['0 - 35 lux', '35 - 70 lux', '70 - 100 lux', '100 - 135 lux', '135 - 170 lux', '170 - 200 lux', '200 - 235 lux', '235 - 270 lux', '270 - 300 lux'];
							var tags_color = ['#FFC', '#FF9', '#FF0', '#FC0', '#F90', '#F60', '#F00', '#C00', '#900'];		

							$.each(tags, function(i, tag) {
							$('#radios').append(('<label style="margin-right:5px;display:block;"><input type="checkbox" style="margin-right:3px" value="{0}"/>&nbsp;&nbsp;<span style="background-color:' + tags_color[i] + '" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp; {1} </label>').format(tag, tag));

						$('input:checkbox').click(function() {
							$('#map_canvas').gmap('closeInfoWindow');
							$('#map_canvas').gmap('set', 'bounds', null);
							var filters = [];
							$('input:checkbox:checked').each(function(i, checkbox) {
								filters.push($(checkbox).val());
							});
							
							if ( filters.length > 0 ) {
								$.each($('#map_canvas').gmap('get', 'markers'), function(i, marker) {
									$('#map_canvas').gmap('addBounds', marker.position);
									if (jQuery.inArray(marker.tags,filters) != -1) 
										marker.setVisible(true); 
									else
										marker.setVisible(false); 	
								});								
							} else {
								$.each($('#map_canvas').gmap('get', 'markers'), function(i, marker) {
									$('#map_canvas').gmap('addBounds', marker.position);
									marker.setVisible(true); 
								});
							}
						});								

			});
							
            <?
				if ($vZona!="")
					$BDZonas = mysql_query("SELECT * FROM tMapaLuminicoLecturas WHERE lectZona='$vZona'");
				else
					$BDZonas = mysql_query("SELECT * FROM tMapaLuminicoLecturas");
				
				while($rowBDZonas = mysql_fetch_array($BDZonas)) {
					$valor = $rowBDZonas['lectValor'];
					switch ($valor) {
						case ($valor <= 35):
								$rango = 0;
								break;
						case ($valor <= 70):
								$rango = 1;
								break;
						case ($valor <= 100):
								$rango = 2;
								break;
						case ($valor <= 135):
								$rango = 3;
								break;
						case ($valor <= 170):
								$rango = 4;
								break;
						case ($valor <= 200):
								$rango = 5;
								break;
						case ($valor <= 235):
								$rango = 6;
								break;
						case ($valor <= 270):
								$rango = 7;
								break;
						case ($valor <= 300):
								$rango = 8;
								break;
					}
			?>	
				$('#map_canvas').gmap('addMarker', {
                	'icon': images[<? echo $rango; ?>],
                    'tags': tags[<? echo $rango; ?>],
                    'bound':true,
					'title':'<? echo $rowBDZonas['lectValor']." lux"; ?>',
                    'position': new google.maps.LatLng(<? echo $rowBDZonas['lectLatitud']; ?>, <? echo $rowBDZonas['lectLongitud']; ?>)
                    } )/*
					.click(function() {
						$('#map_canvas').gmap('openInfoWindow', {'content': 'ccccccccccccccc'}, this);
					});*/
            <?
				}
			?>							

					});
				}).load();
														
			});	

        </script>        
<!-- Mapa Fin -->


			

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->

    <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">	
        <li><a href="panel_control_principal.php" class="shortcut-dashboard" title="Panel de control principal">Panel de control principal</a></li>
        <li><a href="panel_alarmas.php" class="shortcut-notes" title="Alarmas">Alarmas</a></li>
        <li><a href="panel_precio_energia_redirect.php" class="shortcut-stats" title="Precio energía">Precio energía</a></li>
        <li class="current"><a href="panel_mapa_luminico.php" class="shortcut-messages" title="Mapa lumínico">Mapa lumínico</a></li>    
		<?
        if ($_SESSION["k_admin"]) {
        ?>    
            <li><a href="panel_usuarios.php" class="shortcut-contacts" title="Gestión de usuarios">Gestión de usuarios</a></li>
		<?
        }
        ?>            
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
                <ul class="big-menu_back">
                    <li><a href="panel_mapa_luminico_redirect.php"
							<?
                                if ($vZona == "") {
                            ?>
                                    class="current navigable-current"
                            <?
                                }
                            ?>                    		
                            >
                            &nbsp;&nbsp;&nbsp;Eibar
                        </a>
                    </li> 
                </ul>
                <br>
            </section>
            <section class="navigable">                   
                <ul class="big-menu">
                	<?
					$BDZonas = mysql_query("SELECT * FROM tMapaLuminicoZonas");
					while($rowBDZonas = mysql_fetch_array($BDZonas)) {					
						?>
						<li>
							<a href="panel_mapa_luminico_redirect.php?zona=<? echo $rowBDZonas['zonaZona']; ?>"
                            	<?
									if ($vZona == $rowBDZonas['zonaZona']) {
								?>
                            	 		class="current navigable-current"
                                <?
									}
								?>
                            	>
								<? echo utf8_encode($rowBDZonas['zonaDescripcion']); ?>
                            </a>
						</li> 
                        <?                                      
					}
					?>
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
    
	<!-- Scripts -->
	<script src="js/setup.js"></script>          
</body>
</html>