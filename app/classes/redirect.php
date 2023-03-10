<?php

namespace App\Classes;


class Redirect{
    public static function to($page){
        return header('Location: '.$page);
    }

    public static function back(){
        return header('Location: '.$_SERVER['REQUEST_URI']);
    }
}

?>