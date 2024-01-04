<div class="container wrap">
    <div class="containerInfo">
        <h1>Users Panel in Frontend</h1>
        <h3>Uso basico del plugin</h3>
        <p>Usar el plugin es muy fácil y sencillo. Simplemente utilice el siguiente Shortcode en cualquier lugar de la web que usted desee.</p>
        <strong>[panel_user]</strong>
        <p class="warning">Tenga en cuenta que el panel solo sera visible para el administrador del sitio.</p>
    </div>
    <?php settings_errors()?>
    <div class="adminPanelContainer">
        <form method="post" action="options.php"> 
            <?php 
                settings_fields( 'config_group' );
                do_settings_sections( 'UPF' );
                submit_button();
            ?> 
        </form>
    </div>
</div>