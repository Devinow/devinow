<?php

$dir = '\App\Controllers\\';

$router = new \Devinow\Router\Router();

$matched = false;

$router->get('/', [$dir.'Index','index']) && ($matched = true);

if (!$matched) {
    return view('errors/404');
}

?>