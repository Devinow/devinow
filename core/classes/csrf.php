<?php

namespace Core\Classes;


class CSRF{
    public static function _token(){
        if(!Session::has('token')){
            Session::add('token',base64_decode(openssl_random_pseudo_bytes(32)));
        }
        return Session::get('token');
    }

    public static function verify($token){
        if(Session::has('token') && Session::get('token') === $token){
            Session::remove('token');
            $r=true;
        }else{
            $r=false;
        }

        return $r;
    }
}

?>