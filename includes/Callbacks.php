<?php

namespace Inc;

require_once( ABSPATH . 'wp-admin/includes/user.php' );

class Callbacks{

    public static function designField(){
        $value = esc_attr( get_option( 'type_design') );
        ?> 
        <select name='type_design'>
            <option value='tradicional' <?php if( $value === "tradicional" ) { echo ' selected="selected"'; } ?>>Tradicional</option>
            <option value='moderno' <?php if( $value === "moderno" ) { echo ' selected="selected"'; } ?> >Moderno</option>
        </select>    
        <?php
    }

    public static function checkboxField($args){
        $value = get_option($args['label_for']);
        $classes = $args['class'];
        if ( class_exists( 'WooCommerce' ) ) {
        ?>
            <input type="checkbox" value="1" class="<?php echo $classes;?>" name="<?php echo $args['label_for'];?>" 
            <?php if($value) { echo 'checked'; } ?>
            />
        <?php
        }else{
            echo 'Instala Woocommerce para activar los campos de usuarios correspondientes.';
        } 
    }

    public static function deleteUser($args){
        $user_id = intval($args);
        $user_data = get_userdata($user_id);
        $rol = $user_data->roles[0];
        if($rol == 'administrator'){
            ?>
                <div class="failedContainer">
                    <p>El usuario <?php echo $user_data->user_login?> no se ha podido eliminar porque es un usuario administrador.</p>
                </div>
            <?php
            return;
        }
        $delete_user = wp_delete_user($user_id);
        if($delete_user){   
            ?>
                <div class="containerFormat">
                    <div class="successContainer">
                         <p>El usuario <?php echo $user_data->user_login?> ha sido eliminado con exito.</p>
                     </div>
                </div>
            <?php
        }else{
            ?>
            <div class="containerFormat">
                <div class="failedContainer">
                    <p>El usuario <?php echo $user_data->user_login?> no se ha podido eliminar, intentalo de nuevo.</p>
                </div>
            </div>    
            <?php
        }
    }

    public static function createUser($args){
        $new_user = wp_insert_user( $args );
        if($new_user){   
            ?>
                <div class="containerFormat">
                    <div class="successContainer">
                         <p>El usuario <?php echo $_POST['newuser_username'] ?> ha sido creado con exito.</p>
                     </div>
                </div>
            <?php
        }else{
            ?>
            <div class="containerFormat">
                <div class="failedContainer">
                    <p>El usuario <?php echo $_POST['newuser_username'] ?> no se ha podido crear, intentalo de nuevo.</p>
                </div>
            </div>    
            <?php
        }
    }

    public static function viewMoreUser($id){
        if(!$id) return;
        global $wp_roles;

        $customer = new \WC_Customer( $id );
        $username_wc = $customer->get_username(); 
        $user_email_wc = $customer->get_email();
        $avatar = get_avatar_url($user_email_wc);
        $user_data = get_userdata($id);
        $all_roles = $wp_roles->get_names();
        $user_rol = '';
        if($user_data){
            $user_rol = $all_roles[$user_data->roles[0]];
        }else{
            $user_rol = '';
        }
        //Billing information
        $billing_first_name = $customer->get_billing_first_name();
        $billing_last_name  = $customer->get_billing_last_name();
        $billing_company    = $customer->get_billing_company();
        $billing_address_1  = $customer->get_billing_address_1();
        $billing_address_2  = $customer->get_billing_address_2();
        $billing_city       = $customer->get_billing_city();
        $billing_state      = $customer->get_billing_state();
        $billing_postcode   = $customer->get_billing_postcode();
        $billing_country    = $customer->get_billing_country();
        $billing_phone  = $customer->get_billing_phone();
        $billing_email  = $customer->get_billing_email();
        //Shipping information
        $shipping_first_name = $customer->get_shipping_first_name();
        $shipping_last_name  = $customer->get_shipping_last_name();
        $shipping_company    = $customer->get_shipping_company();
        $shipping_address_1  = $customer->get_shipping_address_1();
        $shipping_address_2  = $customer->get_shipping_address_2();
        $shipping_city       = $customer->get_shipping_city();
        $shipping_state      = $customer->get_shipping_state();
        $shipping_postcode   = $customer->get_shipping_postcode();
        $shipping_country    = $customer->get_shipping_country();
        //Orders
        $args = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'customer' => $id
        );
        $orders = wc_get_orders( $args );
        include_once(UPF_PLUGIN_PATH.'includes/templates/public/AccountDetails.php'); 
    }

    public static function sendEmail($email, $asunto, $cuerpo){
        $content_type = function() { return 'text/html'; };
        add_filter( 'wp_mail_content_type', $content_type );
        $email = wp_mail($email, $asunto, $cuerpo);
        remove_filter( 'wp_mail_content_type', $content_type );
        if($email){   
            ?>
                <div class="containerFormat">
                    <div class="successContainer">
                         <p>Email enviado a <?php echo $_POST['sendemail_email'] ?> con exito.</p>
                     </div>
                </div>
            <?php
        }else{
            ?>
            <div class="containerFormat">
                <div class="failedContainer">
                    <p>El envio del email a <?php echo $_POST['sendemail_email'] ?> ha fallado, intentalo de nuevo.</p>
                </div>
            </div>    
            <?php
        }
    }
}