<?php

if(!function_exists('current_time')){
    function current_time(){
        return date('Y-m-h H:i:s');
    }
}

if(!function_exists('remove_symbols')){
    function remove_symbols($str = null){
        return preg_replace("/[^0-9,.]/", "", $str);
    }
}