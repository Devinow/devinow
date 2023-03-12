<?php
/* Start Session if not already started */
if(!isset($_SESSION)) session_start();

//Load Environment variable
require_once __DIR__.'/../config/_env.php';

//Instantiate Database Class
$dataSource = new \Devinow\Db\PdoDataSource('mysql');
$dataSource->setHostname($_ENV['DB_HOST']);
$dataSource->setPort(3306);
$dataSource->setDatabaseName($_ENV['DB_NAME']);
$dataSource->setCharset('utf8mb4');
$dataSource->setUsername($_ENV['DB_USERNAME']);
$dataSource->setPassword($_ENV['DB_PASSWORD']);
$GLOBALS['db'] = \Devinow\Db\PdoDatabase::fromDataSource($dataSource);
unset($dataSource);

//Set Custom Error Handler
set_error_handler([new \Core\Classes\Errorhandler(), 'handleErrors']);

//Load Error Pages
require_once __DIR__.'/../config/_err.php';

//Load Routing System
$matched = false;

require_once __DIR__.'/routing.php';

if(!$matched) error();

?>