<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vNumCuadro = $_SESSION["k_numCuadro"];
	
	$vDia = $_SESSION['k_D_diaInicio'];
	$vDiaAnt = date('Y-m-d', strtotime('-1 day', strtotime($vDia)));
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
				Panel de control Cuadro <? echo $vNumCuadro; ?> . Alumbrado . Lecturas . Diaria . <span class="orange"><? echo $vDia; ?></span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->

                        <form action="lecturas_redirect.php" method="post" name="datosform">
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
								$vEstacion = "Hondarribi_".$vNumCuadro;
                                $resBD = mysql_query("SELECT * FROM tLecturas 
																WHERE lectEstacion='$vEstacion'
																AND lectFecha='$vDia'
																ORDER BY lectHora"); 
                                $numRegistrosReal = mysql_num_rows($resBD);
						
								$resBDAnt = mysql_query("SELECT * FROM tLecturas 
																	WHERE lectEstacion='$vEstacion'
																	AND lectFecha<'$vDia' 
                                                            		ORDER BY lectFecha DESC, lectHora DESC");								
								$rowBDAnt = mysql_fetch_array($resBDAnt);


						if ($numRegistrosReal!=0) {  //*********************************** Hay datos
								//Para el cálculo de los valores del día anterior de las energías que hay que sacar en los 'totales'
                           	
								$vEActAnt = $rowBDAnt['lectDato32'];
								$vEReacAnt = $rowBDAnt['lectDato33'];
								$vFP = $rowBDAnt['lectDato34'];				

								$conceptos = array('Pact (kW)', 'Preac (Kvar)', 'Eact (kWh)', 'Ereac (Kvar x h)', 'PF', 'Frecuencia', 'Pact<sub>R</sub>', 'Preact<sub>R</sub>', 'PF<sub>R</sub>', 'Pact<sub>S</sub>', 'Preact<sub>S</sub>', 'PF<sub>S</sub>',  'Pact<sub>T</sub>', 'Preact<sub>T</sub>', 'PF<sub>T</sub>');
									
								//******************* Lista de canales y horas
								$listaCanales=array("29","30","32","33","34","35","36","37","38","39","40","41","42","43","44"); 			
								$listaHoras=array("00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"); 
							
								$numCanales = 15; 
								$numHoras = $numRegistrosReal;
								for($fil=0;$fil<$numCanales;$fil++) {
									for($col=0;$col<$numHoras;$col++) {
										$listaDatos[$listaCanales[$fil]][$listaHoras[$col]]=0;
									}
								}
								
								// Pasamos los datos de la base de datos a la tabla
								while($rowBD = mysql_fetch_array($resBD)) {
									$iCol = substr($rowBD['lectHora'],0,5);
									for ($fil=0;$fil<$numCanales;$fil++) {
										$iFil = $listaCanales[$fil];
										$listaDatos[$iFil][$iCol] = $rowBD['lectDato'.$iFil];
										//echo "Fila: ".$iFil." - Col: ".$iCol." - Dato: ".$rowBD['lectDato'.$iFil]."<br>";
									}
								}
									
								// Calculamos las medias para sacar en los totales
								$listaTotales=array();
								for($fil=0;$fil<$numCanales;$fil++) {
									$vSuma = 0;
									for($col=0;$col<$numHoras;$col++) {	
										$vSuma = $vSuma + (float)$listaDatos[$listaCanales[$fil]][$listaHoras[$col]];
									}	
									$listaTotales[$listaCanales[$fil]] = $vSuma / $numRegistrosReal;
								}
							
								for($fil=0;$fil<$numCanales;$fil++) {
									$vAuxCanal = $listaCanales[$fil];
									if ($vAuxCanal==32 || $vAuxCanal==33) {
										$listaTotales[$vAuxCanal] = 0 ;
										for($col=$numHoras-1;$col>=0;$col--) {
											if ($col==0) {
												switch ($vAuxCanal) {
													case 32:
														$aux = (float)$listaDatos[$listaCanales[$fil]][$listaHoras[$col]] - (float)$vEActAnt;				
														break;
													case 33:
														$aux = (float)$listaDatos[$listaCanales[$fil]][$listaHoras[$col]] - (float)$vEReacAnt;
														break;																					
												}
											} else {
												$aux = (float)$listaDatos[$listaCanales[$fil]][$listaHoras[$col]] - (float)$listaDatos[$listaCanales[$fil]][$listaHoras[$col-1]];														
											}
											$listaDatos[$vAuxCanal][$listaHoras[$col]] = $aux;
											$listaTotales[$vAuxCanal] = $listaTotales[$vAuxCanal] + $aux;	
										}
									}
								}
																				
								// Calculamos suma de Eact, Ereac, Pot max y PF para sacar en el gráfico
								$vGraEnerAct = 0; $vGraEnerReac = 0; $vGraPotMax = 0;
								for($col=0;$col<$numHoras;$col++) {	
									$vGraEnerAct = $vGraEnerAct + (float)$listaDatos['32'][$listaHoras[$col]];
									$vGraEnerReac = $vGraEnerReac + (float)$listaDatos['33'][$listaHoras[$col]];
									if ($listaDatos['29'][$listaHoras[$col]] > $vGraPotMax)
										$vGraPotMax = $listaDatos['29'][$listaHoras[$col]];
								}
								$vGraPF = $vGraEnerAct / sqrt(pow($vGraEnerAct, 2) + pow($vGraEnerReac, 2))	;

	//---------------------------------- Cálculos para sacar en los gráficos los distintos tramos horarios (Punta, Llano y Valle)
	$auxAnioGraf = substr($vDia, 0, 4);
	$auxMesGraf = substr($vDia, 5, 2);
	$auxDiaGraf = substr($vDia, 8, 2);	
		
	$queryBDHorario = mysql_query("SELECT * FROM tCambioHora WHERE camAnio=$auxAnioGraf");
	$rowBDHorario = mysql_fetch_array($queryBDHorario);
	if ($vDia>=$auxAnioGraf."-03".$rowBDHorario['camDiaVerano'] && $vDia<$auxAnioGraf."-10".$rowBDHorario['camDiaInvierno']) {
		$auxPeriodo = "Ver";
	} else {
		$auxPeriodo = "Inv";
	}	

	$ttarcua = mysql_query("SELECT * FROM tTarifasCuadro WHERE tarcuaNumCuadro=$vNumCuadro");
	$rowTI = mysql_fetch_array($ttarcua);
	$auxTramos = $rowTI['tarcuaNTramos'];
	$auxVariable = $auxTramos.$auxPeriodo;	
		
	$tPer = mysql_query("SELECT * FROM tPeriodos");
	$rowPer = mysql_fetch_array($tPer);	
	
	$vGrafInicio = 55; $vGrafFin = 825; $vGrafSuperior = 430; $vGrafInferior = 40;
	$vGrafTramo = ($vGrafFin - $vGrafInicio) / 23;
	$vGrafAlto = $vGrafSuperior - $vGrafInferior;
	$vGrafTextoY = 410;
	$vGrafColorValle = "#DFD"; $vGrafColorLlano = "#FFD"; $vGrafColorPunta = "#FFF0F0"; $vGrafColorTexto = "#666";
	$vGrafSizeTexto = "11px";
	
	$vHora = (int)substr($rowPer['perP'.$auxVariable.'Punta1D'], 0, 2);
	$vGrafSepPunta1 = ($vHora * $vGrafTramo) + $vGrafInicio;
	$vHoraH = (int)substr($rowPer['perP'.$auxVariable.'Punta1H'], 0, 2);
	if ($vHoraH == 0) $vHoraH = 23;
	$vGrafAnchoPunta1 = (($vHoraH * $vGrafTramo) + $vGrafInicio) - $vGrafSepPunta1;

	$vHora = (int)substr($rowPer['perP'.$auxVariable.'Llano1D'], 0, 2);
	$vGrafSepLlano1 = ($vHora * $vGrafTramo) + $vGrafInicio;
	$vHoraH = (int)substr($rowPer['perP'.$auxVariable.'Llano1H'], 0, 2);
	if ($vHoraH == 0) $vHoraH = 23;
	$vGrafAnchoLlano1 = (($vHoraH * $vGrafTramo) + $vGrafInicio) - $vGrafSepLlano1;			
		
	$vHora = (int)substr($rowPer['perP'.$auxVariable.'Llano2D'], 0, 2);
	$vGrafSepLlano2 = ($vHora * $vGrafTramo) + $vGrafInicio;
	$vHoraH = (int)substr($rowPer['perP'.$auxVariable.'Llano2H'], 0, 2);
	if ($vHoraH == 0) $vHoraH = 23;
	$vGrafAnchoLlano2 = (($vHoraH * $vGrafTramo) + $vGrafInicio) - $vGrafSepLlano2;			
		
	$vHora = (int)substr($rowPer['perP'.$auxVariable.'Valle1D'], 0, 2);
	$vGrafSepValle1 = ($vHora * $vGrafTramo) + $vGrafInicio;
	$vHoraH = (int)substr($rowPer['perP'.$auxVariable.'Valle1H'], 0, 2);
	if ($vHoraH == 0) $vHoraH = 23;
	$vGrafAnchoValle1 = (($vHoraH * $vGrafTramo) + $vGrafInicio) - $vGrafSepValle1;

?>

        <div class="standard-tabs margin-bottom" id="add-tabs">

            <ul class="tabs">
                <li class="active"><a href="#tab-1">Gráficas</a></li>
                <li><a href="#tab-2">Lecturas principales</a></li>
                <li><a href="#tab-3">Lecturas totales</a></li>
                <li><a href="#tab-4">Comparativa</a></li>
            </ul>

            <div class="tabs-content">

                <div id="tab-1" class="with-padding">						<!-- ************************  INICIO tab1 - Gráficas  **************************** -->
                    <br /><br />                         
                    <script src="jsGraf/highcharts.js"></script>
                    <!-- <script src="jsGraf/themes/gray.js"></script> -->
                    <script src="jsGraf/modules/exporting.js"></script>
                    
                    <?
                    $numRegistros = $numHoras;						
                    $swReg=0;
                    $listaCategorias = "[";
                    $listaDatos1 = "[";
                    $listaDatos2 = "[";					
                    
                    while($swReg < $numHoras){
						if ($numRegistros==$swReg || $swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
						
						$grafDato = substr($listaHoras[$swReg], 0, 2);
						$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
						
						$grafDato = $listaDatos['29'][$listaHoras[$swReg]];
						if ($grafDato == "") $grafDato=0;
						$listaDatos1 = $listaDatos1.$grafDato.$coma;		
						
						$grafDato = $listaDatos['30'][$listaHoras[$swReg]];
						if ($grafDato == "") $grafDato=0;
						$listaDatos2 = $listaDatos2.$grafDato.$coma;							
						
						$swReg++;
                    }
                    $listaCategorias = $listaCategorias."]";
                    $listaDatos1 = $listaDatos1."]";
                    $listaDatos2 = $listaDatos2."]";						
                    ?>
                    <script type="text/javascript">
                    $(function () {
                    var dataCategorias = <? echo $listaCategorias; ?>;
                    var dataDatos1 = <? echo $listaDatos1; ?>;
                    var dataDatos2 = <? echo $listaDatos2; ?>;			
                                
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
                                <? include "inc/incGrafTramos.php"; ?>
                            },
                            title: {
                                text: 'Potencias:  <? echo $vDia; ?>',
                                x: 0 //center
                            },
                            subtitle: {
                                text: '',
                                x: -20
                            },
                            xAxis: {
                                categories: dataCategorias											
                            },
                            yAxis: {
                                //tickInterval: 2.5,
                                //max: <? //echo $vPotContratada + ($vPotContratada * 15 / 100); ?>,
                                title: {
                                    text: '',
                                    style: {
                                        color: '#4572A7'
                                    }
                                }
                            },
                            tooltip: {
                                formatter: function() {
                                        return '<b>'+ this.series.name +'</b><br/>'+
                                        this.x +': '+ (this.y).toFixed(3) ;
                                }
                            },
                            labels: {
                                items: [{
                                    html: 'PF: <? echo number_format($vGraPF,3,",","."); ?>' ,  
                                    style: {
                                        left: '30px',
                                        top: '5px',
                                        color: '#090',
                                        fontSize: '13px'
                                    }
                                },
                                {
                                    html: 'Pot Act Max: <? echo number_format($vGraPotMax,3,",","."); ?> kW' ,
                                    style: {
                                        left: '30px',
                                        top: '20px',
                                        color: '#06C',
                                        fontSize: '13px'
                                    }
                                }]
                            },						
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Activa (kW)',
                                yAxis: 0,
                                color: '#06C',
                                data: dataDatos1						
                            }, {
                                name: 'Reactiva (Kvar)',
                                yAxis: 0,
                                color: '#F00',
                                data: dataDatos2						
                            }]
                        });
                    });
                    
                    });
                    </script>

                    <div id="container" style="width: 900px; height: 500px;"></div>  
                    
                    <br><br><br>                    
            
                    <? 
                    $numRegistros = $numHoras;						
                    $swReg=0;
                    $listaCategorias = "[";
                    $listaDatos1 = "[";
                    $listaDatos2 = "[";
                    while($swReg < $numHoras){
                        if ($numRegistros==$swReg || $swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
                        
                        $grafDato = substr($listaHoras[$swReg], 0, 2);
                        $listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
                
                        $grafDato = $listaDatos['32'][$listaHoras[$swReg]];
                        if ($grafDato == "") $grafDato=0;
                        $listaDatos1 = $listaDatos1.$grafDato.$coma;
                
                        $grafDato = $listaDatos['33'][$listaHoras[$swReg]];
                        if ($grafDato == "") $grafDato=0;
                        $listaDatos2 = $listaDatos2.$grafDato.$coma;							
                        
                        $swReg++;
                    }
                    $listaCategorias = $listaCategorias."]";
                    $listaDatos1 = $listaDatos1."]";
                    $listaDatos2 = $listaDatos2."]";
                    ?>
					<script type="text/javascript">
                        $(function () {
                            var dataCategorias = <? echo $listaCategorias; ?>;
                            var dataDatos1 = <? echo $listaDatos1; ?>;
                            var dataDatos2 = <? echo $listaDatos2; ?>;
                                        
                            var chart;
                            $(document).ready(function() {
                                chart = new Highcharts.Chart({
                                    chart: {
                                        renderTo: 'container1',
                                        type: 'spline',
                                        marginRight: 60,
                                        marginBottom: 70,
										backgroundColor: '#FBFBF9',
										borderRadius: 5,
										borderWidth: 1,
										borderColor: '#E4E4E4'
                                        <? include "inc/incGrafTramos.php"; ?>
                                    },
                                    title: {
                                        text: 'Energías:  <? echo $vDia; ?>',
                                        x: 0 //center
                                    },
                                    subtitle: {
                                        text: '',
                                        x: -20
                                    },
                                    xAxis: {
                                        categories: dataCategorias											
                                    },
                                    yAxis: {
                                        //tickInterval: 2.5,
                                        //max: <? //echo $vPotContratada; ?>,
                                        title: {
                                            text: '',
                                            style: {
                                                color: '#4572A7'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        formatter: function() {
                                                return '<b>'+ this.series.name +'</b><br/>'+
                                                this.x +': '+ (this.y).toFixed(3) ;
                                        }
                                    },
                                    labels: {
                                        items: [{
                                            html: 'Ener Act: <? echo number_format($vGraEnerAct,3,",","."); ?> kWh' ,
                                            style: {
                                                left: '30px',
                                                top: '5px',
                                                color: '#06C',
                                                fontSize: '13px'
                                            }
                                        }]
                                    },					
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                        name: 'Activa (kWh)',
                                        yAxis: 0,
                                        color: '#06C',
                                        data: dataDatos1						
                                    }, {
                                        name: 'Reactiva (Kvar x h)',
                                        yAxis: 0,
                                        color: '#F00',
                                        data: dataDatos2						
                                    }]
                                });
                            });
                        });
                        
                    </script>
             
            
                    <div id="container1" style="width: 900px; height: 500px;"></div>   
                                    <br />   
                         	
                </div>																	<!-- ************************  FIN tab1 - Gráficas  **************************** -->

                <div id="tab-2" class="with-padding">							 <!-- ************************  INICIO tab2 - Lecturas principales  **************************** -->
                    <br>
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <?
                                        for ($i=0;$i<12;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaHoras[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) { // Hay 14 canales con datos de CG
									$vAuxCanal = $listaCanales[$fil];
									if ($vAuxCanal==29 || $vAuxCanal==30 || $vAuxCanal==32 ||
										$vAuxCanal==33 || $vAuxCanal==34) {
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                    <?
                                            for($col=0;$col<12;$col++) {
												$vAuxCanal = $listaCanales[$fil];
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaHoras[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ((int)substr($listaHoras[$col], 0, 2)<(int)$numHoras)
														echo number_format($valorDato,3,",",".");
												?>
                                                </td>
                                    <?
                                            }
                                    ?>
                                        </tr>
                                    <?
									}
								}
							?> 
                            </tbody>                           
                        </table>
                        <br />
                        
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <?
                                        for ($i=12;$i<24;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaHoras[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
								<?
                                    for($fil=0;$fil<$numCanales;$fil++) {
                                        $vAuxCanal = $listaCanales[$fil];
                                        if ($vAuxCanal==29 || $vAuxCanal==30 || $vAuxCanal==32 ||
                                            $vAuxCanal==33 || $vAuxCanal==34) {
                                ?>		
                                            <tr>
                                                <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                        <?
                                                for($col=12;$col<24;$col++) {
                                                    $valorDato = $listaDatos[$listaCanales[$fil]][$listaHoras[$col]];
                                        ?>
                                                    <td align="center">
                                                    <? 
                                                        if ((int)substr($listaHoras[$col], 0, 2)<(int)$numHoras)
                                                            echo number_format($valorDato,3,",",".");
                                                    ?>
                                                    </td>
                                        <?
                                                }
                                        ?>
                                            </tr>
                                        <?
                                        }
                                    }
                                ?> 
                            </tbody>                           
                        </table>
                        <br />
                                                                      
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <th scope="col" class="align-center blue-gradient white">Media diaria</th>
                                    <th scope="col" class="align-center blue-gradient white">Acumulado dia</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) {
									$vAuxCanal = $listaCanales[$fil];
									if ($vAuxCanal==29 || $vAuxCanal==30 || $vAuxCanal==32 ||
										$vAuxCanal==33 || $vAuxCanal==34) {
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                            <?
												$vAuxCanal = $listaCanales[$fil];
												if ($vAuxCanal<>32 && $vAuxCanal<>33) {
											?>
                                                    <td align="center">
                                                        <?
                                                            echo number_format($listaTotales[$listaCanales[$fil]],3,",",".");
                                                        ?>
                                                    </td>
                                                    <td align="center"></td>                                                    
                                            <?
												} else {
											?>
                                            		<td align="center"></td>
                                                    <td align="center">
                                                        <?
                                                            echo number_format($listaTotales[$listaCanales[$fil]],3,",",".");
                                                        ?>
                                                    </td>
                                            <?
												}
											?>
                                        </tr>
                                    <?
									}
								}
							?>
                            </tbody>
                        </table>   
                        <br />   

                </div>				<!-- ************************  FIN tab2 - Lecturas principales  **************************** -->

                <div id="tab-3" class="with-padding">						<!-- ************************  INICIO tab3 - Lecturas totales  **************************** -->
    				<br />
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <?
                                        for ($i=0;$i<12;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaHoras[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) { 
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                    <?
                                            for($col=0;$col<12;$col++) {
												$vAuxCanal = $listaCanales[$fil];
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaHoras[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ((int)substr($listaHoras[$col], 0, 2)<(int)$numHoras)
														echo number_format($valorDato,3,",",".");
												?>
                                                </td>
                                    <?
                                            }
                                    ?>
                                        </tr>
                                    <?
								}
							?>  
                            </tbody>                          
                        </table>
                        <br />
                        
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <?
                                        for ($i=12;$i<24;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaHoras[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) {
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                    <?
                                            for($col=12;$col<24;$col++) {
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaHoras[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ((int)substr($listaHoras[$col], 0, 2)<(int)$numHoras)
														echo number_format($valorDato,3,",",".");
												?>
                                                </td>
                                    <?
                                            }
                                    ?>
                                        </tr>
                                    <?
								}
							?> 
                            </tbody>                           
                        </table>
                        <br />
                                                                      
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <th scope="col" class="align-center blue-gradient white">Media diaria</th>
                                    <th scope="col" class="align-center blue-gradient white">Acumulado dia</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) {
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                            <?
												$vAuxCanal = $listaCanales[$fil];
												if ($vAuxCanal<>32 && $vAuxCanal<>33) {
											?>
                                                    <td align="center">
                                                        <?
                                                            echo number_format($listaTotales[$listaCanales[$fil]],3,",",".");
                                                        ?>
                                                    </td>
                                                    <td align="center"></td>                                                    
                                            <?
												} else {
											?>
                                            		<td align="center"></td>
                                                    <td align="center">
                                                        <?
                                                            echo number_format($listaTotales[$listaCanales[$fil]],3,",",".");
                                                        ?>
                                                    </td>
                                            <?
												}
											?>
                                        </tr>
                                    <?
								}
							?>
                        </table>   
                        <br />   
                </div>				<!-- ************************  FIN tab3 - Lecturas totales  **************************** -->

                <div id="tab-4" class="with-padding">						<!-- ************************  INICIO tab4 - Comparativa  **************************** -->
                	<br>
					<?
                        $vDiaComp = $vDiaAnt;
                        $vDiaAntComp = date('Y-m-d', strtotime('-1 day', strtotime($vDiaComp)));
                        
                        $resBD = mysql_query("SELECT * FROM tLecturas 
														WHERE lectEstacion='$vEstacion'
														AND lectFecha='$vDiaComp'
                                                    	ORDER BY lectHora"); 
                        $numRegistrosReal = mysql_num_rows($resBD);
                        
                        $resBDAnt = mysql_query("SELECT * FROM tLecturas 
															WHERE lectEstacion='$vEstacion'
															AND lectFecha<'$vDiaComp' 
                                                    		ORDER BY lectFecha DESC, lectHora DESC");								
                        $rowBDAnt = mysql_fetch_array($resBDAnt);
                        
                        $vEActAnt = $rowBDAnt['lectDato32'];
                        $vEReacAnt = $rowBDAnt['lectDato33'];
                        
                        $listaCanalesComparativa=array("29","30","32","33"); 			
                    
                        $numCanales = 4;
                        $numHorasAnt = $numRegistrosReal;
                        
                        if ($numHorasAnt >= $numHoras) {		//*******************************************************************************************
                            $numHoras = $numHorasAnt;
                        
                        for($fil=0;$fil<$numCanales;$fil++) {
                            for($col=0;$col<$numHoras;$col++) {
                                $listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaHoras[$col]]=0;
                            }
                        }
                        
                        while($rowBD = mysql_fetch_array($resBD)) {
                            $iCol = substr($rowBD['lectHora'],0,5);
                            for ($fil=0;$fil<$numCanales;$fil++) {
                                $iFil = $listaCanalesComparativa[$fil];
                                $listaDatosComparativa[$iFil][$iCol] = $rowBD['lectDato'.$iFil];
                                //echo "Fila: ".$iFil." - Col: ".$iCol." - Dato: ".$rowBD['lectDato'.$iFil]."<br>";
                            }
                        }
                        
                        for($fil=0;$fil<$numCanales;$fil++) {
                            $vAuxCanal = $listaCanalesComparativa[$fil];
                            if ($vAuxCanal==32 || $vAuxCanal==33) {
                                for($col=$numHoras-1;$col>=0;$col--) {
                                    if ($col==0) {
                                        switch ($vAuxCanal) {
                                            case 32:
                                                $aux = (float)$listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaHoras[$col]] - (float)$vEActAnt;				
                                                break;
                                            case 33:
                                                $aux = (float)$listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaHoras[$col]] - (float)$vEReacAnt;
                                                break;																																						
                                        }
                                    } else {
                                        $aux = (float)$listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaHoras[$col]] - (float)$listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaHoras[$col-1]];														
                                    }
                                    $listaDatosComparativa[$vAuxCanal][$listaHoras[$col]] = $aux;
                                }
                            }
                        }	
                        
                        $vGraEnerActComparativa = 0; $vGraEnerReacComparativa = 0; $vGraPotMaxComparativa = 0;
                        for($col=0;$col<$numHoras;$col++) {	
                            $vGraEnerActComparativa = $vGraEnerActComparativa + (float)$listaDatosComparativa['32'][$listaHoras[$col]];
                            $vGraEnerReacComparativa = $vGraEnerReacComparativa + (float)$listaDatosComparativa['33'][$listaHoras[$col]];
                            if ($listaDatosComparativa['29'][$listaHoras[$col]] > $vGraPotMaxComparativa)
                                $vGraPotMaxComparativa = $listaDatosComparativa['29'][$listaHoras[$col]];
                        }
                        
                        if ($vGraEnerReacComparativa == 0)
                            $vGraPFComparativa = 0;
                        else
                            $vGraPFComparativa = $vGraEnerActComparativa / sqrt(pow($vGraEnerActComparativa, 2) + pow($vGraEnerReacComparativa, 2));								
                        
                    ?>                                
                    <script src="jsGraf/highcharts.js"></script>
                    <script src="jsGraf/modules/exporting.js"></script>
    
						<?
						$numRegistros = $numHoras;						
						$swReg=0;
						$listaCategorias = "[";
						$listaDatos1 = "[";
						$listaDatos2 = "[";						
						$listaDatos3 = "[";
						$listaDatos4 = "[";	
						
						while($swReg < $numHoras){
							if ($numRegistros==$swReg || $swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
							
							$grafDato = substr($listaHoras[$swReg], 0, 2);
							$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;

							$grafDato = $listaDatos['29'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos1 = $listaDatos1.$grafDato.$coma;
							
							$grafDato = $listaDatos['30'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos2 = $listaDatos2.$grafDato.$coma;							

							$grafDato = $listaDatosComparativa['29'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos3 = $listaDatos3.$grafDato.$coma;	
							
							$grafDato = $listaDatosComparativa['30'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos4 = $listaDatos4.$grafDato.$coma;																
							
							$swReg++;
						}
						$listaCategorias = $listaCategorias."]";
						$listaDatos1 = $listaDatos1."]";
						$listaDatos2 = $listaDatos2."]";
						$listaDatos3 = $listaDatos3."]";
						$listaDatos4 = $listaDatos4."]";												
						?>
						<script type="text/javascript">
                            $(function () {
                                var dataCategorias = <? echo $listaCategorias; ?>;
                                var dataDatos1 = <? echo $listaDatos1; ?>;
                                var dataDatos2 = <? echo $listaDatos2; ?>;			
                                var dataDatos3 = <? echo $listaDatos3; ?>;
                                var dataDatos4 = <? echo $listaDatos4; ?>;		
                                                        
                                var chart;
                                $(document).ready(function() {
                                    chart = new Highcharts.Chart({
                                        chart: {
                                            renderTo: 'container2',
                                            type: 'spline',
                                            marginRight: 60,
                                            marginBottom: 70,
											backgroundColor: '#FBFBF9',
											borderRadius: 5,
											borderWidth: 1,
											borderColor: '#E4E4E4'
                                            <? include "inc/incGrafTramos.php"; ?>
                                        },
                                        title: {
                                            text: 'Potencias:  <? echo $vDia." vs ".date('Y-m-d', strtotime('-1 day', strtotime($vDia))); ?>',
                                            x: 0 //center
                                        },
                                        subtitle: {
                                            text: '',
                                            x: -20
                                        },
                                        xAxis: {
                                            categories: dataCategorias											
                                        },
                                        yAxis: {
                                            //tickInterval: 2.5,
                                            //max: <? //echo $vPotContratada + ($vPotContratada * 15 / 100); ?>,
                                            title: {
                                                text: '',
                                                style: {
                                                    color: '#4572A7'
                                                }
                                            }
                                        },
                                        tooltip: {
                                            formatter: function() {
                                                    return '<b>'+ this.series.name +'</b><br/>'+
                                                    this.x +': '+ (this.y).toFixed(3) ;
                                            }
                                        },
                                        labels: {
                                            items: [{
                                                html: 'Pot Act Max: <? echo number_format($vGraPotMax,3,",","."); ?> kW' ,
                                                style: {
                                                    left: '30px',
                                                    top: '5px',
                                                    color: '#06C',
                                                    fontSize: '13px'
                                                }
                                            }, {
                                                html: '<? echo "(".number_format($vGraPotMaxComparativa,3,",",".")." kW)"; ?>' ,
                                                style: {
                                                    left: '110px',
                                                    top: '20px',
                                                    color: '#75BAFF',
                                                    fontSize: '13px'
                                                }
                                            }, {
                                                html: 'PF: <? echo number_format($vGraPF,3,",","."); ?>',
                                                style: {
                                                    left: '30px',
                                                    top: '35px',
                                                    color: '#090',
                                                    fontSize: '13px'
                                                }
                                            }, {
                                                html: '<? echo "(".number_format($vGraPFComparativa,3,",",".").")"; ?>' ,
                                                style: {
                                                    left: '48px',
                                                    top: '50px',
                                                    color: '#0C0',
                                                    fontSize: '13px'
                                                }
                                            }]
                                        },						
                                        credits: {
                                            enabled: false
                                        },
                                        series: [{
                                            name: 'Activa (kW)',
                                            yAxis: 0,
                                            color: '#06C',
                                            data: dataDatos1						
                                        }, {
                                            name: 'Reactiva (kW)',
                                            yAxis: 0,
                                            color: '#F00',
                                            data: dataDatos2						
                                        }, {
                                            name: 'Activa Anterior (kW)',
                                            yAxis: 0,
                                            color: '#75BAFF',
                                            data: dataDatos3						
                                        }, {
                                            name: 'Reactiva Anterior (kW)',
                                            yAxis: 0,
                                            color: '#FFA4A4',
                                            data: dataDatos4						
                                        }]
                                    });
                                });
                                
                            });
                        </script>
 

                    <div id="container2" style="width: 900px; height: 500px;"></div>     
                    <br><br><br>                           

						<? 
						$numRegistros = $numHoras;						
						$swReg=0;
						$listaCategorias = "[";
						$listaDatos1 = "[";
						$listaDatos2 = "[";
						$listaDatos3 = "[";
						$listaDatos4 = "[";	
												
						while($swReg < $numHoras){
							if ($numRegistros==$swReg || $swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
							
							$grafDato = substr($listaHoras[$swReg], 0, 2);
							$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;

							$grafDato = $listaDatos['32'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos1 = $listaDatos1.$grafDato.$coma;
							
							$grafDato = $listaDatos['33'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos2 = $listaDatos2.$grafDato.$coma;
							
							$grafDato = $listaDatosComparativa['32'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos3 = $listaDatos3.$grafDato.$coma;							

							$grafDato = $listaDatosComparativa['33'][$listaHoras[$swReg]];
							if ($grafDato == "") $grafDato=0;
							$listaDatos4 = $listaDatos4.$grafDato.$coma;							
							
							$swReg++;
						}
						$listaCategorias = $listaCategorias."]";
						$listaDatos1 = $listaDatos1."]";
						$listaDatos2 = $listaDatos2."]";
						$listaDatos3 = $listaDatos3."]";
						$listaDatos4 = $listaDatos4."]";						
						?>
						<script type="text/javascript">
                            $(function () {
                                var dataCategorias = <? echo $listaCategorias; ?>;
                                var dataDatos1 = <? echo $listaDatos1; ?>;
                                var dataDatos2 = <? echo $listaDatos2; ?>;
                                var dataDatos3 = <? echo $listaDatos3; ?>;
                                var dataDatos4 = <? echo $listaDatos4; ?>;
                                                        
                                var chart;
                                $(document).ready(function() {
                                    chart = new Highcharts.Chart({
                                        chart: {
                                            renderTo: 'container3',
                                            type: 'spline',
                                            marginRight: 60,
                                            marginBottom: 70,
											backgroundColor: '#FBFBF9',
											borderRadius: 5,
											borderWidth: 1,
											borderColor: '#E4E4E4'
                                            <? include "inc/incGrafTramos.php"; ?>
                                        },
                                        title: {
                                            text: 'Energía:  <? echo $vDia." vs ".date('Y-m-d', strtotime('-1 day', strtotime($vDia))); ?>',
                                            x: 0 //center
                                        },
                                        subtitle: {
                                            text: '',
                                            x: -20
                                        },
                                        xAxis: {
                                            categories: dataCategorias											
                                        },
                                        yAxis: {
                                            //tickInterval: 2.5,
                                            //max: <? //echo $vPotContratada; ?>,
                                            title: {
                                                text: '',
                                                style: {
                                                    color: '#4572A7'
                                                }
                                            }
                                        },
                                        tooltip: {
                                            formatter: function() {
                                                    return '<b>'+ this.series.name +'</b><br/>'+
                                                    this.x +': '+ (this.y).toFixed(3) ;
                                            }
                                        },
                                        labels: {
                                            items: [{
                                                html: 'Ener Act: <? echo number_format($vGraEnerAct,3,",","."); ?> kWh' ,
                                                style: {
                                                    left: '30px',
                                                    top: '5px',
                                                    color: '#06C',
                                                    fontSize: '13px'
                                                }
                                            }, {
                                                html: '<? echo "(".number_format($vGraEnerActComparativa,3,",",".")." kWh)"; ?>' ,
                                                style: {
                                                    left: '85px',
                                                    top: '20px',
                                                    color: '#75BAFF',
                                                    fontSize: '13px'
                                                }
                                            }]
                                        },				
                                        credits: {
                                            enabled: false
                                        },
                                        series: [{
                                            name: 'Activa (kWh)',
                                            yAxis: 0,
                                            color: '#06C',
                                            data: dataDatos1						
                                        }, {
                                            name: 'Reactiva (kWh)',
                                            yAxis: 0,
                                            color: '#F00',
                                            data: dataDatos2						
                                        }, {
                                            name: 'Activa Anterior (kWh)',
                                            yAxis: 0,
                                            color: '#75BAFF',
                                            data: dataDatos3						
                                        }, {
                                            name: 'Reactiva Anterior (kWn)',
                                            yAxis: 0,
                                            color: '#FFA4A4',
                                            data: dataDatos4						
                                        }]
                                    });
                                });
                                
                            });
                        </script>

                            <div id="container3" style="width: 900px; height: 500px;"></div>   
                            <br /> 
				<? } else {    //******************************************************************************************************** ?>
                <br /><br /><br /><br /><br /><br />
                <div align="center">
					<p class="big-message black-gradient green-color" style="width:50%; text-align:center">
						<span class="big-message-icon icon-warning with-text color"></span>
						<strong style="font-size:14px">No se puede realizar una comparativa ya que no hay datos del día anterior</strong>
					</p>
                </div>
                <br /><br /><br /><br /><br /><br />
                <? } ?>	                               


                </div>				<!-- ************************  FIN tab4 - Comparativa  **************************** -->
                
                

            </div>

        </div>
	


<!-- Pantalla principal Fin -->
<?	
						} else {
							?>
							<br /><br /><br /><br /><br /><br />
							<div align="center">
								<p class="big-message black-gradient green-color" style="width:50%; text-align:center">
									<span class="big-message-icon icon-warning with-text color"></span>
									<strong style="font-size:14px">No ha lecturas en el día seleccionado</strong>
								</p>
							</div>
							<br /><br /><br /><br /><br /><br />
							<?
						}
?>

			

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
                    <li><a href="#" class="current navigable-current">Diaria</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_semana.php">Semanal</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_mes.php">Mensual</a></li>
                    <li><a href="#">Anual</a></li>
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