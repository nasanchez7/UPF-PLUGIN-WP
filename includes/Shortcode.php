<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

class Shortcode{
    public static function createShortcode(){
        if(current_user_can('administrator')) {
            global $wp_roles;
            $all_roles = $wp_roles->get_names();
            $roles = array();
            foreach($all_roles as $key => $value){
                $roles[] = $key;
            }
            $args = array(
                'order'   => 'ASC',
                'role__in' => $roles
            );
            $user_count = count_users();
            $total_users = $user_count['total_users'];
            
            //$candidat = get_userdata('');
            $users = get_users( $args );
            require_once UPF_PLUGIN_PATH.'includes/templates/public/PanelUser.php'; 
        } 
    }
}
