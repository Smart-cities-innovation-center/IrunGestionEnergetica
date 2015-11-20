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
					include("inc/conectar.php");
					?>

                    <table class="table responsive-table" id="sorting-advanced">
        
                        <thead>
                            <tr>
                                <th scope="col" class="align-center">Id</th>
                                <th scope="col">Dirección</th>
                                <th scope="col" class="align-center">Estado</th>
                            </tr>
                        </thead>
        
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <?
                                        $result = mysql_query("SELECT * FROM tCuadrosIndicadoresTelecontrol
																	WHERE cuaindtelNumero=$vNumCuadro
																	AND cuaindtelSubTipoSinFormato='$vIndicadorSelSinFormato'");
                                        $vCant = mysql_num_rows($result);
                                        echo mysql_num_rows($result)." registros encontrados";
                                    ?>
                                </td>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?
                                $bdCuadrosIndicadoresTel = mysql_query("SELECT * FROM tCuadrosIndicadoresTelecontrol
																WHERE cuaindtelNumero=$vNumCuadro
																AND cuaindtelSubTipoSinFormato='$vIndicadorSelSinFormato'
																ORDER BY cuaindtelId");
                                while ($rowCuaIndTel = mysql_fetch_array($bdCuadrosIndicadoresTel)){
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
									$vCant1 = mysql_num_rows($result);						
                                ?>
                                <tr>
                                    <td class="align-center" style="vertical-align:middle;"><? echo $rowCuaIndicadores['cuaindNumRef']; ?></td>
                                    <td style="vertical-align:middle;"><? echo utf8_encode($rowCuaIndicadores['cuaindDireccion']); ?></td>
                                    <td class="align-center" style="vertical-align:middle;">
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
				{ 'bSortable': false, 'aTargets': [ 2 ] }
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
				3: { sorter: false }
			}
		});

	</script>  