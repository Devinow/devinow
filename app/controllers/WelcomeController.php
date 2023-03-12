<?php

namespace App\Controllers;


use App\Models\Test;


class WelcomeController extends Controller
{
    public static function index(){
        return view('welcome');
    }
}

?>