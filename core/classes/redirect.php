<?php

namespace Core\Classes;


class Redirect{
    public static function to($page){
        return redirect($page);
    }

    public static function back(){
        return redirect($_SERVER['REQUEST_URI']);
    }
}

?>