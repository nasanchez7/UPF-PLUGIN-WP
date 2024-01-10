<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

use Inc\Shortcode;
use Inc\Callbacks;

final class Init{
    public $callbacks;
    public $pluginName;
    public $settings = array();
    public $settingSections = array();
    public $settingFields = array();


    function __construct(){
        $this->pluginName = 'userpanelfrontend';
        $this->callbacks = new Callbacks();
    }

    public function register_services(){
        add_action('admin_init', array($this, 'linkCssAndJsAdmin'));
        add_action('wp_enqueue_scripts', array($this, 'linkCssAndJsPublic'));
        add_action('admin_menu', array($this, 'addAdminPage'));
        add_filter('plugin_action_links_userpanelfrontend/userpanelfrontend.php', array($this, 'settingsLinks'));
        $this->inicialiseShortcode();
        $this->setSettings()->setSettingsSection()->setSettingsField();
        if(!empty($this->settings)){
            add_action('admin_init', array($this, 'addCustomFieldsAdminPage'));
        }
    }

    public function activationPlugin(){
        function user_last_login( $user_login, $user ) {
            update_user_meta( $user->ID, 'last_login', time() );
        }
        add_action( 'wp_login', 'user_last_login', 10, 2 );
    }

    public function settingsLinks($links){
        $setting_link = '<a href="admin.php?page=UPF"> Ajustes </a>';
        array_push($links, $setting_link);
        return $links;
    }

    public function linkCssAndJsAdmin(){
        wp_register_style('estilos', UPF_PLUGIN_URL.'includes/assets/admin/style.css');
        wp_enqueue_style('estilos');
        wp_register_script('codigo', UPF_PLUGIN_URL.'includes/assets/admin/app.js');
        wp_enqueue_script('codigo');
    }

    public function linkCssAndJsPublic(){
        wp_register_style('estilos_public', UPF_PLUGIN_URL.'includes/assets/public/style.css');
        wp_enqueue_style('estilos_public');
        wp_register_script('codigo_public', UPF_PLUGIN_URL.'includes/assets/public/app.js');
        wp_enqueue_script('codigo_public');
    }

    public function inicialiseShortcode(){
        add_shortcode('panel_user', function(){
            return Shortcode::createShortcode();
        });
    }

    public function addAdminPage(){
        add_menu_page(
        'Users Panel In Frontend', 
        'Users Panel In Frontend', 
        'manage_options', 
        'UPF', 
        array($this, 'adminMenuIndex'), 
        'dashicons-admin-users', 
        '1');
    }

    private function setSettings(){
        $settingsNew = [
            array(
                'option_group' => 'config_group',
                'option_name' => 'type_design',
                'callback' => function($input){ return $input;}
            ),
            array(
                'option_group' => 'config_group',
                'option_name' => 'woocommerce_compability',
                'callback' => function($input){ 
                    return (isset($input) ? true : false);
                }
            )
        ];

        $this->settings = $settingsNew;

        return $this;
    }

    private function setSettingsSection(){
        $settingsSectionsNew = [
            array(
                'id' => 'UPF_admin_index',
                'title' => 'Settings',
                'callback' => function(){ echo '';},
                'page' => 'UPF'
            )
        ];

        $this->settingSections = $settingsSectionsNew;

        return $this;
    }

    private function setSettingsField(){
        $settingsFieldNew = [
            array(
                'id' => 'type_design',
                'title' => 'Tipo de diseño de lista de usuarios',
                'callback' => array($this->callbacks, 'designField'),
                'page' => 'UPF',
                'section' => 'UPF_admin_index',
                'args' => array(
                    'label_for' => 'type_design',
                    'class' => 'typeDesingField'
                )
            ),
            array(
                'id' => 'woocommerce_compability',
                'title' => 'Mostrar informacion de Woocommerce',
                'callback' => array($this->callbacks, 'checkboxField'),
                'page' => 'UPF',
                'section' => 'UPF_admin_index',
                'args' => array(
                    'label_for' => 'woocommerce_compability',
                    'class' => 'woocommerceField'
                )
            )
        ];



        $this->settingFields = $settingsFieldNew;

        return $this;
    }

    public function addCustomFieldsAdminPage(){
        // register setting
        foreach($this->settings as $setting){
            register_setting( $setting['option_group'], $setting['option_name'], (isset($setting['callback']) ? $setting['callback'] : ''));
        }
        // add settings section
        foreach($this->settingSections as $settingSection){
            add_settings_section( $settingSection['id'], $settingSection['title'], (isset($settingSection['callback']) ? $settingSection['callback'] : ''), $settingSection['page']);
        }
        //add settings field
        foreach($this->settingFields as $settingField){
            add_settings_field( $settingField['id'], $settingField['title'], (isset($settingField['callback']) ? $settingField['callback'] : ''), $settingField['page'], $settingField['section'], (isset($settingField['args']) ? $settingField['args'] : ''));
        }
    }

    public static function adminMenuIndex(){
        require_once UPF_PLUGIN_PATH.'includes/templates/admin/AdminIndex.php';
    }
}

