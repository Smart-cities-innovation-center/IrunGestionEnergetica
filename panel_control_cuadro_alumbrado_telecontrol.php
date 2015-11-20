<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vNumCuadro = $_SESSION["k_numCuadro"];
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
    <link rel="stylesheet" href="css/styles/modal.css?v=1">
	<link rel="stylesheet" href="css/styles/progress-slider.css?v=1">   
    
	<!-- DataTables -->
	<link rel="stylesheet" href="js/libs/DataTables/jquery.dataTables.css?v=1">   
    <link rel="stylesheet" href="js/libs/google-code-prettify/sunburst.css?v=1">  
	    
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

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> -->
    
	<!-- JavaScript at the bottom for fast page loading -->

	<!-- glDatePicker -->
	<link href="js/libs/newGlDatePicker/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
    <link href="js/libs/newGlDatePicker/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
	<!-- Scripts -->
	<script src="js/libs/jquery-1.8.2.min.js"></script>    
	<script src="js/setup.js"></script>

	<!-- Template functions -->
	<script src="js/developr.input.js"></script>
	<script src="js/developr.navigable.js"></script>
	<script src="js/developr.notify.js"></script>
	<script src="js/developr.scroll.js"></script>
	<script src="js/developr.tooltip.js"></script>
	<script src="js/developr.tabs.js"></script>
	<script src="js/developr.table.js"></script>
    <script src="js/developr.tooltip.js"></script>
    <script src="js/developr.modal.js"></script>

    
	<script language="javascript">
        function iniciarPeticion(id, estado) {
			$.ajax ({
				url: 'panel_control_cuadro_alumbrado_telecontrol_peticion.php',
				type: 'POST',
				data: {id: id, estado: estado}
			})
		}
		
        function iniciarRegulacion(id) {
			regulador = document.getElementById('fPorcPotencia-' + id).value;
			$.ajax ({
				url: 'panel_control_cuadro_alumbrado_telecontrol_peticion_regulacion.php',
				type: 'POST',
				data: {id: id, regulador: regulador}
			})
		}	
		
        function iniciarAutoManual(estado) {
			$.ajax ({
				url: 'panel_control_cuadro_alumbrado_telecontrol_peticion_automanual.php',
				type: 'POST',
				data: {estado: estado}
			})
		}			
	</script>
    
    <script>	
		function openModal(ref, dir, est) {
			$.modal({
				title: 'Modificación de estado',
				content: 'El estado de la luminaria con Id <strong>' + ref + '</strong><br>' 
						 + 'situada en <strong>' + dir + '</strong><br>'
						 + ' ha sido establecido en <strong class="<? if ($_GET['est'] == 1) echo "green"; else echo "red"; ?>">' + est + '</strong>',
				buttonsAlign: 'center',
				buttons: {
							'&nbsp;&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;&nbsp;' : {
								classes :	'blue-gradient',
								click :		function(modal) { modal.closeModal(); }
							}
						}
			});
		};
	
	</script>
    
	<!-- Actualización de estado -->   
	<script type="text/javascript">
		function actualizar(){
			$('#divActualiza').load('panel_control_cuadro_alumbrado_telecontrol_actualiza.php?'+new Date().getTime()).fadeIn("slow");
		}
		window.setInterval( actualizar, 10000 );
    </script>
   
</head>

<body class="clearfix with-menu with-shortcuts" onLoad="actualizar(); ">
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
				Panel de control Cuadro <? echo $vNumCuadro; ?> . Alumbrado . <span class="orange">Telecontrol - Regulación</span>
      		</p>
			<br>
            
<!-- Pantalla principal Inicio -->

        <br><br>
        
        	<div id="container">

				<div id="form-block">
				<form action="javascript:void(0);" id="formPeticion" name="formPeticion" title="">
                    <div id="divActualiza">
                    
                    </div>
				</form> 
                <br />

                <?
					//if ($vNumCuadro == "048") {
				?>
                        <!--<br>
                        Pantalla provisional para comprobación de Encendido/Apagado
                        <br>
                            <object type="text/html"
                                data="http://camara-irun.dyndns.org"
                                width="950" height="900"
                                style="border:0px; text-align:center;">
                            </object>
                        <br><br>-->
                <?
					//}
                ?>
		</div>
        </div>
<!-- Pantalla principal Fin -->


			

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
                    <li class="with-left-arrow"><a href="panel_control_cuadro_alumbrado.php">&nbsp;&nbsp;&nbsp;Cuadro <? echo $vNumCuadro;?> - Alumbrado</a></li> 
                </ul>
                <br>
            </section>
            <section class="navigable">                   
                <ul class="big-menu">
                    <li><a href="lecturas_redirect.php">Lecturas</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_estado.php">Estado monitorizadas</a></li>
                    <li><a href="#" class="current navigable-current">Telecontrol - Regulación</a></li>
                    <li><a href="#">Alarmas</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_configuracion.php">Configuración</a></li>
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
		/*if ($_GET['vId'] != "") {
			$vIdLampara = $_GET['vId'];
			$result = mysql_query("SELECT * FROM tCuadrosLamparas WHERE cualamId='$vIdLampara'");
			$row = mysql_fetch_array($result);
			$vNumRef = $row['cualamNumRef'];
			$vDireccion = $row['cualamDireccion'];
			if ($_GET['est'] == 1) 
				$vEstado = "ON";
			else 
				$vEstado = "OFF";
		?>
			<script languaje="javascript">
                openModal('<? echo $vNumRef; ?>', '<? echo utf8_encode($vDireccion); ?>', '<? echo $vEstado; ?>');
            </script>
		<?		
		}*/
	?>
 
	<?
		include("inc/desconectar.php");
	?>  
 	<!-- JavaScript at the bottom for fast page loading -->



	<!-- Plugins -->
	<script src="js/libs/jquery.tablesorter.min.js"></script>
	<script src="js/libs/DataTables/jquery.dataTables.min.js"></script>
    	
	<!-- Google code prettifier -->
	<script src="js/libs/google-code-prettify/prettify.js?v=1"></script>

	<script src="js/developr.progress-slider.js"></script>

	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Progress
		$('.demo-progress').progress();

		// Slider
		$('.demo-slider').slider();

		// Buttons to change progress value
		$(document).on('click', '.progress-controls button', function(event)
		{
			$(this).parent().parent().find('.demo-progress').setProgressValue($(this).text());
		});

	</script>


	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Code display
		prettyPrint();
				
	

		// Table sort - DataTables
		var table = $('#sorting-advanced');
		table.dataTable({
			'aoColumnDefs': [
				{ 'bSortable': false, 'aTargets': [  ] }
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