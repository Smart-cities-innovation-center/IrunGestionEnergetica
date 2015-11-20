            		<script src="js/developr.table.js"></script>
					<?
					session_start();
					if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
								?><script languaje="javascript">
								location.href = "index.php";
								</script><?
					}					
					$vIdUsuario = $_SESSION['k_userId'];
					$vNumCuadro = $_SESSION["k_numCuadro"];
					include("inc/conectar.php");
					?>
	                <table class="table responsive-table" id="sorting-advanced">
        
                        <thead>
                            <tr>
                                <th scope="col">Zona</th>
                                <th scope="col" class="align-center">Total Potencia (W)</th>
                                <th scope="col" class="align-center">Total Unidades</th>
                                <th scope="col" class="align-center">Estado</th>
                            </tr>
                        </thead>
                         
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <?
                                        $result = mysql_query("SELECT cuaserZonaNum FROM tCuadrosServicios
																WHERE cuaserNumero=$vNumCuadro AND cuaserZonaNum<>'' 
																GROUP BY cuaserZonaNum");
                                        $vCant = mysql_num_rows($result);
                                        echo mysql_num_rows($result)." registros encontrados";
                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                                                       
                        <tbody>
                            <?
								$vEstacion = "Hondarribi_".$vNumCuadro;
								$auxCanal = 29;
								$bdValores = mysql_query("SELECT * FROM tValores
															WHERE valEstacion='$vEstacion'
															AND valCanal=$auxCanal");
								$rowValores = mysql_fetch_array($bdValores);
								if ($rowValores['valDato'] > 0.05) 
									$auxEstado = 1;
								else
									$auxEstado = 0;						

                                $bdCuadrosServicios = mysql_query("SELECT cuaserZona, cuaserZonaNum FROM tCuadrosServicios
																WHERE cuaserNumero=$vNumCuadro AND cuaserZonaNum<>'' 
																GROUP BY cuaserZonaNum");
                                while ($rowCuadrosServicios = mysql_fetch_array($bdCuadrosServicios)){
									$auxZona = $rowCuadrosServicios['cuaserZona'];
									$auxZonaNum = $rowCuadrosServicios['cuaserZonaNum'];
																		
									$tUnidades = 0;
									$tPotencia = 0;
									$bdCuaLamparas = mysql_query("SELECT * FROM tCuadrosLamparas
																WHERE cualamZonaNum=$auxZonaNum");
									while ($rowCuaLamparas = mysql_fetch_array($bdCuaLamparas)){							
										$auxIdLam = $rowCuaLamparas['cualamIdLampara'];
										$tUnidades += $rowCuaLamparas['cualamUnidades'];

										$bdLamparas = mysql_query("SELECT * FROM tLamparas
																	WHERE lamId=$auxIdLam");
										$rowLamparas = mysql_fetch_array($bdLamparas);
										$tPotencia += ($rowCuaLamparas['cualamUnidades'] * $rowLamparas['lamPotencia']);
									}							
                                ?>
                                <tr>
                                    <td style="vertical-align:middle;"><? echo utf8_encode($auxZona); ?></td>
                                    <td class="align-center" style="vertical-align:middle;"><? echo number_format($tPotencia,0,",","."); ?></td>
                                    <td class="align-center" style="vertical-align:middle;"><? echo $tUnidades; ?></td>
                                    <td class="align-center" style="vertical-align:middle;">
                                        <span class="button-group">
                                            <label for="button-radio-1" class="button green-active">
                                                <input type="radio" name="button-radio" id="button-radio-1"
                                                    <? if ($auxEstado==1) echo "checked"; ?>
                                                    disabled="disabled">
                                                Encendido
                                            </label>
                                            <label for="button-radio-2" class="button red-active">
                                                <input type="radio" name="button-radio" id="button-radio-2"
                                                    <? if ($auxEstado==0) echo "checked"; ?>
                                                    disabled="disabled">
                                                Apagado
                                            </label>
                                        </span>                             
                                    </td>
                                </tr> 
                                <?
                                }
                                ?>
                        </tbody>
        
                    </table> 
					
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
	   /* $('#sorting-example2').tablesorter({
			headers: {
				5: { sorter: false }
			}
		});*/

	</script>   