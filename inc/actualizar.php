<?
    session_start();
	if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
				?><script languaje="javascript">
				location.href = "../index.php";
				</script><?
	}
		
		// ************************ ES PARA LA ACTUALIZACIÓN DE LOS COSTES
		$queryCONF = mysql_query("SELECT * FROM tConfiguracion");
		$rowCONF = mysql_fetch_array($queryCONF);	

		// ********** Ciclo para 'pasar' por todos los cuadros-estaciones
		$dbCuadros = mysql_query("SELECT * FROM tCuadros");
		while($rowCuadros = mysql_fetch_array($dbCuadros)) {
			$vNumCuadro = $rowCuadros['cuaNumero'];
			$vEstacion = "Hondarribi_".$rowCuadros['cuaNumero'];
									
			// ********** Buscamos la última lectura guardada de ese cuadro-estación
			$dbLecturas = mysql_query("SELECT * FROM tLecturas 
											WHERE lectEstacion='$vEstacion' 
											ORDER BY lectFecha DESC, lectHora DESC");
			$numRegistros = mysql_num_rows($dbLecturas);
			if ($numRegistros==0) {
				$fechaAct = "2013-01-01 12:00:00";
				$fechaActFecha = "2013-01-01";
				$fechaActHora = "12:00:00";
			} else {
				$rowLecturas = mysql_fetch_array($dbLecturas);
				$fechaAct = $rowLecturas['lectFecha']." ".$rowLecturas['lectHora'];
				$fechaActFecha = $rowLecturas['lectFecha'];
				$fechaActHora = $rowLecturas['lectHora'];	
			}
		
			// ********** Miramos si hay registros de ese cuadro-estación para actualizar
			$dbh = new PDO("sqlite:db/historicos.db3");
			$sql = "SELECT * FROM Historicos WHERE Estacion='$vEstacion' AND Fecha>'$fechaAct'";
			$obj = $dbh->query($sql);
			$sw = 0;
			foreach($obj as $row) {
				$sw = 1;
				break;
			}
		
			// ********** Si hay registros para actualizar
			if ($sw==1) {
				$sql = "SELECT * FROM Historicos 
									WHERE Estacion='$vEstacion'
									AND Fecha>'$fechaAct'
									AND substr(Fecha, 15, 5)='00:00' 
									ORDER BY Fecha, Canal";
				$obj = $dbh->query($sql);
				$auxFecha = "";
				foreach($obj as $row) {
					$auxCanal = $row['Canal'];
					$auxDato = $row['Dato'];	
					if ($auxFecha != $row['Fecha']) {
						$auxEstacion = $row['Estacion'];
						$auxFecha = $row['Fecha'];
						$auxSoloFecha = substr($auxFecha, 0, 10);
						$auxSoloHora = substr($auxFecha, 11, 8);
						$consulta = "INSERT INTO tLecturas (lectEstacion, lectFecha, lectHora, lectDato$auxCanal)
										VALUES ('$auxEstacion', '$auxSoloFecha', '$auxSoloHora', '$auxDato')";
						mysql_query($consulta) or die(mysql_error());
						$auxId = mysql_insert_id();
					} else {
						$consulta = "UPDATE tLecturas SET lectDato$auxCanal='$auxDato' WHERE lectId='$auxId'";							
						mysql_query($consulta) or die(mysql_error());				
					}
				}
			
				//*************************************************************
				//*************************************************************
				//
				//	TODO ESTE APARTADO ES PARA CALCULAR Y ACTUALIZAR LOS COSTES
				//
				//*************************************************************
				//*************************************************************
				
				//echo "--   est: ".$auxBDEstacion." fec: ".$fechaActFecha."<br>";
														
				$queryBD = mysql_query("SELECT * FROM tLecturas 
												WHERE lectEstacion='$vEstacion' AND lectFecha>='$fechaActFecha'
												GROUP BY lectEstacion, lectFecha");						
				while($rowBD = mysql_fetch_array($queryBD)) {
					$auxBDEstacion = $rowBD['lectEstacion'];
					$auxBDFecha = $rowBD['lectFecha'];
					
					//echo "A   est: ".$auxBDEstacion." fec: ".$auxBDFecha."<br>";		
						
					$queryBDAct = mysql_query("SELECT * FROM tLecturas 
													WHERE lectEstacion='$auxBDEstacion' AND lectFecha='$auxBDFecha'
													ORDER BY lectHora");			
					$numRegistros = mysql_num_rows($queryBDAct);
	
					$diasMes = date('t', mktime(0,0,0, $auxMesAct, 1, $auxAnioAct));
					$resBDAnt = mysql_query("SELECT * FROM tLecturas WHERE lectEstacion='$vEstacion' 
												AND lectFecha<'$auxBDFecha' 
												ORDER BY lectFecha DESC, lectHora DESC"); 	
					$rowBDAnt = mysql_fetch_array($resBDAnt);						
					$auxEneActAntCG = $rowBDAnt['lectDato32'];
					
					$auxAnioAct = substr($auxBDFecha, 0, 4);
					$auxMesAct = substr($auxBDFecha, 5, 2);
					$auxDiaAct = substr($auxBDFecha, 8, 2);
					$diasMes = date('t', mktime(0,0,0, $auxMesAct, 1, $auxAnioAct));
					
					$queryBDHorario = mysql_query("SELECT * FROM tCambioHora WHERE camAnio=$auxAnioAct");
					$rowBDHorario = mysql_fetch_array($queryBDHorario);
					if ($auxBDFecha>=$auxAnioAct."-03".$rowBDHorario['camDiaVerano'] && $auxBDFecha<$auxAnioAct."-10".$rowBDHorario['camDiaInvierno']) {
						$auxPeriodo = "Ver";
					} else {
						$auxPeriodo = "Inv";
					}				
					
					$tPer = mysql_query("SELECT * FROM tPeriodos");
					$rowPer = mysql_fetch_array($tPer);
					
					$tTarIns = mysql_query("SELECT * FROM tTarifasCuadro WHERE tarcuaNumCuadro=$vNumCuadro"); 
					$rowTI = mysql_fetch_array($tTarIns);
					$auxTramos = $rowTI['tarcuaNTramos'];
					$auxVariable = $auxTramos.$auxPeriodo;
					
					// ***************** Este apartado es para ir acumulando la potencia activa por cada día y cuadro ************
					$consulta = "INSERT INTO tHistoricoPotenciasCuadro (potNumCuadro, potFecha)
									VALUES ('$vNumCuadro', '$auxBDFecha')";
					mysql_query($consulta) or die(mysql_error());
		
					//echo "B   cuadro:".$vNumCuadro." fecha: ".$auxBDFecha."<br>";
					
					$totPot = 0;
					// **************************************************************************************************************			
					
					// ***************** Este apartado es para ir acumulando la energía activa por cada hora en cada día por cuadro ************
					$consulta = "INSERT INTO tHistoricoEnergiasHoraCuadro (enehoraNumCuadro, enehoraFecha, enehoraPeriodo)
									VALUES ('$vNumCuadro', '$auxBDFecha', '$auxPeriodo')";
					mysql_query($consulta) or die(mysql_error());
			
					// **************************************************************************************************************				
					
					// ***************** Este apartado es para ir acumulando la energía activa por cada hora en cada día ************
					//$consulta = "INSERT INTO tPee_opBTA_HistoricoEnergiasHora (enehoraIdInstalacion, enehoraFecha, enehoraPeriodo)
					//				VALUES ('$vIdIns', '$auxBDFecha', '$auxPeriodo')";
					//mysql_query($consulta) or die(mysql_error());
					//$auxId = mysql_insert_id();	
					// **************************************************************************************************************	
		
					$sumaPotAct1 = 0; $sumaPotAct2 = 0; $sumaPotAct3 = 0;
					$sumaEneAct1 = 0; $sumaEneAct2 = 0; $sumaEneAct3 = 0;
					while($rowBDAct = mysql_fetch_array($queryBDAct)) {
						$auxHora = substr($rowBDAct['lectHora'], 0, 2);
						
						// ***************** Este apartado es para ir acumulando la energía activa por cada hora en cada día ************
						//$vEneAct = $rowBDAct['lectDato32'] - $auxEneActAntCG;
						//$consulta = "UPDATE tPee_opBTA_HistoricoEnergiasHora SET enehoraDato$auxHora='$vEneAct' WHERE enehoraId='$auxId'";							
						//mysql_query($consulta) or die(mysql_error());	
						// **************************************************************************************************************
						
						// ***************** Este apartado es para ir acumulando la energía activa por cada hora en cada día por cuadro ************
						$vEneAct = $rowBDAct['lectDato32'] - $auxEneActAntCG;
						$consulta = "UPDATE tHistoricoEnergiasHoraCuadro SET enehoraDato$auxHora='$vEneAct'
											WHERE enehoraFecha='$auxBDFecha' AND enehoraNumCuadro='$vNumCuadro'";							
						mysql_query($consulta) or die(mysql_error());									
						// **************************************************************************************************************						
						
						$totPot+= $rowBDAct['lectDato29'];
						//$totPotAO += $rowBDAct['lectDato117'];
						//$totPotH += $rowBDAct['lectDato128'];
									
						switch ($auxTramos) {
							case 1:
									$sumaPotAct1 = $sumaPotAct1 + ($rowTI['tarcuaPotContratada'] * ($rowTI['tarcuaPot1'] / ($diasMes * 24)));
									$sumaEneAct1 = $sumaEneAct1 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);				
									break;
							case 2:
									if ($auxHora>=(int)$rowPer['perP'.$auxVariable.'Punta1D'] && $auxHora<(int)$rowPer['perP'.$auxVariable.'Punta1H']) {
										$sumaPotAct1 = $sumaPotAct1 + ($rowTI['tarcuaPotContratada'] * ($rowTI['tarcuaPot1'] / ($diasMes * (int)$rowPer['perP'.$auxVariable.'PuntaHoras'])));
										$sumaEneAct1 = $sumaEneAct1 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);
									} else {
										$sumaPotAct2 = $sumaPotAct2 + ($rowTI['tarcuaPotContratada'] * ($rowTI['tarcuaPot2'] / ($diasMes * (int)$rowPer['perP'.$auxVariable.'ValleHoras'])));
										$sumaEneAct2 = $sumaEneAct2 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);							
									}
									break;
							case 3:
									if ($auxHora>=(int)$rowPer['perP'.$auxVariable.'Punta1D'] && $auxHora<(int)$rowPer['perP'.$auxVariable.'Punta1H']) {
										$sumaPotAct1 = $sumaPotAct1 + ($rowTI['tarcuaPotContratada1'] * ($rowTI['tarcuaPot1'] / ($diasMes * (int)$rowPer['perP'.$auxVariable.'PuntaHoras'])));
										$sumaEneAct1 = $sumaEneAct1 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);
									} else {
										if ($auxHora>=(int)$rowPer['perP'.$auxVariable.'Valle1D'] && $auxHora<(int)$rowPer['perP'.$auxVariable.'Valle1H']) {
											$sumaPotAct3 = $sumaPotAct3 + ($rowTI['tarcuaPotContratada3'] * ($rowTI['tarcuaPot3'] / ($diasMes * (int)$rowPer['perP'.$auxVariable.'ValleHoras'])));
											$sumaEneAct3 = $sumaEneAct3 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);						
										} else {
											$sumaPotAct2 = $sumaPotAct2 + ($rowTI['tarcuaPotContratada2'] * ($rowTI['tarcuaPot2'] / ($diasMes * (int)$rowPer['perP'.$auxVariable.'LlanoHoras'])));
											$sumaEneAct2 = $sumaEneAct2 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);							
										}
									}
									break;
							case 6:
									if ($auxHora>=(int)$rowPer['perP'.$auxVariable.'Punta1D'] && $auxHora<(int)$rowPer['perP'.$auxVariable.'Punta1H']) {
										$sumaPotAct1 = $sumaPotAct1 + ($rowTI['tarcuaPotContratada1'] * ($rowTI['tarcuaPot1'] / (int)$rowPer['perP'.$auxVariable.'PuntaHoras']));
										$sumaEneAct1 = $sumaEneAct1 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);
									} else {
										if ($auxHora>=(int)$rowPer['perP'.$auxVariable.'Valle1D'] && $auxHora<(int)$rowPer['perP'.$auxVariable.'Valle1H']) {
											$sumaPotAct3 = $sumaPotAct3 + ($rowTI['tarcuaPotContratada3'] * ($rowTI['tarcuaPot3'] / (int)$rowPer['perP'.$auxVariable.'ValleHoras']));
											$sumaEneAct3 = $sumaEneAct3 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);						
										} else {
											$sumaPotAct2 = $sumaPotAct2 + ($rowTI['tarcuaPotContratada2'] * ($rowTI['tarcuaPot2'] / (int)$rowPer['perP'.$auxVariable.'LlanoHoras']));
											$sumaEneAct2 = $sumaEneAct2 + ($rowBDAct['lectDato32'] - $auxEneActAntCG);							
										}
									}
									break;							
						}
						$auxEneActAntCG = $rowBDAct['lectDato32'];
						
						// ***************** Este apartado es para ir acumulando la potencia activa por día y cuadro ************
						$consulta = "UPDATE tHistoricoPotenciasCuadro SET potPotencia='$totPot'
											WHERE potFecha='$auxBDFecha' AND potNumCuadro='$vNumCuadro'";							
						mysql_query($consulta) or die(mysql_error());								
						// **************************************************************************************************************
											
						//echo "-Hora: ".$auxHora." -Pot: ".$rowBDAct['lectDato30']." -S1: ".$sumaPotAct1." -S2: ".$sumaPotAct2." -S3: ".$sumaPotAct3." -sw: ".$sw."<br>";
					}
					if ($auxHora == "23") {	  // Se grabasn resgitros sólo si la última hora del día son las 23, sino, es que el día no está completo
						$sumaEneAct1Cos = $sumaEneAct1 * $rowTI['tarcuaEne1'];
						$sumaEneAct2Cos = $sumaEneAct2 * $rowTI['tarcuaEne2'];
						$sumaEneAct3Cos = $sumaEneAct3 * $rowTI['tarcuaEne3'];
						$vSumaConsumos = $sumaPotAct1 + $sumaPotAct2 + $sumaPotAct3 + $sumaEneAct1Cos + $sumaEneAct2Cos + $sumaEneAct3Cos;
						//$vImpuestos = $rowTI['tarcuaImpuestoPorc'] * $vSumaConsumos / 100 * $rowTI['tarcuaImpuestoFactor'];
						$vImpuestos = 0;
						$vAlquiler = $rowTI['tarcuaAlquiler'] / $diasMes;
						$vSumaCostes = $vSumaConsumos + $vImpuestos + $vAlquiler;
						$vIva = $vSumaCostes * $rowCONF['confIva'] / 100;
						$vTotal = $vSumaCostes + $vIva;
						
						//$consulta = "INSERT INTO tCostes (cosNumCuadro, cosFecha, cosPot1, cosPot2, cosPot3, cosEne1, cosEne2, cosEne3, sumEne1, sumEne2, sumEne3, cosSumaConsumos, cosImpuestos, cosAlquiler, cosSumaCostes, cosIva, cosTotal)
										//VALUES ('$vNumCuadro', '$auxBDFecha', '$sumaPotAct1', '$sumaPotAct2', '$sumaPotAct3', '$sumaEneAct1Cos', '$sumaEneAct2Cos', '$sumaEneAct3Cos', '$sumaEneAct1', '$sumaEneAct2', '$sumaEneAct3', '$vSumaConsumos', '$vImpuestos', '$vAlquiler', '$vSumaCostes', '$vIva', '$vTotal')";
						//mysql_query($consulta) or die(mysql_error());
							
					}
				}
				//*************************************************************
				//*************************************************************
				
				
				// **************************************************************************
				// *************** NO HAY QUE REGISTRAR LOS COSTES **************************
				// **************************************************************************
			}
		}
	// ********** Borramos el historicos.db3
	unlink("db/historicos.db3");
		

?>
