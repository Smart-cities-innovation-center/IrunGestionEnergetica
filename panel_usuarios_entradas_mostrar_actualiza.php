            		<?
					session_start();
					if (!isset($_SESSION['k_userId']) || $_SESSION['k_userId'] == "") {
								?><script languaje="javascript">
								location.href = "index.php";
								</script><?
					}					
					$vIdUsuario = $_GET['id'];
					$vIdUsuarioEntradas = $_SESSION["k_entradas_idUsuario"];
					include("inc/conectar.php");				
					?>

			<table class="table responsive-table" id="sorting-advanced">

				<thead>
					<tr>
                        <th scope="col" class="align-center" width="12%">Fecha</th>
						<th scope="col" class="align-center" width="12%">Entrada</th>
						<th scope="col" class="align-center" width="12%">Salida</th>
						<th scope="col">Usuario</th>
                        <th scope="col">Dispositivo acceso</th>
					</tr>
				</thead>
                
				<tbody>
                	<?
						if ($vIdUsuarioEntradas != 0)
							$bdUsuariosEntradas = mysql_query("SELECT * FROM tUsuariosEntradas 
																	WHERE usuentIdUsuario = $vIdUsuarioEntradas
																	ORDER BY usuentFechaEntrada DESC, usuentHoraEntrada DESC");
						else
							$bdUsuariosEntradas = mysql_query("SELECT * FROM tUsuariosEntradas 
																	ORDER BY usuentFechaEntrada DESC, usuentHoraEntrada DESC");						

						while ($rowUsuariosEntradas = mysql_fetch_array($bdUsuariosEntradas)){
							$auxId = $rowUsuariosEntradas['usuentIdUsuario'];
							$bdUsuarios = mysql_query("SELECT * FROM tUsuarios WHERE usuIdUsuario='$auxId'");
							$rowUsuarios = mysql_fetch_array($bdUsuarios);
							$vMostrar = 1;
							if ($rowUsuarios['usuAdministradorPrincipal'] == 1 && $_SESSION["k_admin_prin"] != 1)
								$vMostrar = 0;
								
							if ($vMostrar) {
								?>
								<tr>
									<td align="center"><? echo $rowUsuariosEntradas['usuentFechaEntrada']; ?></td>
									<td align="center"><? echo $rowUsuariosEntradas['usuentHoraEntrada']; ?></td>
                                    <? 
										if ($rowUsuariosEntradas['usuentHoraSalida'] == "00:00:00")
											$vHoraSalida = "";
										else
											$vHoraSalida = $rowUsuariosEntradas['usuentHoraSalida'];
									?>
									<td align="center"><? echo $vHoraSalida; ?></td>
									<td><? echo $rowUsuarios['usuNombre']; ?></td>
                                    <td><? echo $rowUsuariosEntradas['usuentDispositivo']; ?></td>
								</tr> 
								<?
							}
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
			'aaSorting': [[ 0, 'desc' ]],
			'aoColumnDefs': [
				{ 'bSortable': false, 'aTargets': [ ]}
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



	</script>  