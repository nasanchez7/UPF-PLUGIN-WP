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
if(!function_exists('add_action')){
    echo "ERROR, YOU CANT ACCESS THIS FILE.";
    exit;
}

require_once plugin_dir_path(__FILE__).'includes/UserPanelFrontendClass.php';

if(class_exists('UserPanelFrontendClass')){
    $upfc = new UserPanelFrontendClass();
    $upfc->initPlugin();
}

//register_deactivation_hook( __FILE__, array($upfc, 'deactivation'));


