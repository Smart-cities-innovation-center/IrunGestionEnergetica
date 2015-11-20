<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	
	if ($_SESSION["k_precio_diaInicio"]=="") {
		$_SESSION["k_precio_diaInicio"] = date('Y-m-d');
	}
		
	$vDia = $_SESSION["k_precio_diaInicio"];
	$vDiaLeer = substr($vDia, 0, 4).substr($vDia, 5, 2).substr($vDia, 8, 2);
	
	$vDiaAnt = date('Y-m-d', strtotime('-1 day', strtotime($vDia)));
	$vDiaLeerAnt = substr($vDiaAnt, 0, 4).substr($vDiaAnt, 5, 2).substr($vDiaAnt, 8, 2);
	
	$vDiaSig = date('Y-m-d', strtotime('+1 day', strtotime($vDia)));
	$vDiaLeerSig = substr($vDiaSig, 0, 4).substr($vDiaSig, 5, 2).substr($vDiaSig, 8, 2);	
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
   
<!-- Fechas Inicio -->
	<script type="text/javascript" src="js/date.js"></script>
	<script language="javascript">
        function calcularDia(fecha, op)
        {
            var nFecha = Date.parse(fecha, "yyyy-MM-dd");
    
            if (op==1) {  // Día anterior
                nFecha.addDays(-1);
                document.getElementById('datepicker').value = nFecha.toString("yyyy-MM-dd");
            }
            if (op==2) {  //Día siguiente
                nFecha.addDays(1);
                document.getElementById('datepicker').value = nFecha.toString("yyyy-MM-dd");
            }			
        }
		
    </script>    
<!-- Fechas Fin 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> -->
    
	<!-- JavaScript at the bottom for fast page loading -->

	<!-- glDatePicker -->
	<link href="js/libs/newGlDatePicker/styles/glDatePicker.flatwhite.css" rel="stylesheet" type="text/css">
    <link href="js/libs/newGlDatePicker/styles/glDatePicker.default.css" rel="stylesheet" type="text/css">
	<script src="js/libs/jquery-1.8.2.min.js"></script>
	<script src="js/libs/newGlDatePicker/glDatePicker.min.js"></script>

   	<script>
		// Date picker
		$(window).load(function() {
			$('#datepicker').glDatePicker({ 
				zIndex: 100,
				dowOffset: 1,
				cssName: 'default',
				onClick: function(target, cell, date, data) {
							var auxFecha = date.getFullYear() + '-' +
										date.getMonth() + '-' +
										date.getDate();	
							var nFecha = Date.parse(auxFecha, "yyyy-MM-dd");
							nFecha.addMonths(1);
							target.val(nFecha.toString("yyyy-MM-dd"));
							document.datosform.submit();
						 }
				 });
  		});
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
				Panel precios energía
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->

                        <form action="panel_precio_energia_redirect.php" method="post" name="datosform">
							<input type="hidden" id="periodo_tipo" name="periodo_tipo" value="D">
                            <div class="button-height" align="center">
                                <button type="submit" class="button glossy mid-margin-right" alt="Día anterior" title="Día anterior"
                                    onclick="calcularDia(document.getElementById('datepicker').value, 1);">
                                    <span class="button-icon"><span class="icon-reply"></span></span>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                            
                                <span class="input">
                                    <span class="icon-calendar"></span>
                                    <input type="text" name="datepicker" id="datepicker" class="input-unstyled datepicker" value="<? echo $vDia;?>"
                                            onSelect="submit();" gldp-id="datepicker" style="text-align:center;">
                                    <div gldp-el="datepicker" style="width:250px; height:200px; z-index: 1000;"></div>
                                </span>
                                                                       
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="button glossy mid-margin-right" alt="Día siguiente" title="Día siguiente"
                                    onclick="calcularDia(document.getElementById('datepicker').value, 2);">
                                    <span class="button-icon right-side"><span class="icon-fwd"></span></span>
                                </button> 
                            </div> 							
                        </form> 
                        <br><br>

<?
						if (strlen(file_get_contents("http://www.omie.es/datosPub/marginalpdbc/marginalpdbc_".$vDiaLeer.".1"))>1000){  //**************** NO hay datos
							?>
							<br /><br /><br /><br /><br /><br />
							<div align="center">
								<p class="big-message black-gradient green-color" style="width:50%; text-align:center">
									<span class="big-message-icon icon-warning with-text color"></span>
									<strong style="font-size:14px">Todavía no hay datos para el día seleccionado</strong>
								</p>
							</div>
							<br /><br /><br /><br /><br /><br />
							<?
						} else {

?>

        <div class="standard-tabs margin-bottom" id="add-tabs">

            <ul class="tabs">
                <li class="active"><a href="#tab-1">Gráficas</a></li>
            </ul>

            <div class="tabs-content">

                <div id="tab-1" class="with-padding">						<!-- ************************  INICIO tab1 - Gráficas  **************************** -->
                    <br /><br />                         
                    <script src="jsGraf/highcharts.js"></script>
                    <!-- <script src="jsGraf/themes/gray.js"></script> -->
                    <script src="jsGraf/modules/exporting.js"></script>
                    
                    <?
					
					//Día seleccionado
					$contenido = file_get_contents("http://www.omie.es/datosPub/marginalpdbc/marginalpdbc_".$vDiaLeer.".1");
					$lineas = explode(";",$contenido);
					
					$lista = array();
					$i = 0;
					foreach ($lineas as $linea) {
						$lista[$i] = $linea;
						$i++;
					}
										
					//Día anterior
					$contenidoAnt = file_get_contents("http://www.omie.es/datosPub/marginalpdbc/marginalpdbc_".$vDiaLeerAnt.".1");
					$lineasAnt = explode(";",$contenidoAnt);

					$listaAnt = array();
					$i = 0;
					foreach ($lineasAnt as $linea) {
						$listaAnt[$i] = $linea;
						$i++;
					}
					
					//Día siguiente
					$swDiaSig = 0;
					if (strlen(file_get_contents("http://www.omie.es/datosPub/marginalpdbc/marginalpdbc_".$vDiaLeerSig.".1"))<1000){
						$contenidoSig = file_get_contents("http://www.omie.es/datosPub/marginalpdbc/marginalpdbc_".$vDiaLeerSig.".1");
						$lineasSig = explode(";",$contenidoSig);
						
						$listaSig = array();
						$i = 0;
						foreach ($lineasSig as $linea) {
							$listaSig[$i] = $linea;
							$i++;
						}
						$swDiaSig = 1;
					}
					
					
					$hora = 1;
					$pm = 0.0; $pmAnt = 0.0; $pmSig = 0;
                    $listaCategorias = "[";
                    $listaDatos = "[";	
					$listaDatosAnt = "[";
					$listaDatosSig = "[";
					
					//Desde el 2014-05-20 han cambiado el formato del fichero: Antes pos=6 (6x24 = 144). Ahora pos=8 (8x24 = 192)
					/*if ($vDia > "2014-05-20") {
						$iAnt = 8; $iSel = 8; $iSig = 8;
					} else {
						$iAnt = 6;
						if ($vDia <= "2014-05-18") {
							$iSel = 6; $iSig = 6;
						} else {
							if ($vDia == "2014-05-19") {
								$iSel = 6; $iSig = 8;
							} else {
								$iSel = 8; $iSig = 8;
							}
						}
					}*/
					
					//Han vuelto a poner el formato anterior
					$iAnt = 6; $iSel = 6; $iSig = 6;
					
                    for($i=1;$i<=24;$i++) {
						if ($i==24) { $coma=""; } else { $coma=","; }

						$xSel = $i * $iSel;
						$listaCategorias = $listaCategorias.$i.$coma;
						$listaDatos = $listaDatos.$lista[$i * $iSel].$coma;
						$pm+= $lista[$i * $iSel];

						$listaDatosAnt = $listaDatosAnt.$listaAnt[$i * $iAnt].$coma;
						$pmAnt+= $listaAnt[$i * $iAnt];
						
						if ($swDiaSig==1) { $listaDatosSig = $listaDatosSig.$listaSig[$i * $iSig].$coma; $pmSig+= $listaSig[$i * $iSig]; }
                    }
					$pm = $pm / 24; $pmAnt = $pmAnt / 24; $pmSig = $pmSig / 24; 
                    $listaCategorias = $listaCategorias."]";
                    $listaDatos = $listaDatos."]";	
					$listaDatosAnt = $listaDatosAnt."]";
					$listaDatosSig = $listaDatosSig."]";						
                    ?>
                    <script type="text/javascript">
                    $(function () {
                    var dataCategorias = <? echo $listaCategorias; ?>;
                    var dataDatos = <? echo $listaDatos; ?>;
					var dataDatosAnt = <? echo $listaDatosAnt; ?>;
					var dataDatosSig = <? echo $listaDatosSig; ?>;	
                                
                    var chart;
                    $(document).ready(function() {
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container',
                                type: 'spline',
                                marginRight: 60,
                                marginBottom: 70,
								backgroundColor: '#FBFBF9',
								borderRadius: 5,
								borderWidth: 1,
								borderColor: '#E4E4E4'/*,
								backgroundColor: {
									 linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
									 stops: [
										[0, 'rgb(96, 96, 96)'],
										[1, 'rgb(16, 16, 16)']
									 ]
								  }*/
                            },
                            title: {
                                text: 'Precio horario del mercado diario para el día <? echo $vDia; ?>',
                                x: 0 //center
                            },
                            subtitle: {
                                text: '',
                                x: -20
                            },
                            xAxis: {
                                categories: dataCategorias/*,
								title: {
                                    text: 'Hora',
                                    style: {
                                        color: '#4572A7'
                                    }
                                }*/											
                            },
                            yAxis: {
                                tickInterval: 2,
                                //max: <? //echo $vPotContratada + ($vPotContratada * 15 / 100); ?>,
                                title: {
                                    text: 'EUR/MWh',
                                    style: {
                                        color: '#4572A7'
                                    }
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                        return '<b>Hora: </b>' + this.x + '<br/>' +
                                        '<b>Precio: </b>' + (this.y).toFixed(2) + ' EUR/MWh';
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'PM anterior: <? echo number_format($pmAnt,2,",","."); ?> EUR/MWh' ,  
                                    style: {
                                        left: '30px',
                                        top: '5px',
                                        color: '#3A7FEF',
                                        fontSize: '13px'
                                    }
                                },
                                {
                                    html: 'PM seleccionado: <? echo number_format($pm,2,",","."); ?> EUR/MWh' ,
                                    style: {
                                        left: '30px',
                                        top: '20px',
                                        color: '#F00',
                                        fontSize: '13px'
                                    }
                                }
								<?
								if ($swDiaSig == 1) {
								?>
									, {
                                    html: 'PM siguiente: <? echo number_format($pmSig,2,",","."); ?> EUR/MWh' ,
                                    style: {
                                        left: '30px',
                                        top: '35px',
                                        color: '#27D42B',
                                        fontSize: '13px'
									}
									}
								<?	
								}
							?>
                                ]
                            },						
                            credits: {
                                enabled: false
                            },
                            series: [ {
                                name: 'Anterior ( <? echo $vDiaAnt; ?> )',
                                yAxis: 0,
                                color: '#ACC4EB',
                                data: dataDatosAnt	
							}, {
                                name: 'Día seleccionado ( <? echo $vDia; ?> )',
                                yAxis: 0,
								top: '50px',
                                color: '#F00',
                                data: dataDatos						
							}
							<?
								if ($swDiaSig == 1) {
								?>
									, {
										name: 'Siguiente ( <? echo $vDiaSig; ?> )',
										yAxis: 0,
										top: '50px',
										color: '#98FF9A',
										data: dataDatosSig						
									}
								<?	
								}
							?>
							]
                        });
                    });
                    
                    });
                    </script>

                    <div id="container" style="width: 900px; height: 500px;"></div>  
                    
                    <br><br><br>                    
 
                </div>																	<!-- ************************  FIN tab1 - Gráficas  **************************** -->

                

            </div>

        </div>
	


<!-- Pantalla principal Fin -->
<?	

						}
?>

			

		</div>

	</section>
	<!-- End main content -->

	<!-- Side tabs shortcuts -->
    <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">	
        <li><a href="panel_control_principal.php" class="shortcut-dashboard" title="Panel de control principal">Panel de control principal</a></li>
        <li><a href="panel_alarmas.php" class="shortcut-notes" title="Alarmas">Alarmas</a></li>
        <li class="current"><a href="panel_precio_energia_redirect.php" class="shortcut-stats" title="Precio energía">Precio energía</a></li>
        <li><a href="panel_mapa_luminico.php" class="shortcut-messages" title="Mapa lumínico">Mapa lumínico</a></li>    
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

			<!--
            <section class="navigable"> 
                <ul class="big-menu_back">
                    <li class="with-left-arrow"><a href="panel_control_cuadro_alumbrado.php">&nbsp;&nbsp;&nbsp;Cuadro <? echo $vNumCuadro;?> - Alumbrado</a></li> 
                </ul>
                <br>
            </section>
            <section class="navigable">                   
                <ul class="big-menu">
                    <li><a href="#" class="current navigable-current">Diaria</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_semana.php">Semanal</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_mes.php">Mensual</a></li>
                    <li><a href="#">Anual</a></li>
                </ul>
			</section>
			-->
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
	<script src="js/setup.js"></script>

	<!-- Template functions -->
	<script src="js/developr.input.js"></script>
	<script src="js/developr.navigable.js"></script>
	<script src="js/developr.notify.js"></script>
	<script src="js/developr.scroll.js"></script>
	<script src="js/developr.tooltip.js"></script>
	<script src="js/developr.tabs.js"></script>

</body>
</html>