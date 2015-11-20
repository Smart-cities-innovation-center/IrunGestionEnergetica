            		<script src="js/developr.table.js"></script>
                    <link rel="stylesheet" href="css/styles/progress-slider.css?v=1">   
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

                    
                    <? include("panel_control_cuadro_alumbrado_telecontrol_actualiza_automanual.php"); ?> 
                    
                    <br /><br />
                    <table class="table responsive-table" id="sorting-advanced">
        
                        <thead>
                            <tr>
                                <th scope="col" class="align-center" width="8%">Id</th>
                                <th scope="col" width="30%">Dirección</th>
                                <th scope="col" class="align-center" width="12%">Potencia (W)</th>
                                <th scope="col" class="align-center">Estado</th>
                                <th scope="col" class="align-center" width="25%">Regulado al... (%)</th>                                
                            </tr>
                        </thead>
        
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <?
                                        $result = mysql_query("SELECT * FROM tCuadrosLamparasTelecontrol
																	WHERE cualamtelNumero=$vNumCuadro");
                                        $vCant = mysql_num_rows($result);
                                        echo mysql_num_rows($result)." registros encontrados";
                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?
                                $bdCuadrosLamparasTel = mysql_query("SELECT * FROM tCuadrosLamparasTelecontrol
																WHERE cualamtelNumero=$vNumCuadro
																ORDER BY cualamtelId");
                                while ($rowCuaLamTel = mysql_fetch_array($bdCuadrosLamparasTel)){
									$auxCuaIdLampara = $rowCuaLamTel['cualamtelCuaIdLampara'];
									
									$auxEstado = $rowCuaLamTel['cualamtelEstado'];
									$auxCanalEstado = $rowCuaLamTel['cualamtelCanalEstado'];
									
									if ($auxCanalEstado!=0) {
										$vEstacion = "Hondarribi_".$vNumCuadro;
										$bdValores = mysql_query("SELECT * FROM tValores
																	WHERE valEstacion='$vEstacion'
																	AND valCanal=$auxCanalEstado");
										$rowValores = mysql_fetch_array($bdValores);
										if ($rowValores['valDato'] > 0) 
											$auxEstado = 1;
										else
											$auxEstado = 0;
									}										
									
									$bdCuaLamparas = mysql_query("SELECT * FROM tCuadrosLamparas
																WHERE cualamId=$auxCuaIdLampara");
									$rowCuaLampara = mysql_fetch_array($bdCuaLamparas);
									$auxIdLampara = $rowCuaLampara['cualamIdLampara'];
																			
									$bdLamparas = mysql_query("SELECT * FROM tLamparas
																WHERE lamId=$auxIdLampara");
									$rowLampara = mysql_fetch_array($bdLamparas);							
                                ?>
                                <tr>
                                    <td class="align-center" style="vertical-align:middle;">
										<? echo $rowCuaLampara['cualamNumRef']; ?>
                                    </td>
                                    <td style="vertical-align:middle;">
										<? echo utf8_encode($rowCuaLampara['cualamDireccion']); ?>
                                    </td>
                                    <td class="align-center" style="vertical-align:middle;">
										<? //echo $rowLampara['lamPotencia']." x ".$rowCuaLampara['cualamUnidades']; ?>
                                    </td>
                                    <td class="align-center"  style="vertical-align:middle;">
                                    	<!--
                                    	<input type="checkbox" class="switch medium mid-margin-left"
                                        	name="fEstado-<? //echo $rowCuaLamTel['cualamtelId']; ?>" 
                                            id="fEstado-<? //echo $rowCuaLamTel['cualamtelId']; ?>"
                                            disabled="disabled" 
                                			value=<? //echo $auxEstado; ?> 
                                            <? //if ($auxEstado==1) { echo "checked"; } ?>
											data-text-on="on" data-text-off="off">
                                         -->  
                                            <span class="button-group">
                                                <label for="button-radio-1-<? echo $rowCuaLamTel['cualamtelId']; ?>" class="button green-active">
                                                    <input type="radio" name="button-radio-<? echo $rowCuaLamTel['cualamtelId']; ?>" 
                                                    		id="button-radio-1-<? echo $rowCuaLamTel['cualamtelId']; ?>"
                                                        <? if ($auxEstado==1) echo "checked"; ?>
                                                        disabled="disabled">
                                                    Encendido
                                                </label>
                                                <label for="button-radio-2-<? echo $rowCuaLamTel['cualamtelId']; ?>" class="button red-active">
                                                    <input type="radio" name="button-radio-<? echo $rowCuaLamTel['cualamtelId']; ?>" 
                                                    		id="button-radio-2-<? echo $rowCuaLamTel['cualamtelId']; ?>"
                                                        <? if ($auxEstado==0) echo "checked"; ?>
                                                        disabled="disabled">
                                                    Apagado
                                                </label>
                                            </span>                             
        									<br /><br />               
                                            <button 
                                            	<? 
												if ($auxEstado==1 || $rowCuaLamTel['cualamtelCanalSalida']==-1) {
													echo "class='button white-gradient glossy'";
													echo "disabled";
												} else {
													echo "class='button green-gradient glossy'";
												}
												?>
                                                onClick="iniciarPeticion(<? echo $rowCuaLamTel['cualamtelId']; ?>, 0);">
                                                On
                                            </button> 
                                            &nbsp;&nbsp;
                                            <button
                                            	<? 
												if ($auxEstado==0 || $rowCuaLamTel['cualamtelCanalSalida']==-1) {
													echo "class='button white-gradient glossy'";
													echo "disabled";
												} else {
													echo "class='button red-gradient glossy'";
												}
												?>                                                
                                                onClick="iniciarPeticion(<? echo $rowCuaLamTel['cualamtelId']; ?>, 1);">
                                                Off
                                            </button>                                               
                                	</td>
                                    <td class="align-center" style="vertical-align:middle;">
										<input type="text" class="input demo-slider" size="1"
                                        	name="fPorcPotencia-<? echo $rowCuaLamTel['cualamtelId']; ?>" 
                                            id="fPorcPotencia-<? echo $rowCuaLamTel['cualamtelId']; ?>" 
                                        	value="<? echo $rowCuaLamTel['cualamtelRegulador']; ?>" 
                                            data-slider-options='{
                                            		"hideInput":true,
                                            		"size":false,
                                                    "innerMarks":20,
                                                    "step":5,
                                                    "stickToStep":false,
                                                    "autoSpacing":true,
                                                    "topMarks":20,
                                                    "topLabel":"[value]%",
                                                    "bottomMarks":20,
                                                    "barMode":"min",
                                                    "barClasses":["green-gradient","glossy"]
                                             }'
                                        >
                                        <br><br>
                                        <button class="button glossy"
                                            <? if ($rowCuaLamTel['cualamtelIdLamRegulacion']==0) echo "disabled"; ?>
                                            onClick="iniciarRegulacion(<? echo $rowCuaLamTel['cualamtelId']; ?>);">
                                            <span class="button-icon red-gradient"><span class="icon-tick"></span></span>
                                            Confirmar&nbsp;&nbsp;
                                        </button>                                                                             
                                	</td>                                    
                                </tr> 
                                <?
                                }
                                ?>
                                <input type="hidden" name="idTelecontrol" id="idTelecontrol" value=0>
                        </tbody>
        
                    </table>
                    
                    <br /><br />
                    
                    <? include("panel_control_cuadro_alumbrado_telecontrol_actualiza_todo.php"); ?> 

                    					
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
	    $('#sorting-example2').tablesorter({
			headers: {
				5: { sorter: false }
			}
		});

	</script>    

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