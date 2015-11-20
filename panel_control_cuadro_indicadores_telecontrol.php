<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vNumCuadro = $_SESSION["k_numCuadro"];
	$vIndicadorSel = $_SESSION["k_indicador_sel"];
	$vIndicadorSelSinFormato = $_SESSION["k_indicador_sel_sinFormato"];
?>

<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
	<meta charset="utf-8">

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
			document.forms.formPeticion.action = "panel_control_cuadro_indicadores_telecontrol_peticion.php?id=" + id + "&estado=" + estado;
			document.formPeticion.submit();
		}
	</script>
    <script>	
		function openModal(ref, dir, est, tipo) {
			$.modal({
				title: 'Modificación de estado',
				content: 'El estado del indicador (' + tipo + ') con Id <strong>' + ref + '</strong><br>' 
						 + 'situado en <strong>' + dir + '</strong><br>'
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
				Panel de control Cuadro <? echo $vNumCuadro; ?> . Indicadores . Telecontrol . <span class="orange"><? echo $vIndicadorSel; ?></span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->

        <br><br>

		<?
            $bdCuadrosIndicadoresTel = mysql_query("SELECT * FROM tCuadrosIndicadoresTelecontrol
                                        WHERE cuaindtelNumero=$vNumCuadro
										AND cuaindtelSubTipoSinFormato='$vIndicadorSelSinFormato'");
            $vCant = mysql_num_rows($result);
            $rowCuaIndTel = mysql_fetch_array($bdCuadrosIndicadoresTel);
			$auxCuaIdIndicador = $rowCuaIndTel['cuaindtelCuaIdIndicador'];
			$auxEstado = $rowCuaIndTel['cuaindtelEstado'];
			$auxCanalEstado = $rowCuaIndTel['cuaindtelCanalEstado'];
			
			if ($auxCanalEstado!=0) {
				$vEstacion = "Hondarribi_".$vNumCuadro;
				$bdValores = mysql_query("SELECT * FROM tValores
											WHERE valEstacion='$vEstacion'
											AND valCanal=$auxCanalEstado");
				$rowValores = mysql_fetch_array($bdValores);
				$auxEstado = $rowValores['valDato'];
			}			
			
			$bdCuaIndicadores = mysql_query("SELECT * FROM tCuadrosIndicadores
										WHERE cuaindId=$auxCuaIdIndicador");
			$rowCuaIndicadores = mysql_fetch_array($bdCuaIndicadores);	
        ?>
                                    
        <div class="standard-tabs margin-bottom" id="add-tabs">

            <ul class="tabs">
                <li class="active"><a href="#tab-1"><? echo $rowCuaIndicadores['cuaindNumRef']; ?></a></li>
            </ul>

            <div class="tabs-content">

                <div id="tab-1" class="with-padding">
                	<br><br>
                    
                    <form method="post" action="panel_control_cuadro_indicadores_telecontrol_peticion.php" id="formPeticion" name="formPeticion" title="">
                        <p class="inline-medium-label button-height">
                            <label for="fDireccion" class="label">Dirección</label>
                            <input type="text" name="fDireccion" id="fDireccion" class="input full-width validate[required]" 
                                value="<? echo $rowCuaIndicadores['cuaindDireccion']; ?>" disabled>
                        </p>

                        <p class="inline-medium-label button-height">
                        	<label for="fEstado" class="label">Estado</label>
                            <span class="button-group">
                                <label for="button-radio-1" class="button green-active">
                                    <input type="radio" name="fEstado" id="fEstado-1"
                                        <? if ($auxEstado==1) echo "checked"; ?>
                                        disabled="disabled">
                                    On
                                </label>
                                <label for="button-radio-2" class="button red-active">
                                    <input type="radio" name="fEstado" id="fEstado-2"
                                        <? if ($auxEstado==0) echo "checked"; ?>
                                        disabled="disabled">
                                    Off
                                </label>
                            </span>    
                        </p> 

                        <p class="inline-medium-label button-height">
                        	<label for="fAccion" class="label">Acción</label>
                            <button type="submit" 
                                <? 
                                if ($auxEstado==1 || $rowCuaIndTel['cuaindtelCanalSalida']==-1) {
                                    echo "class='button white-gradient glossy'";
                                    echo "disabled";
                                } else {
                                    echo "class='button green-gradient glossy'";
                                }
                                ?>
                                onClick="iniciarPeticion(<? echo $rowCuaIndTel['cuaindtelId']; ?>, fEstado.value);">
                                On
                            </button> 
                            &nbsp;&nbsp;
                            <button type="submit"
                                <? 
                                if ($auxEstado==0 || $rowCuaIndTel['cuaindtelCanalSalida']==-1) {
                                    echo "class='button white-gradient glossy'";
                                    echo "disabled";
                                } else {
                                    echo "class='button red-gradient glossy'";
                                }
                                ?>                
                                onClick="iniciarPeticion(<? echo $rowCuaIndTel['cuaindtelId']; ?>, fEstado.value);">
                                Off
                            </button>   
                        </p> 
                        
                        <? 
							if ($vIndicadorSelSinFormato == "CCTV") { 
						?>
                        		<br><br>
                                <object type="text/html"
                                    data="http://camara-irun.dyndns.org"
                                    width="950" height="900"
                                    style="border:0px; text-align:center;">
                                    
                                    <p class="big-message black-gradient red-color" 
                                            style="width:50%; text-align:center" 
                                            align="center">
                                        <span class="big-message-icon icon-warning with-text color"></span>
                                        <strong style="font-size:14px">No hay comunicación con la CCTV</strong>
                                    </p>
                                </object>
                                <br><br>
                        <? 
							} else {
								if ($vIndicadorSelSinFormato == "Megafonia") { 							
							?>
									<br><br>
                                    <object type="text/html"
                                        data="http://camara-irun.dyndns.org:81"
                                        width="950" height="400"
                                        style="border:0px; text-align:center;">
                                        
                                        <p class="big-message black-gradient red-color" 
                                        		style="width:50%; text-align:center" 
                                                align="center">
											<span class="big-message-icon icon-warning with-text color"></span>
											<strong style="font-size:14px">No hay comunicación con la Megafonía</strong>
										</p>
                                    </object>
									<br><br>
							<?
								}
							}
							?>                                      
                    </form>
                    <br><br>
                </div>				

 
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
                    <li class="with-left-arrow"><a href="panel_control_cuadro.php">&nbsp;&nbsp;&nbsp;Panel Cuadro <? echo $vNumCuadro;?></a></li> 
                </ul>
                <br>
            </section>
            <section class="navigable">                   
                <ul class="big-menu">
                    <li><a href="panel_control_cuadro_indicadores_estado.php">Estado</a></li>
                    <li>
                    	<a href="#" class="current navigable-current">Telecontrol
                    		<? if ($vIndicadorSel == "CCTV") echo " - Visualización"; ?>
                        </a>
                    </li>
                    <li><a href="#">Alarmas</a></li>
                    <li><a href="panel_control_cuadro_indicadores_configuracion.php">Configuración</a></li>
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
		if ($_GET['vId'] != "") {
			$vIdIndicador = $_GET['vId'];
			$result = mysql_query("SELECT * FROM tCuadrosIndicadores WHERE cuaindId='$vIdIndicador'");
			$row = mysql_fetch_array($result);
			$vNumRef = $row['cuaindNumRef'];
			$vDireccion = $row['cuaindDireccion'];
			$vSubTipoSinFormato = $row['cuaindSubTipoSinFormato'];
			
			$result = mysql_query("SELECT * FROM tCuadrosServicios WHERE cuaserSubTipoSinFormato='$vSubTipoSinFormato'");
			$row = mysql_fetch_array($result);
			$vSubTipo = $row['cuaserSubTipo'];
			
			if ($_GET['est'] == 1) 
				$vEstado = "ON";
			else 
				$vEstado = "OFF";
		?>
			<script languaje="javascript">
                openModal('<? echo $vNumRef; ?>', '<? echo utf8_encode($vDireccion); ?>', '<? echo $vEstado; ?>', '<? echo utf8_encode($vSubTipo); ?>');
            </script>
		<?		
		}
	?>
 
	<?
		include("inc/desconectar.php");
	?>  
 	<!-- JavaScript at the bottom for fast page loading -->


</body>
</html>