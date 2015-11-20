                    <table class="table responsive-table">
        
                        <thead>
                            <tr>
                                <th scope="col" class="align-center">Poner estado de todo el cuadro en..</th>
                                <th scope="col" class="align-center">Regular todo el cuadro al... (%)</th>                                
                            </tr>
                        </thead>
                                
                        <tbody>
                                <tr>
                                    <td class="align-center"  style="vertical-align:middle;">
                                            <!--
                                            <span class="button-group">
                                                <label class="button green-active">
                                                    <input type="radio" disabled="disabled">Encendido
                                                </label>
                                                <label class="button red-active">
                                                    <input type="radio" disabled="disabled">Apagado
                                                </label>
                                            </span>                             
        									<br /><br /> 
                                           	-->              
                                            <button class="button green-gradient glossy"
                                            	onClick="iniciarPeticion(99, 0);">
                                            On</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button class="button red-gradient glossy"
                                            	onClick="iniciarPeticion(99, 1);">
                                            Off</button>                                              
                                	</td>
                                    <td class="align-center" style="vertical-align:middle;">
										<input type="text" class="input demo-slider" size="1" name="aa"
                                        	value="100" 
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
                                        <button class="button glossy" disabled>
                                            <span class="button-icon red-gradient"><span class="icon-tick"></span></span>
                                            Confirmar&nbsp;&nbsp;
                                        </button>                                                                             
                                	</td>                                    
                                </tr> 
                        </tbody>
        
                    </table> 

