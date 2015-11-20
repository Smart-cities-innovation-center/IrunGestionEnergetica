<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}

	$vIdUsuarioModif = $_GET['id'];
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

	<!-- jQuery Form Validation -->
	<link rel="stylesheet" href="js/libs/formValidator/developr.validationEngine.css?v=1">

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
		$bdUsuarios = mysql_query("SELECT * FROM tUsuarios WHERE usuIdUsuario=$vIdUsuarioModif");
		$rowUsuarios = mysql_fetch_array($bdUsuarios);
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
				Gestión de usuarios . Usuarios . <span class="orange">Modificar</span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->
			<div class="with-padding"><form method="post" action="panel_usuarios.php" id="form-login" title="">
            	<div class="columns">
                
                    <div class="new-row seven-columns">
                        <h3 class="thin underline">Información del usuario</h3>
                        
                        <p class="inline-medium-label button-height">
                            <label for="fNombre" class="label">Nombre</label>
                            <input type="text" name="fNombre" id="fNombre" class="input full-width validate[required]" 
                            	value="<? echo $rowUsuarios['usuNombre']; ?>">
                        </p> 
                        
                        <p class="inline-medium-label button-height">
                            <label for="fLogin" class="label">Login</label>
                            <input type="text" name="fLogin" id="fLogin" class="input validate[required]" 
             					value="<? echo $rowUsuarios['usuUsuario']; ?>">
                        </p> <!-- class="input validate[required,minSize[4],maxSize[40]]"  -->
                        
                        <p class="inline-medium-label button-height">
                            <label for="fPassword" class="label">Password</label>
                            <input type="text" name="fPassword" id="fPassword" class="input validate[required]" 
                            	value="<? echo $rowUsuarios['usuPassword']; ?>">
                        </p>  <!-- class="input validate[required,minSize[6],maxSize[12]]"  -->  
                        
                        <p class="inline-medium-label button-height">
                            <label for="fEmail" class="label">Email</label>
                            <input type="text" name="fEmail" id="fEmail" class="input full-width validate[required,custom[email]]" 
                            	value="<? echo $rowUsuarios['usuEmail']; ?>">
                        </p>                         
                        
                        <p class="inline-medium-label button-height">
                            <label for="fAdministrador" class="label">Es administrador?</label>
                            <input type="checkbox" name="fAdministrador" id="fAdministrador" class="switch medium wider mid-margin-left" 
                                value=<? echo $rowUsuarios['usuAdministrador']; ?> 
                                <? if ($rowUsuarios['usuAdministrador']) { echo "checked"; } ?>
								data-text-on="Sí" data-text-off="No"> 
                        </p>

                        <p class="inline-medium-label button-height">
                            <label for="fEstado" class="label">Estado</label>
                            <input type="checkbox" name="fEstado" id="fEstado" class="switch medium wider mid-margin-left" 
                                value=<? echo $rowUsuarios['usuEstado']; ?> 
                                <? if ($rowUsuarios['usuEstado']) { echo "checked"; } ?>
								data-text-on="Activado" data-text-off="Desactivado"> 
                        </p>
                        
                        
						<p class="inline-medium-label button-height">
                        	<label for="fServicios" class="label">Con acceso a...</label>
							<select class="select multiple white-gradient easy-multiple-selection check-list" 
                            	name="fServicios" id="fServicios" multiple>
								<option value="1" <? if ($rowUsuarios['usuServiciosAlumbrado']==1) echo "selected='selected'"; ?>>
                                	Alumbrado
                                </option>
								<option value="1" <? if ($rowUsuarios['usuServiciosRiego']==1) echo "selected='selected'"; ?>>
                                	Riego
                                </option>
								<option value="1" <? if ($rowUsuarios['usuServiciosAccesos']==1) echo "selected='selected'"; ?>>
                                	Accesos
                                </option>
								<option value="1" <? if ($rowUsuarios['usuServiciosIndicadores']==1) echo "selected='selected'"; ?>>
                                	Indicadores
                                </option>
							</select>
						</p>                        
                    
                    </div>
                    
                    
                    <div class="five-columns">
                    	<br><br><br><br><br>
						<div class="field-block button-height">

							<button type="submit" class="button glossy">
								<span class="button-icon"><span class="icon-tick"></span></span>
								Guardar&nbsp;&nbsp;
							</button>
							<br><br>
							<button type="submit" class="button glossy">
								<span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>
								Cancelar
							</button>

						</div>                    
                    
                    </div> 
                </div>  
                </form>                                                                            
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
					<li><a href="panel_usuarios.php" class="current navigable-current">Usuarios</a></li>
                    <li><a href="panel_usuarios_entradas.php">Entradas al sistema</a></li>       
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
    
	<!-- jQuery Form Validation -->
	<script src="js/libs/formValidator/jquery.validationEngine.js?v=1"></script>
	<script src="js/libs/formValidator/languages/jquery.validationEngine-es.js?v=1"></script>

	<script>

		// Call template init (optional, but faster if called manually)
		$.template.init();

		// Form validation
		$('form').validationEngine();

	</script>
</body>
</html>