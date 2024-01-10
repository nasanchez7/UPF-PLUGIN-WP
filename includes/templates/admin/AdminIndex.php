<div class="container wrap">
    <div class="containerInfo">
        <h1>Users Panel in Frontend</h1>
        <h2>Basic use of the plugin</h2>
        <p>Using the plugin is very easy and simple. Simply use the following Shortcode anywhere on the website you want.</p>
        <strong>[panel_user]</strong>
        <p class="warning">Note that the panel will only be visible to the site administrator.</p>
        <h2>For gutenberg users</h2>
        <p class="warning">If you see the following error when inserting the shortcode in a page and saving the changes, don't worry, the page will be saved and the plugin will work perfectly.</p>
        <img src="<?php echo UPF_PLUGIN_URL.'includes/assets/admin/img/error.PNG'?>" style="width: 100%;"/>
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