<div class="wrap">
    <h1>Users Panel in Frontend</h1>
    <?php settings_errors()?>
    <form method="post" action="options.php"> 
        <?php 
            settings_fields( 'config_group' );
            do_settings_sections( 'UPF' );
            submit_button();
        ?> 
    </form>
</div>