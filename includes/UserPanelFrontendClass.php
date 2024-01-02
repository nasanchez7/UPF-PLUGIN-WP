<?php
/**
* @package userpanelfrontend
*/

class UserPanelFrontendClass{

    public $pluginName;

    function __construct(){
        $this->pluginName = 'userpanelfrontend';
    }

    public function initPlugin(){
        add_action('admin_init', array($this, 'linkCssAndJs'));
        add_action('admin_menu', array($this, 'addAdminPage'));
        add_filter('plugin_action_links_userpanelfrontend/userpanelfrontend.php', array($this, 'settingsLinks'));
        $this->inicialiseShortcode();
    }

    public function settingsLinks($links){
        $setting_link = '<a href="admin.php?page=UPF"> Ajustes </a>';
        array_push($links, $setting_link);
        return $links;
    }

    public function linkCssAndJs(){
        wp_register_style('estilos', plugins_url('assets/style.css', __FILE__));
        wp_enqueue_style('estilos');
        wp_register_script('codigo', plugins_url('assets/app.js', __FILE__));
        wp_enqueue_script('codigo');
    }

    public function inicialiseShortcode(){
        require_once plugin_dir_path(__FILE__).'UserPanelFrontendShortcode.php';
        function shortcodereturn() {
            return UserPanelFrontendShortcode::createShortcode();
        }
        add_shortcode('panel_users_frontend', 'shortcodereturn');
    }

    public function addAdminPage(){
        add_menu_page('
        User Panel In Frontend', 
        'User Panel In Frontend', 
        'manage_options', 
        'UPF', 
        array($this, 'adminMenuIndex'), 
        'dashicons-admin-users', 
        '1');
    }

    public function adminMenuIndex(){
        require_once plugin_dir_path(__FILE__).'templates/admin/AdminIndex.php';
    }
}

