<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

use Inc\Callbacks;

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
            $users = get_users( $args );

            if(isset($_POST['delete_userid'])){
                $args_delete_user = array();
                $delete_userid = $_POST['delete_userid'];
                Callbacks::deleteUser($delete_userid);
            }
            if(isset($_POST['newuser_username'])){
                $args_newuser_username = array();
                $newuser_username = $_POST['newuser_username'];
                Callbacks::createUser($newuser_username);
            }
            if(isset($_POST['viewmore_userid'])){
                $args_viewmore_userid = array();
                $viewmore_userid = $_POST['viewmore_userid'];
                Callbacks::viewMoreUser($viewmore_userid);
            }
            require_once UPF_PLUGIN_PATH.'includes/templates/public/PanelUser.php'; 
        } 
    }


}
