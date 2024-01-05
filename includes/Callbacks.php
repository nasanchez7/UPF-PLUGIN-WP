<?php

namespace Inc;

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
        echo 'delete user';
        print_r($args);
    }

    public static function createUser($args){
        echo 'create user';
        print_r($args);
    }

    public static function viewMoreUser($args){
        echo 'view more user';
        print_r($args);
    }
}