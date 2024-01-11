<?php
/**
* @package userpanelfrontend
*/
/*
Plugin Name: User Panel Frontend
Plugin URI https://nadirsanchez.com.ar
Description: Create users and view their information easily from the frontend of your website, through a simple shortcode.
Version: 1.0.0
Author: Nadir Sanchez
Author URI: https://nadirsanchez.com.ar
License: GPLv2 or later
Text Domain: userpanelfrontend
*/

/*
Create users and view their information easily from the frontend of your website, through a simple shortcode.
Copyright (C) 2024  Nadir Sanchez

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
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


