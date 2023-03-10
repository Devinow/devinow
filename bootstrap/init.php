<?php
/* Start Session if not already started */
if(!isset($_SESSION)) session_start();

//Load Environment variable
require_once __DIR__.'/../app/config/_env.php';

//Instantiate Database Class
new \App\Classes\Database();

//Set Custom Error Handler
set_error_handler([new \App\Classes\Errorhandler(), 'handleErrors']);

require_once __DIR__.'/../app/routing/routes.php';

?>