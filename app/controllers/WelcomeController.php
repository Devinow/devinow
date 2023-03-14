<?php

namespace App\Controllers;



class WelcomeController extends Controller
{
    public static function index(){
        return view('welcome');
    }
}

?>