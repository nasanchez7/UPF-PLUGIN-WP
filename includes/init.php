<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

use Inc\Shortcode;

final class Init{

    public $pluginName;

    function __construct(){
        $this->pluginName = 'userpanelfrontend';
    }

    public function register_services(){
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
        wp_register_style('estilos', UPF_PLUGIN_URL.'includes/assets/style.css');
        wp_enqueue_style('estilos');
        wp_register_script('codigo', UPF_PLUGIN_URL.'includes/assets/app.js');
        wp_enqueue_script('codigo');
    }

    public function inicialiseShortcode(){
        add_shortcode('panel_user', function(){
            return Shortcode::createShortcode();
        });
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

    public static function adminMenuIndex(){
        require_once UPF_PLUGIN_PATH.'includes/templates/admin/AdminIndex.php';
    }
}

