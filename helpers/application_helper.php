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

    /**
     * Get Role of a user
     *
     * @param $id
     * @return mixed
     */
    function get_role($id){
        return get_roles()[\App\User::find($id)->roles()->first()->role_id];
    }
}

if(!function_exists('get_all_status')){

    /**
     * Get all order status as an array
     * @return mixed
     */
    function get_all_order_status(){
        return  \App\Status::lists('name','id');
    }
}


if(!function_exists('send_message')){
    /**
     * Send message to the specified number (or numbers separated by comma)
     *
     * @param $contact
     * @param $message
     * @return string
     */
    function send_message($contact, $message){
        $api_key = \Illuminate\Support\Facades\Config::get('sms.api_key');

        $from = \Illuminate\Support\Facades\Config::get('sms.sender_id');

        $sms_text = urlencode($message);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, \Illuminate\Support\Facades\Config::get('sms.url'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=3&type=text&contacts=".$contact."&senderid=".$from."&msg=".$sms_text);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_encode(['status' => $response]);
    }
}