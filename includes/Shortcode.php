<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

class Shortcode{
    public static function createShortcode(){
        if(current_user_can('administrator')) {
            $args = array(
                'order'   => 'ASC'
            );
            $user_count = count_users();
            $total_users = $user_count['total_users'];
            $users = get_users( $args );
            require_once UPF_PLUGIN_PATH.'includes/templates/public/PanelUser.php'; 
        } 
    }
}
