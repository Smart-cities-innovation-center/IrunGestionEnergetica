<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "index.php";
				</script><?
	}
	$vIdUsuario = $_SESSION['k_userId'];
	$vNumCuadro = $_SESSION["k_numCuadro"];
	
	$vEstacion = "Hondarribi_".$vNumCuadro;
	
	$vFechaInicio = $_SESSION["k_M_anioInicio"]."-".$_SESSION["k_M_mesInicio"]."-"."01";
	$vAnio = substr($vFechaInicio, 0, 4);
	$vMes = substr($vFechaInicio, 5, 2);
	$vFechaFin = date('Y-m-d', strtotime('-1 day', strtotime('+1 month', strtotime($vFechaInicio))));
	
	$listaMeses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
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
        function mesSiguiente()
        {
            var nMes = parseInt(document.getElementById('dMes').value);
            var nAnio = parseInt(document.getElementById('dAnio').value);
    
            if (nMes==12) {
                nMes=1;
                nAnio=nAnio+1;
            } else {
                nMes=nMes+1;
            }
    
            document.getElementById('dMes').value = nMes;
            document.getElementById('dAnio').value = nAnio;
        }
    
        function mesAnterior(anio, mes)
        {
            var nMes = parseInt(document.getElementById('dMes').value);
            var nAnio = parseInt(document.getElementById('dAnio').value);
    
            if (nMes==1) {
                nMes=12;
                nAnio=nAnio-1;
            } else {
                nMes=nMes-1;
            }
    
            document.getElementById('dMes').value = nMes;
            document.getElementById('dAnio').value = nAnio;
        }
		
		function mostrar() {
            var nMes = parseInt(document.getElementById('dMes').value);
            var nAnio = parseInt(document.getElementById('dAnio').value);

            document.getElementById('dMes').value = nMes;
            document.getElementById('dAnio').value = nAnio;			
			document.datosform.submit();
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
				Panel de control Cuadro <? echo $vNumCuadro; ?> . Alumbrado . Lecturas . Mensual . <span class="orange"><? echo $listaMeses[(int)$vMes]." ".$vAnio; ?></span>
			</p>
			<br>
            
<!-- Pantalla principal Inicio -->

                        <form action="lecturas_redirect.php" method="post" name="datosform" >
							<input type="hidden" id="periodo_tipo" name="periodo_tipo" value="M">
                            <div class="button-height" align="center">
                                <button type="submit" class="button glossy mid-margin-right" alt="Mes anterior" title="Mes anterior"
                                    onclick="mesAnterior();">
                                    <span class="button-icon"><span class="icon-reply"></span></span>
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								<?
                                $queryAnios = mysql_query("SELECT lectEstacion, lectFecha FROM tLecturas 
																	WHERE lectEstacion='$vEstacion'
																	GROUP BY YEAR(lectFecha)");										
                                ?>
                                <select id="dAnio" name="dAnio" class="select check-list">
                                <?	
                                    while($rowAnios = mysql_fetch_array($queryAnios)){
                                ?> 
                                        <option value=<? echo substr($rowAnios['lectFecha'], 0, 4); ?> <? if (substr($rowAnios['lectFecha'], 0, 4)==$vAnio) { echo 'selected'; } ?> ><? echo substr($rowAnios['lectFecha'], 0, 4)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></option>
                                <? } ?>
                                </select>
                                &nbsp;
                                
                                 <select id="dMes" name="dMes" size="1" class="select check-list">
                                    <option value="1" <? if ($vMes==1) { echo 'selected'; } ?> >Enero</option>
                                    <option value="2" <? if ($vMes==2) { echo 'selected'; } ?> >Febrero</option>
                                    <option value="3" <? if ($vMes==3) { echo 'selected'; } ?> >Marzo</option>
                                    <option value="4" <? if ($vMes==4) { echo 'selected'; } ?> >Abril</option>
                                    <option value="5" <? if ($vMes==5) { echo 'selected'; } ?> >Mayo</option>
                                    <option value="6" <? if ($vMes==6) { echo 'selected'; } ?> >Junio</option>
                                    <option value="7" <? if ($vMes==7) { echo 'selected'; } ?> >Julio</option>
                                    <option value="8" <? if ($vMes==8) { echo 'selected'; } ?> >Agosto</option>
                                    <option value="9" <? if ($vMes==9) { echo 'selected'; } ?> >Septiembre</option>
                                    <option value="10" <? if ($vMes==10) { echo 'selected'; } ?> >Octubre</option>
                                    <option value="11" <? if ($vMes==11) { echo 'selected'; } ?> >Noviembre</option>
                                    <option value="12" <? if ($vMes==12) { echo 'selected'; } ?> >Diciembre</option>
                                </select>
                                &nbsp;
                                
                                <button type="submit" class="button glossy grey-gradient mid-margin-right" alt="Ver" title="Ver"
                                    onclick="mostrar();">Ver
                                </button>                                   
                                       
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" class="button glossy mid-margin-right" alt="Mes siguiente" title="Mes siguiente"
                                    onclick="mesSiguiente();">
                                    <span class="button-icon right-side"><span class="icon-fwd"></span></span>
                                </button> 
                            </div> 							
                        </form> 
                        <br><br>

<?
						$resBD = mysql_query("SELECT * FROM tLecturas WHERE lectEstacion='$vEstacion' 
													AND lectFecha>='$vFechaInicio' AND lectFecha<='$vFechaFin'
													ORDER BY lectFecha, lectHora");
						$numRegistrosReal = mysql_num_rows($resBD);
						
						$resBDAnt = mysql_query("SELECT * FROM tLecturas WHERE lectEstacion='$vEstacion' 
													AND lectFecha<'$vFechaInicio' 
													ORDER BY lectFecha DESC, lectHora DESC");								
						$rowBDAnt = mysql_fetch_array($resBDAnt);
																							
						if ($numRegistrosReal!=0) {      // Incio de if de que SI hay datos	
							//Para el cálculo de los valores del día anterior de las energías que hay que sacar en los 'totales'
							$vEAnt[32] = $rowBDAnt['lectDato32'];
							$vEAnt[33] = $rowBDAnt['lectDato33'];
							
							//-------------------------------------- Borrar el contenido de la tabla Periodo
							//	
							$res = mysql_query ("DELETE FROM tLecturasPeriodo");
							mysql_query($res);
							
							//-------------------------------------- Lista de canales auxiliar
							//								
							$listaCanalesAux=array("29","30","32","33","34","35","36","37","38","39","40","41","42","43","44");
							$listaTotalDia=array();
							$numCanalesAux=15;							
							
							//-------------------------------------- Calculamos medias y resto de datos por día
							//	
							$contDiasReal = 0;
							$rowBD = mysql_fetch_array($resBD);																					
							do {
								$contDiasReal++;
								for($fil=0;$fil<$numCanalesAux;$fil++) {
									$listaTotalDia[$listaCanalesAux[$fil]] = 0;
								}
								$fechaAux = $rowBD['lectFecha'];
								$numHorasDia = 0;
								
								$res = "INSERT INTO tLecturasPeriodo (lectFecha)
															VALUES ('$fechaAux')"; 
								mysql_query($res) or die(mysql_error());									
								
								while($fechaAux==$rowBD['lectFecha']) {
									for($fil=0;$fil<$numCanalesAux;$fil++) {
										$auxFil = $listaCanalesAux[$fil];
										if ($auxFil==32 || $auxFil==33) {
											$listaTotalDia[$auxFil] = $rowBD['lectDato'.$auxFil];
										} else {
											$listaTotalDia[$auxFil] += $rowBD['lectDato'.$auxFil];
										}
									}
									$numHorasDia++;
									$rowBD = mysql_fetch_array($resBD);
								}
								for($fil=0;$fil<$numCanalesAux;$fil++) {
									$auxFil = $listaCanalesAux[$fil];
									if ($auxFil==32 || $auxFil==33) {
										$auxE = $listaTotalDia[$auxFil];
										$listaTotalDia[$auxFil] = $listaTotalDia[$auxFil] - $vEAnt[$auxFil];
										$vEAnt[$auxFil] = $auxE;
									} else {
										$listaTotalDia[$auxFil] = $listaTotalDia[$auxFil] / $numHorasDia;
									}
									$query = "UPDATE tLecturasPeriodo
													SET lectDato$auxFil='$listaTotalDia[$auxFil]'
													WHERE lectFecha='$fechaAux'";
									mysql_query($query) or die(mysql_error());								
								}
							} while($rowBD);
							
							//-------------------------------------- Conceptos y canales
							//								
							$conceptos = array('Pact (kW)', 'Preac (Kvar)', 'Eact (kWh)', 'Ereac (Kvar x h)', 'PF', 'Frecuencia', 'Pact<sub>R</sub>', 'Preact<sub>R</sub>', 'PF<sub>R</sub>', 'Pact<sub>S</sub>', 'Preact<sub>S</sub>', 'PF<sub>S</sub>',  'Pact<sub>T</sub>', 'Preact<sub>T</sub>', 'PF<sub>T</sub>');

							$listaCanales=array("29","30","32","33","34","35","36","37","38","39","40","41","42","43","44"); 													
							

							//-------------------------------------- Lista de los días del periodo seleccionado
							//								
							$listaDias=array();
							$contDias = 0;
							$vDiaAux = strtotime($vFechaInicio);
							while ($vDiaAux<=strtotime($vFechaFin)) {
								$vDiaAuxTxt = date('Y-m-d',$vDiaAux);
								$listaDias[$contDias] = substr($vDiaAuxTxt, 8, 2)."-".substr($vDiaAuxTxt, 5, 2);
								$contDias++;
								$vDiaAux = strtotime('+1 day', $vDiaAux);
							}
						
							$numCanales = 15;
							for($fil=0;$fil<$numCanales;$fil++) {
								for($col=0;$col<$contDias;$col++) {
									$listaDatos[$listaCanales[$fil]][$listaDias[$col]]=0;
								}
							}
							
							//-------------------------------------- Pasamos los datos de la base de datos a la tabla
							//								
							$resBD = mysql_query("SELECT * FROM tLecturasPeriodo
													ORDER BY lectFecha");
							while($rowBD = mysql_fetch_array($resBD)) {
								$iCol = substr($rowBD['lectFecha'],8,2)."-".substr($rowBD['lectFecha'], 5, 2);
								for ($fil=0;$fil<$numCanales;$fil++) {
									$iFil = $listaCanales[$fil];
									$listaDatos[$iFil][$iCol] = $rowBD['lectDato'.$iFil];
									//echo "Fila: ".$iFil." - Col: ".$iCol." - Dato: ".$rowBD['lectDato'.$iFil]."<br>";
								}
							}						
							
							//-------------------------------------- Calculamos las medias para sacar en los totales
							//								
							$listaTotales=array();
							for($fil=0;$fil<$numCanales;$fil++) {
								$vSuma = 0;
								$vAuxCanal = $listaCanales[$fil];
								for($col=0;$col<$contDias;$col++) {	
									$vSuma = $vSuma + (float)$listaDatos[$vAuxCanal][$listaDias[$col]];
								}
								$listaTotales[$vAuxCanal] = $vSuma;
								if ($vAuxCanal==32 || $vAuxCanal==33) {
										$listaTotales[$vAuxCanal] = $vSuma;
									} else {
										$listaTotales[$vAuxCanal] = $vSuma / $contDiasReal;
								}
							}	
						
							//-------------------------------------- Calculamos suma de Eact, Ereac, Pot max y PF para sacar en el gráfico
							//							
							$vGraEnerAct = 0; $vGraEnerReac = 0; $vGraPotMax = 0;
							for($col=0;$col<$contDias;$col++) {	
								$vGraEnerAct = $vGraEnerAct + (float)$listaDatos['32'][$listaDias[$col]];
								$vGraEnerReac = $vGraEnerReac + (float)$listaDatos['33'][$listaDias[$col]];
								if ($listaDatos['29'][$listaDias[$col]] > $vGraPotMax)
									$vGraPotMax = $listaDatos['29'][$listaDias[$col]];
							}
							$vGraPF = $vGraEnerAct / sqrt(pow($vGraEnerAct, 2) + pow($vGraEnerReac, 2))								

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
					$numRegistros = $contDias;						
					$swReg=0;
					$listaCategorias = "[";
					$listaDatos1 = "[";
					$listaDatos2 = "[";					
                    
                    while($swReg < $contDias){
						if ($swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
						
						$grafDato = substr($listaDias[$swReg], 0, 2);
						$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
				
						$grafDato = $listaDatos['29'][$listaDias[$swReg]];
						$listaDatos1 = $listaDatos1.$grafDato.$coma;		
				
						$grafDato = $listaDatos['30'][$listaDias[$swReg]];
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
                                <? //include "../inc/incGrafTramosBT.php"; ?>
                            },
                            title: {
                                text: 'Potencias:  <? echo $listaMeses[(int)$vMes]."-".$vAnio; ?>',
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
					$numRegistros = $contDias;						
					$swReg=0;
					$listaCategorias = "[";
					$listaDatos1 = "[";
					$listaDatos2 = "[";
			
					while($swReg < $contDias){
						if ($swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
						
						$grafDato = substr($listaDias[$swReg], 0, 2);
						$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
				
						$grafDato = $listaDatos['32'][$listaDias[$swReg]];
						$listaDatos1 = $listaDatos1.$grafDato.$coma;
				
						$grafDato = $listaDatos['33'][$listaDias[$swReg]];
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
                                        <? //include "../inc/incGrafTramosBT.php"; ?>
                                    },
                                    title: {
                                        text: 'Energía:  <? echo $listaMeses[(int)$vMes]."-".$vAnio; ?>',
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
                                        for ($i=0;$i<16;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaDias[$i]; ?></th>
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
                                            for($col=0;$col<16;$col++) {
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaDias[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ($listaDatos['29'][$listaDias[$col]]!=0 && $listaDatos['32'][$listaDias[$col]]!=0) 
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
                                        for ($i=16;$i<$contDias;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaDias[$i]; ?></th>
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
                                            for($col=16;$col<$contDias;$col++) {
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaDias[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ($listaDatos['29'][$listaDias[$col]]!=0 && $listaDatos['32'][$listaDias[$col]]!=0) 
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
                    <br>
                        <table class="simple-table responsive-table">
							<thead>
                                <tr>
                                    <th scope="col" class="align-left blue-gradient white">Concepto</th>
                                    <?
                                        for ($i=0;$i<16;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaDias[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) { // Hay 14 canales con datos de CG
									$vAuxCanal = $listaCanales[$fil];
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                    <?
                                            for($col=0;$col<16;$col++) {
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaDias[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ($listaDatos['29'][$listaDias[$col]]!=0 && $listaDatos['32'][$listaDias[$col]]!=0) 
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
                                        for ($i=16;$i<$contDias;$i++) {
                                    ?>
                                            <th scope="col" class="align-center blue-gradient white"><? echo $listaDias[$i]; ?></th>
                                    <? 	} 
                                    ?>
                                </tr>
                            </thead>
                            <tbody> 
                            <?
								for($fil=0;$fil<$numCanales;$fil++) { // Hay 14 canales con datos de CG
									$vAuxCanal = $listaCanales[$fil];
							?>		
                                        <tr>
                                            <th scope="row" class="align-left silver-gradient"><? echo $conceptos[$fil]; ?></th>
                                    <?
                                            for($col=16;$col<$contDias;$col++) {
												$valorDato = $listaDatos[$listaCanales[$fil]][$listaDias[$col]];
                                    ?>
                                                <td align="center">
												<? 
													if ($listaDatos['29'][$listaDias[$col]]!=0 && $listaDatos['32'][$listaDias[$col]]!=0) 
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
									$vAuxCanal = $listaCanales[$fil];
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
                            </tbody>
                        </table>   
                        <br /> 
                </div>				<!-- ************************  FIN tab3 - Lecturas totales  **************************** -->

                <div id="tab-4" class="with-padding">						<!-- ************************  INICIO tab4 - Comparativa  **************************** -->
                	<br>
					<?
					$vFechaInicio =  date('Y-m-d', strtotime('-1 month', strtotime($vFechaInicio)));
					$vAnioAnt = substr($vFechaInicio, 0, 4);
					$vMesAnt = substr($vFechaInicio, 5, 2);
					$vFechaFin = date('Y-m-d', strtotime('-1 month', strtotime($vFechaFin)));
					
					$resBD = mysql_query("SELECT * FROM tLecturas WHERE lectEstacion='$vEstacion' 
												AND lectFecha>='$vFechaInicio' AND lectFecha<='$vFechaFin'
												ORDER BY lectFecha, lectHora"); 
					$numRegistrosReal = mysql_num_rows($resBD);				
					
					$resBDAnt = mysql_query("SELECT * FROM tLecturas WHERE lectEstacion='$vEstacion' 
												AND lectFecha<'$vFechaInicio' 
												ORDER BY lectFecha DESC, lectHora DESC");		
					$numRegistrosMesAnterior = mysql_num_rows($resBDAnt);					
					
					if ($numRegistrosMesAnterior>0){  //Hay datos de meses anteriores
						$rowBDAnt = mysql_fetch_array($resBDAnt);
						
						$vEAnt[32] = $rowBDAnt['lectDato32'];
						$vEAnt[33] = $rowBDAnt['lectDato33'];
						
						$res = mysql_query ("DELETE FROM tLecturasPeriodo");
						mysql_query($res);								
						
						$listaCanalesComparativa=array("29","30","32","33"); 
						$listaTotalDia=array();
						$numCanalesAux=4;

						$contDiasReal = 0;
						$rowBD = mysql_fetch_array($resBD);																					
						do {
							$contDiasReal++;
							for($fil=0;$fil<$numCanalesAux;$fil++) {
								$listaTotalDia[$listaCanalesComparativa[$fil]] = 0;
							}
							$fechaAux = $rowBD['lectFecha'];
							$numHorasDia = 0;
							
							$res = "INSERT INTO tLecturasPeriodo (lectFecha)
														VALUES ('$fechaAux')"; 
							mysql_query($res) or die(mysql_error());									
							
							while($fechaAux==$rowBD['lectFecha']) {
								for($fil=0;$fil<$numCanalesAux;$fil++) {
									$auxFil = $listaCanalesComparativa[$fil];
									if ($auxFil==32 || $auxFil==33) {
										$listaTotalDia[$auxFil] = $rowBD['lectDato'.$auxFil];
									} else {
										$listaTotalDia[$auxFil] += $rowBD['lectDato'.$auxFil];
									}
								}
								$numHorasDia++;
								$rowBD = mysql_fetch_array($resBD);
							}
							for($fil=0;$fil<$numCanalesAux;$fil++) {
								$auxFil = $listaCanalesComparativa[$fil];
								if ($auxFil==32 || $auxFil==33) {
									$auxE = $listaTotalDia[$auxFil];
									$listaTotalDia[$auxFil] = $listaTotalDia[$auxFil] - $vEAnt[$auxFil];
									$vEAnt[$auxFil] = $auxE;
								} else {
									$listaTotalDia[$auxFil] = $listaTotalDia[$auxFil] / $numHorasDia;
								}
								$query = "UPDATE tLecturasPeriodo
												SET lectDato$auxFil='$listaTotalDia[$auxFil]'
												WHERE lectFecha='$fechaAux'";
								mysql_query($query) or die(mysql_error());								
							}
						} while($rowBD);		
						
						
						$listaDiasComparativa=array();
						$contDias = 0;
						$vDiaAux = strtotime($vFechaInicio);
						while ($vDiaAux<=strtotime($vFechaFin)) {
							$vDiaAuxTxt = date('Y-m-d',$vDiaAux);
							$listaDiasComparativa[$contDias] = substr($vDiaAuxTxt, 8, 2)."-".substr($vDiaAuxTxt, 5, 2);
							$contDias++;
							$vDiaAux = strtotime('+1 day', $vDiaAux);
						}
					
						$numCanales = 4;
						for($fil=0;$fil<$numCanales;$fil++) {
							for($col=0;$col<$contDias;$col++) {
								$listaDatosComparativa[$listaCanalesComparativa[$fil]][$listaDiasComparativa[$col]]=0;
							}
						}
					
						$resBD = mysql_query("SELECT * FROM tLecturasPeriodo
												ORDER BY lectFecha");
						while($rowBD = mysql_fetch_array($resBD)) {
							$iCol = substr($rowBD['lectFecha'],8,2)."-".substr($rowBD['lectFecha'], 5, 2);
							for ($fil=0;$fil<$numCanales;$fil++) {
								$iFil = $listaCanalesComparativa[$fil];
								$listaDatosComparativa[$iFil][$iCol] = $rowBD['lectDato'.$iFil];
								//echo "Fila: ".$iFil." - Col: ".$iCol." - Dato: ".$rowBD['lectDato'.$iFil]."<br>";
							}
						}	
						
						$vGraEnerActComparativa = 0; $vGraEnerReacComparativa = 0; $vGraPotMaxComparativa = 0;
						for($col=0;$col<$contDias;$col++) {	
							$vGraEnerActComparativa = $vGraEnerActComparativa + (float)$listaDatosComparativa['32'][$listaDiasComparativa[$col]];
							$vGraEnerReacComparativa = $vGraEnerReacComparativa + (float)$listaDatosComparativa['33'][$listaDiasComparativa[$col]];
							if ($listaDatosComparativa['29'][$listaDiasComparativa[$col]] > $vGraPotMaxComparativa)
								$vGraPotMaxComparativa = $listaDatosComparativa['29'][$listaDiasComparativa[$col]];
						}
						
						if ($vGraEnerReacComparativa == 0)
							$vGraPFComparativa = 0;
						else
							$vGraPFComparativa = $vGraEnerActComparativa / sqrt(pow($vGraEnerActComparativa, 2) + pow($vGraEnerReacComparativa, 2));
					?> 					

                    <script src="jsGraf/highcharts.js"></script>
                    <script src="jsGraf/modules/exporting.js"></script>
    
					<?
					$numRegistros = $contDias;						
					$swReg=0;
					$listaCategorias = "[";
					$listaDatos1 = "[";
					$listaDatos2 = "[";						
					$listaDatos3 = "[";
					$listaDatos4 = "[";	
						
					while($swReg < $contDias){
						if ($swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
						
						$grafDato = substr($listaDias[$swReg], 0, 2);
						$listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
		
						$grafDato = $listaDatos['29'][$listaDias[$swReg]];
						$listaDatos1 = $listaDatos1.$grafDato.$coma;
						
						$grafDato = $listaDatos['30'][$listaDias[$swReg]];
						$listaDatos2 = $listaDatos2.$grafDato.$coma;							
		
						$grafDato = $listaDatosComparativa['29'][$listaDiasComparativa[$swReg]];
						$listaDatos3 = $listaDatos3.$grafDato.$coma;	
						
						$grafDato = $listaDatosComparativa['30'][$listaDiasComparativa[$swReg]];
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
										<? //include "../inc/incGrafTramosBT.php"; ?>
									},
									title: {
										text: 'Potencias:  <? echo $listaMeses[(int)$vMes]."-".$vAnio." vs ".$listaMeses[(int)$vMesAnt]."-".$vAnioAnt; ?>',
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
                    $numRegistros = $contDias;						
                    $swReg=0;
                    $listaCategorias = "[";
                    $listaDatos1 = "[";
                    $listaDatos2 = "[";
                    $listaDatos3 = "[";
                    $listaDatos4 = "[";	
                                            
                    while($swReg < $contDias){
                        if ($swReg==$numRegistros-1) { $coma=""; } else { $coma=","; }
                        
                        $grafDato = substr($listaDias[$swReg], 0, 2);
                        $listaCategorias = $listaCategorias."'".$grafDato ."'".$coma;
        
                        $grafDato = $listaDatos['32'][$listaDias[$swReg]];
                        $listaDatos1 = $listaDatos1.$grafDato.$coma;
                        
                        $grafDato = $listaDatos['33'][$listaDias[$swReg]];
                        $listaDatos2 = $listaDatos2.$grafDato.$coma;
                        
                        $grafDato = $listaDatosComparativa['32'][$listaDiasComparativa[$swReg]];
                        $listaDatos3 = $listaDatos3.$grafDato.$coma;							
        
                        $grafDato = $listaDatosComparativa['33'][$listaDiasComparativa[$swReg]];
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
                                        <? //include "../inc/incGrafTramosBT.php"; ?>
                                    },
                                    title: {
                                        text: 'Energía:  <? echo $listaMeses[(int)$vMes]."-".$vAnio." vs ".$listaMeses[(int)$vMesAnt]."-".$vAnioAnt; ?>',
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
						<strong style="font-size:14px">No se puede realizar una comparativa ya que no hay datos del mes anterior</strong>
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
									<strong style="font-size:14px">No ha lecturas en el mes seleccionado</strong>
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
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_dia.php">Diaria</a></li>
                    <li><a href="panel_control_cuadro_alumbrado_lecturas_semana.php">Semanal</a></li>
                    <li><a href="#" class="current navigable-current">Mensual</a></li>
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