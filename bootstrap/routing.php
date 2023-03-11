<?php

use App\Classes\Router;


/* Routing Start */


// Base
$router=new Router();

require_once __DIR__.'/../routes/web.php';


// Unset The Router For New Instanse
unset($router);


// API
$router=new Router('/api');

require_once __DIR__.'/../routes/api.php';


/* Routing End */

?>