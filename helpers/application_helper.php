<?php

if(!function_exists('current_time')){

    /**
     * return current timestamp
     * @return bool|string
     */
    function current_time(){
        return date('Y-m-h H:i:s');
    }
}

if(!function_exists('remove_symbols')){
    /**
     *
     * Remove alpha symbols from number, return only Numeric chars
     * @param null $str
     * @return mixed
     */
    function remove_symbols($str = null){
        return preg_replace("/[^0-9,.]/", "", $str);
    }
}

if(!function_exists('get_roles')){
    /**
     * Get all roles
     * @return array
     */
    function get_roles(){
        return \App\Role::lists('name','id');
    }
}

if(!function_exists('get_option')){
    /**
     * Get specific option
     * @param $option
     * @return mixed
     */
    function get_option($option){
        return \App\Option::getOption($option);
    }
}


if(!function_exists('set_option')){
    /**
     * Set the specified option with value
     *
     * @param $option
     * @param $value
     * @return bool
     */
    function set_option($option, $value){
        return \App\Option::setOption($option,$value);
    }
}

if(!function_exists('get_role')){

    function get_role($id){
        return get_roles()[\App\User::find($id)->roles()->first()->role_id];
    }
}