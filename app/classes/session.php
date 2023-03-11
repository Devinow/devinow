<?php

namespace App\Classes;


class Session{
    public static function add($name, $value){
        return \Devinow\Cookie\Session::set($name, $value);
    }

    public static function get($name){
        return \Devinow\Cookie\Session::get($name);
    }

    public static function has($name){
        return \Devinow\Cookie\Session::has($name);
    }

    public static function remove($name){
        return \Devinow\Cookie\Session::delete($name);
    }
}

?>