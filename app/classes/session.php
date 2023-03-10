<?php

namespace App\Classes;


class Session{
    public static function add($name, $value){
        if(!empty($name) && !empty($value)){
            return $_SESSION[$name] = $value;
        }

        throw new \Exception('Name And Value Is Required');
    }

    public static function get($name){
        return $_SESSION[$name];
    }

    public static function has($name){
        if(!empty($name)){
            return (isset($_SESSION['name'])) ? true : false;
        }

        throw new \Exception('Name Is Required');
    }

    public static function remove($name){
        if(self::has($name)){
            unset($_SESSION[$name]);
        }
    }
}

?>