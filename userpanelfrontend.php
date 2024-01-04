<?php
/**
* @package userpanelfrontend
*/
/*
Plugin Name: User Panel Frontend
Plugin URI https://nadirsanchez.com.ar
Description: Crea usuarios y visualiza su informacion facilmente desde el frontend de tu pagina web, a traves de un simple shortcode.
Version: 1.0.0
Author: Nadir Sanchez
Author URI: https://nadirsanchez.com.ar
License: GPLv2 or later
Text Domain: userpanelfrontend
*/

if(!defined('ABSPATH')){
    die;
}

if(!defined('UPF_PLUGIN_PATH')){
    define('UPF_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
}

if(!defined('UPF_PLUGIN_URL')){
    define('UPF_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

if(!function_exists('add_action')){
    echo "ERROR, YOU CANT ACCESS THIS FILE.";
    exit;
}

use Inc\Init;

if(class_exists('Inc\\Init')){
    $upfc = new Init();
    $upfc->register_services();
}

register_activation_hook( __FILE__, array($upfc, 'activationPlugin'));


