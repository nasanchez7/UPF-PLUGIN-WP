<?php
/**
* @package userpanelfrontend
*/

class UserPanelFrontendShortcode{
    public static function createShortcode(){
        require_once plugin_dir_path(__FILE__).'templates/public/PanelUser.php'; 
    }
}
