<?php
/**
* @package userpanelfrontend
*/

namespace Inc;

use Inc\Callbacks;

class Shortcode{

    public static function createShortcode(){
        if (!is_admin()) {
            ob_start();
            $rol = get_option('role_view_panel');
            if(current_user_can('administrator') || current_user_can($rol)) {
                global $wp_roles;
                $all_roles = $wp_roles->get_names();
                $roles = array();
                foreach($all_roles as $key => $value){
                    $roles[] = $key;
                }
                $actualPage = 1;
                $filter_role_actual = 'any';
                $user_count = count_users();
                $total_users = $user_count['total_users'];
                $args = array(
                    'order'   => 'ASC',
                    'role__in' => $roles,
                    'number' => 5,
                    'paged' => $actualPage
                );
                $users = get_users( $args );
                if(isset($_POST['next_page'] )){
                    $actualPage = $_POST['next_page'] + 1;
                    if(isset($_POST['rol_actual']) && $_POST['rol_actual'] !== 'any'){
                        $filter_role_actual = $_POST['rol_actual'];
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => array($_POST['rol_actual']),
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }else{
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => $roles,
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }
                    
                }
                if(isset($_POST['previous_page'])){
                    $actualPage = $_POST['previous_page'] - 1;
                    if(isset($_POST['rol_actual']) && $_POST['rol_actual'] !== 'any'){
                        $filter_role_actual = $_POST['rol_actual'];
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => array($_POST['rol_actual']),
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }else{
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => $roles,
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }
                }
                if(isset($_POST['firts_page'])){
                    $actualPage = 1;
                    if(isset($_POST['rol_actual']) && $_POST['rol_actual'] !== 'any'){
                        $filter_role_actual = $_POST['rol_actual'];
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => array($_POST['rol_actual']),
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }else{
                        $users = array();
                        $users = get_users(array(
                                'order'   => 'ASC',
                                'role__in' => $roles,
                                'number' => 5,
                                'paged' => $actualPage
                        ));
                    }
                }
                if(isset($_POST['filter_role']) && $_POST['filter_role'] !== 'any'){

                    $filter_role_actual = $_POST['filter_role'];
                    $roles = [$_POST['filter_role']];
                    if(isset($user_count['avail_roles'][$_POST['filter_role']])){
                        $total_users = $user_count['avail_roles'][$_POST['filter_role']];
                    }else{
                        $total_users = 0;
                    } 
                    $users = array();
                    $users = get_users(array(
                            'order'   => 'ASC',
                            'role__in' => $roles,
                            'number' => 5,
                            'paged' => $actualPage
                        ));
                }
                if(isset($_POST['delete_userid'])){
                    $args_delete_user = array();
                    $delete_userid = $_POST['delete_userid'];
                    Callbacks::deleteUser($delete_userid);
                    $total_users = $total_users - 1;
                }
                if(isset($_POST['newuser_username'])){
                    $args = array(
                        'user_login' => $_POST['newuser_username'],
                        'user_email' => $_POST['newuser_email'],
                        'user_pass' => $_POST['newuser_password'],
                        'role' => $_POST['newuser_rol']
                    );
                    Callbacks::createUser($args);
                    if($users == $users){
                        $users = array();
                        $users = get_users(array(
                            'order'   => 'ASC',
                            'role__in' => array($_POST['newuser_rol']),
                            'number' => 5,
                            'paged' => $actualPage
                        ));
                        $total_users = $total_users + 1;
                    }
                }
                if(isset($_POST['viewmore_userid'])){
                    $viewmore_userid = $_POST['viewmore_userid'];
                    Callbacks::viewMoreUser($viewmore_userid);
                }
                if(isset($_POST['sendemail_email'])){
                    Callbacks::sendEmail($_POST['sendemail_email'], $_POST['sendemail_asunto'], $_POST['sendemail_cuerpo']);
                }
                require_once UPF_PLUGIN_PATH.'includes/templates/public/PanelUser.php'; 
            }           
        }
    }
}
