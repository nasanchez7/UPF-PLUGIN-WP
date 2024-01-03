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
}