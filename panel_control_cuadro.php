<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vNumCuadro = $_SESSION["k_numCuadro"];
	
	/*function quitarAcentos($string){
		return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ', 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
	}*/
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
				Panel de control Cuadro <? echo $vNumCuadro; ?>
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
                
                <!-- Contenido de los cuadros modales de informacón  style="display:none"-->
				<div class="content gradient_mapa rounded light shadow">  
                
                	<?
					$BDCuadros = mysql_query("SELECT * FROM tCuadros WHERE cuaNumero=$vNumCuadro");
					$rowBDCuadros = mysql_fetch_array($BDCuadros);
					?>                       
                        <div class="vevent">
                            <a href="#spinaltap" class="url summary">Localización cuadro</a>
                            <span class="zona"><? echo $rowBDCuadros['cuaZona']; ?></span>
                            <div class="location vcard">
                                <span class="geo">
                                    <span class="latitude">
                                        <span class="value-title" title="<? echo $rowBDCuadros['cuaLatitude']; ?>" ></span>
                                    </span>
                                    <span class="longitude">
                                        <span class="value-title" title="<? echo $rowBDCuadros['cuaLongitude']; ?>"></span>
                                    </span>
                                    <span class="icono">
                                        <span class="value-title" title="img/proyecto/iconos/icoCuadro<? echo $vNumCuadro; ?>.png" ></span>
                                    </span>
                                    <span class="tipo">
                                        <span class="value-title" title="" ></span>
                                    </span>                                                                 
                                </span>                             
                           </div>
                        </div> 
                        
                    <script type="text/javascript">
                    	var tipo = new Array();
						var images = new Array();
                    </script> 
                    <?
					$BDUsuarios = mysql_query("SELECT * FROM tUsuarios WHERE usuIdUsuario=$vIdUsuario");
					$rowBDUsuarios = mysql_fetch_array($BDUsuarios);
					$vServ1 = $rowBDUsuarios['usuServiciosAlumbrado']; $vServ2 = $rowBDUsuarios['usuServiciosRiego'];
					$vServ3 = $rowBDUsuarios['usuServiciosAccesos']; $vServ4 = $rowBDUsuarios['usuServiciosIndicadores'];
										
					$listaServicios = array(); $i = 0;
					$listaServiciosIndicadores = array(); $listaClassIndicadores = array(); $listaLinksIndicadores = array(); $iIndicadores = 0;
					
					$BDCuadrosServicios = mysql_query("SELECT * FROM tCuadrosServicios 
																WHERE cuaserNumero=$vNumCuadro 
																AND ((cuaserServiciosAlumbrado=$vServ1 AND cuaserServiciosAlumbrado=1)
																	OR (cuaserServiciosRiego=$vServ2 AND cuaserServiciosRiego=1)
																	OR (cuaserServiciosAccesos=$vServ3 AND cuaserServiciosAccesos=1)
																	OR (cuaserServiciosIndicadores=$vServ4 AND cuaserServiciosIndicadores=1))
																ORDER BY cuaserOrden");
					while($rowBDCuadrosServicios = mysql_fetch_array($BDCuadrosServicios)) {
						if (in_array($rowBDCuadrosServicios['cuaserTipo'], $listaServicios) == false) {
							$listaServicios[$i] = $rowBDCuadrosServicios['cuaserTipo'];
							echo "<script>tipo[".$i."]='".$rowBDCuadrosServicios['cuaserTipo']."';</script>";
							if ($rowBDCuadrosServicios['cuaserTipo'] == "Indicadores") 
								echo "<script>images[".$i."]='img/proyecto/iconos/icoIndicadores.png';</script>";
							else 
						 		echo "<script>images[".$i."]='img/proyecto/iconos/".$rowBDCuadrosServicios['cuaserIcono']."';</script>";
							$i++;
						}
						if ($rowBDCuadrosServicios['cuaserTipo'] == "Indicadores") {
							if (in_array($rowBDCuadrosServicios['cuaserSubTipo'], $listaServiciosIndicadores) == false) {
								$listaServiciosIndicadores[$iIndicadores] = utf8_encode($rowBDCuadrosServicios['cuaserSubTipo']);
								$listaClassIndicadores[$iIndicadores] = quitarEspacios(utf8_encode($rowBDCuadrosServicios['cuaserSubTipo']));
								$listaSinFormatoIndicadores[$iIndicadores] = $rowBDCuadrosServicios['cuaserSubTipoSinFormato'];
								$iIndicadores++;
							}
						}
					?>
                        <div class="vevent">
                            <a href="#spinaltap" class="url summary">
                            	<? echo $rowBDCuadrosServicios['cuaserTipo']; ?>
                                <? if ($rowBDCuadrosServicios['cuaserSubTipo']!="") echo "(".utf8_encode($rowBDCuadrosServicios['cuaserSubTipo']).")"; ?>
                            </a>
                            <span class="zona"><? echo $rowBDCuadrosServicios['cuaserZona']; ?></span>
                            <div class="location vcard">
                                <span class="geo">
                                    <span class="latitude">
                                        <span class="value-title" title="<? echo $rowBDCuadrosServicios['cuaserLatitud']; ?>" ></span>
                                    </span>
                                    <span class="longitude">
                                        <span class="value-title" title="<? echo $rowBDCuadrosServicios['cuaserLongitud']; ?>"></span>
                                    </span>
                                    <span class="icono">
                                        <span class="value-title" title="img/proyecto/iconos/<? echo $rowBDCuadrosServicios['cuaserIcono'].".png"; ?>" ></span>
                                    </span>
                                    <span class="tipo">
                                        <span class="value-title" title="<? echo $rowBDCuadrosServicios['cuaserTipo']; ?>" ></span>
                                    </span>                                                                 
                                </span>                             
                           </div>
                        </div>                     											
					<?
					}
					?>
				
			</article>
		</div>

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>    <!-- Street -->      
		<script type="text/javascript" src="mapa/js/underscore-1.2.2/underscore.min.js"></script>
		<script type="text/javascript" src="mapa/js/backbone-0.5.3/backbone.min.js"></script>
		<script type="text/javascript" src="mapa/js/prettify/prettify.min.js"></script>
		<script type="text/javascript" src="mapa/js/demo.js"></script>
		<script type="text/javascript" src="mapa/ui/jquery.ui.map.js"></script>
		<script type="text/javascript" src="mapa/ui/jquery.ui.map.services.js"></script>	<!-- Street -->  
		<script type="text/javascript" src="mapa/ui/jquery.ui.map.microformat.js"></script>  <!-- Street -->      
        <script type="text/javascript" src="mapa/ui/jquery.ui.map.overlays.js"></script>  
		<script type="text/javascript">
			
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
						'callback': function() {

						var self = this;
						self.microformat('.vevent', function(result, item, index) {
							var clone = $(item).clone().addClass('ui-dialog-vevent').append('<div id="streetview{0}" class="streetview"></div>'.replace('{0}', index));
							var latlng = new google.maps.LatLng(result.location[0].geo[0].latitude['value-title'], result.location[0].geo[0].longitude['value-title']);

							self.addMarker( {
								'bounds':true, 
								'position': latlng, 
								'title': result.zona,
								'icon': result.location[0].geo[0].icono['value-title'],
								'tags': result.location[0].geo[0].tipo['value-title']
								},
								function(map, marker) {
									$(item).find('.summary').click( function() {
										$(marker).triggerEvent('click');
										return false;
										});
								/*
								$(item).mouseover(function() {
									self.get('map').panTo(marker.getPosition());
								});
								*/
								}
							).click(function() {
								self.get('map').panTo( 
									$(this)[0].getPosition());
									$(clone).dialog({ 
										'modal': true, 
										'width': 530, 
										'title': result.titulo, 
										'resizable': false, 
										'draggable': false 
									});
								self.displayStreetView('streetview{0}'.replace('{0}', index), { 'position': $(this)[0].getPosition() });
							});
						});
					}});
				}).load();
				
				 					
				$('#map_canvas').gmap('addControl', 'radios', google.maps.ControlPosition.TOP_LEFT);
				
				/*var images = ['img/proyecto/iconos/icoAlumbrado.png', 'img/proyecto/iconos/icoRiego.png', 'img/proyecto/iconos/icoAccesos.png', 'img/proyecto/iconos/icoIndicadores.png'];
				var tipo = ['Alumbrado', 'Riego', 'Accesos', 'Indicadores'];*/

				$.each(tipo, function(i, tag) {
					$('#radios').append(('<label style="margin-right:5px;display:block;height:30px;"><img src="' + images[i] + '" height="17px" alt="" style="border:none; vertical-align:bottom;"/>&nbsp;&nbsp;<input type="checkbox" style="margin-right:3px;" value="{0}"/>{1}</label>').format(tag, tag));
				});	
				
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
				
				
				<!-- Areas de los cuadros -->
				
				var area=[];
				var i=0;
				<?
				$BDCuadrosAreas = mysql_query("SELECT * FROM tCuadrosAreas WHERE cuaareNumero=$vNumCuadro ORDER BY cuaareOrden");
				while($rowBDCuadrosAreas = mysql_fetch_array($BDCuadrosAreas)) {	
				?>				
					area[i] = new google.maps.LatLng(<? echo $rowBDCuadrosAreas['cuaareLatitude']; ?>,<? echo $rowBDCuadrosAreas['cuaareLongitude']; ?>);
					i++;
				<?
				}
				?>
			
				$('#map_canvas').gmap('addShape', 'Polygon', { 
					'strokeColor': "#<? echo $rowBDCuadros['cuaColor']; ?>", 
					'strokeOpacity': 0.8, 
					'strokeWeight': 2, 
					'fillColor': "#<? echo $rowBDCuadros['cuaColor']; ?>",  
					'fillOpacity': 0.35, 
					'path': area
				});	
																		
			});	

        </script>        
<!-- Mapa Fin -->


			

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->
    
	<?
		include("panel_control_cuadro_opciones.php");
	?>  

	
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
                    <li class="with-left-arrow"><a href="panel_control_principal.php">&nbsp;&nbsp;&nbsp;Panel Principal</a></li> 
                </ul>
                <br>
            </section>
            <section class="navigable">                   
                <ul class="big-menu">
                	<?
					for ($i=0;$i<sizeof($listaServicios);$i++) {
						switch ($listaServicios[$i]) {
							case "Alumbrado":
									?>
                                    <li class="with-right-<? echo $listaServicios[$i]; ?>">
                                        <a href="panel_control_cuadro_alumbrado.php"><? echo $listaServicios[$i]; ?></a>
                                    </li>                                       
									<?
									break;
									
							case "Riego":
									?>
                                    <li class="with-right-<? echo $listaServicios[$i]; ?>">
                                        <a href="panel_control_cuadro_riego.php"><? echo $listaServicios[$i]; ?></a>
                                    </li>                                       
									<?
									break;	
									
							case "Accesos":
									?>
                                    <li class="with-right-<? echo $listaServicios[$i]; ?>">
                                        <a href="panel_control_cuadro_accesos.php"><? echo $listaServicios[$i]; ?></a>
                                    </li>                                       
									<?
									break;
									
							case "Indicadores":
									?>
                                    <li>
                                        <span class="with-right-<? echo $listaServicios[$i]; ?>"><? echo $listaServicios[$i]; ?></span>
                                        <ul class="big-menu">
                                            <?
                                            for ($x=0;$x<sizeof($listaServiciosIndicadores);$x++) {
                                            ?>
                                                <li class="with-right-Indicadores<? echo $listaClassIndicadores[$x]; ?>">
                                                    <a href="panel_control_cuadro_indicadores_redirect.php?ind=<? echo $listaServiciosIndicadores[$x]."&indSin=".$listaSinFormatoIndicadores[$x]; ?>">
														<? echo $listaServiciosIndicadores[$x]; ?>
                                                    </a>
                                                </li>
                                            <?
                                            }
                                            ?>
                                        </ul>
                                    </li>                                         
									<?
									break;									
						}
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