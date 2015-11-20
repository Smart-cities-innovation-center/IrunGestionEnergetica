    <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right">	
        <li class="current"><a href="panel_control_principal.php" class="shortcut-dashboard" title="Panel de control principal">Panel de control principal</a></li>
        <li><a href="panel_alarmas.php" class="shortcut-notes" title="Alarmas">Alarmas</a></li>
        <li><a href="panel_precio_energia_redirect.php" class="shortcut-stats" title="Precio energía">Precio energía</a></li>
        <li><a href="panel_mapa_luminico.php" class="shortcut-messages" title="Mapa lumínico">Mapa lumínico</a></li>    
		<?
        if ($_SESSION["k_admin"]) {
        ?>    
            <li><a href="panel_usuarios.php" class="shortcut-contacts" title="Gestión de usuarios">Gestión de usuarios</a></li>
		<?
        }
        ?>            
    </ul>   