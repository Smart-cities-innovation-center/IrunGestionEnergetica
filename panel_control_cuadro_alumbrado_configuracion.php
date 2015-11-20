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
    <link rel="stylesheet" href="css/styles/files.css?v=1">

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
				Panel de control Cuadro <? echo $vNumCuadro; ?> . Alumbrado . <span class="orange">Configuración</span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->

        <br><br>

        <div class="standard-tabs margin-bottom" id="add-tabs">

            <ul class="tabs">
                <li class="active"><a href="#tab-1">Descripción - Datos de contrato</a></li>
                <li><a href="#tab-2">Imágenes cuadro</a></li>
                <li><a href="#tab-3">Listado de lámparas</a></li>
            </ul>

            <div class="tabs-content">

                <div id="tab-1" class="with-padding">						<!-- ************************  INICIO tab1  **************************** -->
                    <br />                         
                	<?
					$BDCuadros = mysql_query("SELECT * FROM tCuadrosDetalles WHERE cuadetNumero=$vNumCuadro");
					$rowBDCuadros = mysql_fetch_array($BDCuadros);
					?>
                    <table class="simple-table responsive-table">
                        <thead>
                            <tr>
                                <th scope="col" class="align-left blue-gradient white" colspan="4">Descripción</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Dirección</th>
                                <td colspan="3"><? echo utf8_encode($rowBDCuadros['cuadetDireccion']); ?></td> 
                            </tr>                        
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Disp encendido</th>
                                <td><? echo utf8_encode($rowBDCuadros['cuadetDisp_Encendido']); ?></td>
                                <th scope="row" class="align-left silver-gradient">Líneas</th>
                                <td><? echo $rowBDCuadros['cuadetLineas']; ?></td> 
                            </tr>
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Disp ahorro</th>
                                <td><? echo $rowBDCuadros['cuadetDisp_Ahorro']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Soportes</th>
                                <td><? echo $rowBDCuadros['cuadetSoportes']; ?></td> 
                            </tr> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Ahorro potencia (kva)</th>
                                <td><? echo $rowBDCuadros['cuadetAhorro_Potencia']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Lámparas</th>
                                <td><? echo $rowBDCuadros['cuadetLamparas']; ?></td> 
                            </tr> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Ahorro tensión (V)</th>
                                <td><? echo $rowBDCuadros['cuadetAhorro_Tension']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Puntos luz</th>
                                <td><? echo $rowBDCuadros['cuadetPuntos_Luz']; ?></td> 
                            </tr>    
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Disp comunicación</th>
                                <td><? echo $rowBDCuadros['cuadetDisp_Comunicacion']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Potencia lámparas</th>
                                <td><? echo $rowBDCuadros['cuadetPotencia_Lamparas']; ?></td> 
                            </tr>                                                      
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Estado telecontrol</th>
                                <td><? echo $rowBDCuadros['cuadetEstado_Telecontrol']; ?></td>
                                <th scope="row" class="align-left silver-gradient"></th>
                                <td></td> 
                            </tr>
                        </tbody>
                    </table>
                    <br /><br>   
                	<?
					$BDCuadros = mysql_query("SELECT * FROM tCuadrosContrato WHERE cuaconNumero=$vNumCuadro");
					$rowBDCuadros = mysql_fetch_array($BDCuadros);
					?>
                    <table class="simple-table responsive-table">
                        <thead>
                            <tr>
                                <th scope="col" class="align-left blue-gradient white" colspan="4">Datos de contrato</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Dirección de suministro</th>
                                <td colspan="3"><? echo utf8_encode($rowBDCuadros['cuaconDireccion']); ?></td>
                            </tr>                        
                            <tr>
                                <th scope="row" class="align-left silver-gradient">CUPS</th>
                                <td><? echo $rowBDCuadros['cuaconCups']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Nº contador</th>
                                <td><? echo $rowBDCuadros['cuaconNContador']; ?></td> 
                            </tr>
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Empresa</th>
                                <td><? echo utf8_encode($rowBDCuadros['cuaconEmpresa_Factura']); ?></td>
                                <th scope="row" class="align-left silver-gradient">Marca</th>
                                <td><? echo $rowBDCuadros['cuaconMarca']; ?></td> 
                            </tr> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Póliza contrato acceso</th>
                                <td><? echo $rowBDCuadros['cuaconPoliza_Contrato_Acceso']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Fecha instalación</th>
                                <td><? echo $rowBDCuadros['cuaconFecha_Instalacion']; ?></td> 
                            </tr> 
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Referencia contrato</th>
                                <td><? echo $rowBDCuadros['cuaconReferencia_Contrato']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Tensión</th>
                                <td><? echo $rowBDCuadros['cuaconTension']; ?></td> 
                            </tr>    
                            <tr>
                                <th scope="row" class="align-left silver-gradient">Tarifa</th>
                                <td><? echo $rowBDCuadros['cuaconTarifa']; ?></td>
                                <th scope="row" class="align-left silver-gradient">Póliza potencia</th>
                                <td><? echo $rowBDCuadros['cuaconPoliza_Potencia']; ?></td> 
                            </tr>                                                      
                            <tr>
                                <th scope="row" class="align-left silver-gradient"></th>
                                <td></td>
                                <th scope="row" class="align-left silver-gradient">Potencia máxima autorizada</th>
                                <td><? echo $rowBDCuadros['cuaconPotencia_Maxima']; ?></td> 
                            </tr>
                        </tbody>
                    </table>
                    <br>                         	
                </div>																	<!-- ************************  FIN tab1  **************************** -->

                <div id="tab-2" class="with-padding" style="background: #dedede url(img/textures/scratches.png);">							 <!-- ************************  INICIO tab2  **************************** -->
                    <br>
                    <table align="center" border="none">
                    	<tr>
                        	<td align="center" valign="middle">
								<img src="img/proyecto/imagenes_cuadros/<? echo $vNumCuadro; ?>-01.png" class="framed_proyecto">
                            </td>
                            <td width="10%"></td>
                        	<td align="center" valign="middle">
								<img src="img/proyecto/imagenes_cuadros/<? echo $vNumCuadro; ?>-02.png" class="framed_proyecto">
                            </td> 
                        </tr>
                    </table>                           
                    <br />   

                </div>				<!-- ************************  FIN tab2   **************************** -->

                <div id="tab-3" class="with-padding">						<!-- ************************  INICIO tab3 **************************** -->
    				<br />
                    <table class="table responsive-table" id="sorting-advanced">
        
                        <thead>
                            <tr>
                                <th scope="col" class="align-center" width="10%">Id</th>
                                <th scope="col">Dirección</th>
                                <th scope="col" class="align-center" width="10%">Modelo</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Referencia</th>
                                <th scope="col" class="align-center">Potencia (W)</th>
                                <th scope="col" class="align-center" width="10%">Unidades</th>
                                <th scope="col" class="align-center"></th>
                            </tr>
                        </thead>
        
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <?
                                        $result = mysql_query("SELECT * FROM tCuadrosLamparas WHERE substring(cualamNumRef, 1, 3)=$vNumCuadro");
                                        $vCant = mysql_num_rows($result);
                                        echo mysql_num_rows($result)." registros encontrados";
                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?
                                $bdCuadrosLamparas = mysql_query("SELECT * FROM tCuadrosLamparas 
																WHERE substring(cualamNumRef, 1, 3)=$vNumCuadro
																ORDER BY cualamNumRef, cualamId");
                                while ($rowCuaLam = mysql_fetch_array($bdCuadrosLamparas)){
									$auxIdlampara = $rowCuaLam['cualamIdLampara'];
									$bdLamparas = mysql_query("SELECT * FROM tLamparas
																WHERE lamId=$auxIdlampara");
									$rowLampara = mysql_fetch_array($bdLamparas);							
                                ?>
                                <tr>
                                    <td class="align-center" width="10%"><? echo $rowCuaLam['cualamNumRef']; ?></td>
                                    <td><? echo utf8_encode($rowCuaLam['cualamDireccion']); ?></td>
                                    <td class="align-center" width="10%"><? echo $rowLampara['lamModelo']; ?></td>
                                    <td><? echo utf8_encode($rowLampara['lamFabricante']); ?></td>
                                    <td><? echo utf8_encode($rowLampara['lamReferencia']); ?></td>
                                    <td class="align-center"><? echo $rowLampara['lamPotencia']; ?></td>
                                    <td class="align-center" width="10%"><? echo $rowCuaLam['cualamUnidades']; ?></td>
                                    <td class="low-padding align-center">
                                        <a href="#" 
                                            class="button icon-pencil with-tooltip" title="Modificar">
                                        </a>
                                        <a href="#" 
                                            class="button icon-trash with-tooltip confirm" title="Borrar">
                                        </a>
                                    </td>                                    
                                </tr> 
                                <?
                                }
                                ?>
                        </tbody>
        
                    </table> 

                    <br />   
                </div>				<!-- ************************  FIN tab3s  **************************** -->

 
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
                    <li><a href="lecturas_redirect.php">Lecturas</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_estado.php">Estado monitorizadas</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_telecontrol.php">Telecontrol - Regulación</a></li>
                    <li><a href="#">Alarmas</a></li>
                    <li><a href="#" class="current navigable-current">Configuración</a></li>
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
	<script src="js/developr.tabs.js"></script>
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
				{ 'bSortable': false, 'aTargets': [ 7 ] }
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

		// Table sort - styled
		$('#sorting-example1').tablesorter({
			headers: {
				//0: { sorter: false },
				//5: { sorter: false }
			}
		}).on('click', 'tbody td', function(event)
		{
			// Do not process if something else has been clicked
			if (event.target !== this)
			{
				return;
			}

			var tr = $(this).parent(),
				row = tr.next('.row-drop'),
				rows;

			// If click on a special row
			if (tr.hasClass('row-drop'))
			{
				return;
			}

			// If there is already a special row
			if (row.length > 0)
			{
				// Un-style row
				tr.children().removeClass('anthracite-gradient glossy');

				// Remove row
				row.remove();

				return;
			}

			// Remove existing special rows
			rows = tr.siblings('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}

			// Style row
			tr.children().addClass('anthracite-gradient glossy');

			// Add fake row
			$('<tr class="row-drop">'+
				'<td colspan="'+tr.children().length+'">'+
					'<div class="float-right">'+
						'<button type="submit" class="button glossy mid-margin-right">'+
							'<span class="button-icon"><span class="icon-mail"></span></span>'+
							'Send mail'+
						'</button>'+
						'<button type="submit" class="button glossy">'+
							'<span class="button-icon red-gradient"><span class="icon-cross"></span></span>'+
							'Remove'+
						'</button>'+
					'</div>'+
					'<strong>Name:</strong> John Doe<br>'+
					'<strong>Account:</strong> admin<br>'+
					'<strong>Last connect:</strong> 05-07-2011<br>'+
					'<strong>Email:</strong> john@doe.com'+
				'</td>'+
			'</tr>').insertAfter(tr);

		}).on('sortStart', function()
		{
			var rows = $(this).find('.row-drop');
			if (rows.length > 0)
			{
				// Un-style previous rows
				rows.prev().children().removeClass('anthracite-gradient glossy');

				// Remove rows
				rows.remove();
			}
		});

		// Table sort - simple
	    $('#sorting-example2').tablesorter({
			headers: {
				5: { sorter: false }
			}
		});

	</script>    

</body>
</html>