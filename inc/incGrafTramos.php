						<? 
						if ($numHoras==24) {
						?>
							,
							events: {
								load: function () {
									
									// Draw the flow chart
									var ren = this.renderer;
	
									// Separator, client from service
									ren.path(['M', 55, 40, 'L', 55, 430])
										.attr({
											'stroke-width': 1,
											stroke: 'silver',
											dashstyle: 'dash',
											zIndex: 1
										})
										.add();
										
									// Separator, client from service
									ren.path(['M', 825, 40, 'L', 825, 430])
										.attr({
											'stroke-width': 1,
											stroke: 'silver',
											dashstyle: 'dash',
											zIndex: 1
										})
										.add();
										
											ren.path(['M', <? echo $vGrafSepLlano1; ?>, <? echo $vGrafInferior; ?>, 'L', <? echo $vGrafSepLlano1; ?>, <? echo $vGrafSuperior; ?>])
												.attr({
													'stroke-width': 1,
													stroke: 'silver',
													dashstyle: 'dash',
													zIndex: 1
												})
												.add();
											ren.rect(<? echo $vGrafSepLlano1; ?>, <? echo $vGrafInferior; ?>, <? echo $vGrafAnchoLlano1; ?>, <? echo $vGrafAlto; ?>, 0)
												.attr({
													'stroke-width': 0,
													fill: '<? echo $vGrafColorLlano; ?>',
                									zIndex: 0
												})
												.add();
											ren.label('Llano', <? echo $vGrafSepLlano1 + ($vGrafAnchoLlano1 / 2) - 20; ?>, <? echo $vGrafTextoY; ?>)
												.css({
													//fontWeight: 'bold'
													fontSize: '<? echo $vGrafSizeTexto; ?>',
													color: '<? echo $vGrafColorTexto; ?>'
												})
												.attr({
													zIndex: 2
												})												
												.add();	
												
																				
											ren.path(['M', <? echo $vGrafSepValle1; ?>, <? echo $vGrafInferior; ?>, 'L', <? echo $vGrafSepValle1; ?>, <? echo $vGrafSuperior; ?>])
												.attr({
													'stroke-width': 1,
													stroke: 'silver',
													dashstyle: 'dash',
													zIndex: 1
												})
												.add();	
											ren.rect(<? echo $vGrafSepValle1; ?>, <? echo $vGrafInferior; ?>, <? echo $vGrafAnchoValle1; ?>, <? echo $vGrafAlto; ?>, 0)
												.attr({
													'stroke-width': 0,
													fill: '<? echo $vGrafColorValle; ?>',
                									zIndex: 0
												})
												.add();	
											ren.label('Valle', <? echo $vGrafSepValle1 + ($vGrafAnchoValle1 / 2) - 20; ?>, <? echo $vGrafTextoY; ?>)
												.css({
													//fontWeight: 'bold'
													fontSize: '<? echo $vGrafSizeTexto; ?>',
													color: '<? echo $vGrafColorTexto; ?>'
												})
												.attr({
													zIndex: 2
												})												
												.add();											
											ren.path(['M', <? echo $vGrafSepPunta1; ?>, <? echo $vGrafInferior; ?>, 'L', <? echo $vGrafSepPunta1; ?>, <? echo $vGrafSuperior; ?>])
												.attr({
													'stroke-width': 1,
													stroke: 'silver',
													dashstyle: 'dash',
													zIndex: 1
												})
												.add();
											ren.rect(<? echo $vGrafSepPunta1; ?>, <? echo $vGrafInferior; ?>, <? echo $vGrafAnchoPunta1; ?>, <? echo $vGrafAlto; ?>, 0)
												.attr({
													'stroke-width': 0,
													fill: '<? echo $vGrafColorPunta; ?>',
                									zIndex: 0
												})
												.add();	
											ren.label('Punta', <? echo $vGrafSepPunta1 + ($vGrafAnchoPunta1 / 2) - 20; ?>, <? echo $vGrafTextoY; ?>)
												.css({
													//fontWeight: 'bold'
													fontSize: '<? echo $vGrafSizeTexto; ?>',
													color: '<? echo $vGrafColorTexto; ?>'
												})
												.attr({
													zIndex: 2
												})												
												.add();														
												
											ren.path(['M', <? echo $vGrafSepLlano2; ?>, <? echo $vGrafInferior; ?>, 'L', <? echo $vGrafSepLlano2; ?>, <? echo $vGrafSuperior; ?>])
												.attr({
													'stroke-width': 1,
													stroke: 'silver',
													dashstyle: 'dash',
													zIndex: 1
												})
												.add();	
											ren.rect(<? echo $vGrafSepLlano2; ?>, <? echo $vGrafInferior; ?>, <? echo $vGrafAnchoLlano2; ?>, <? echo $vGrafAlto; ?>, 0)
												.attr({
													'stroke-width': 0,
													fill: '<? echo $vGrafColorLlano; ?>',
                									zIndex: 0
												})
												.add();	
											ren.label('Llano', <? echo $vGrafSepLlano2 + ($vGrafAnchoLlano2 / 2) - 20; ?>, <? echo $vGrafTextoY; ?>)
												.css({
													//fontWeight: 'bold'
													fontSize: '<? echo $vGrafSizeTexto; ?>',
													color: '<? echo $vGrafColorTexto; ?>'
												})
												.attr({
													zIndex: 2
												})												
												.add();	
																											
								}
							}
						<?
						}
						?>
						
