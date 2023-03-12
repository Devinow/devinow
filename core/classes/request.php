<?php

namespace Core\Classes;


class Request{
    public static function all($is_array = false){
        $result =[];
        if(count($_GET) > 0) $result['get'] = $_GET;
        if(count($_POST) > 0) $result['post'] = $_POST;
        $result['file']=$_FILES;

        return json_decode(json_encode($result),$is_array);
    }

    public static function get($key){
        $object=new static;
        $data=$object->all();

        return $data->$key;
    }

    public static function has($key){
        return (array_key_exists($key, self::all(true))) ? true : false;
    }

    public static function old($key, $value){
        $object=new static;
        $data=$object->all();
        return isset($data->$key->$value) ? $data->$key->$value : '';
    }

    public static function refresh(){
        $_POST=[];
        $_GET=[];
        $_FILES=[];
    }
}

?>