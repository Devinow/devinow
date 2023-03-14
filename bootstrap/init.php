<?php
/* Start Session if not already started */
if(!isset($_SESSION)) session_start();

//Load Environment variable
require_once __DIR__.'/../config/_env.php';

//Instantiate Database Class
require_once __DIR__.'/../config/_db.php';

//Set Custom Error Handler
set_error_handler([new \Core\Classes\Errorhandler(), 'handleErrors']);

//Load Error Pages
require_once __DIR__.'/../config/_err.php';

//Load Routing System
$matched = false;

require_once __DIR__.'/routing.php';

if(!$matched) error();

?>