<?php

$dir = '\App\Controllers\\';

$matched = false;

// Start Base Routing
$router = new \Devinow\Router\Router();

require_once __DIR__.'/../routes/web.php';
// End Base Routing
unset($router);
// Start API Routing
$router = new \Devinow\Router\Router('/api');

require_once __DIR__.'/../routes/api.php';
// End API Routing

if (!$matched) {
    error();
}

?>