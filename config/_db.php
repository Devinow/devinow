<?php

$dataSource = new \Devinow\Db\PdoDataSource('mysql');
$dataSource->setHostname($_ENV['DB_HOST']);
$dataSource->setPort(3306);
$dataSource->setDatabaseName($_ENV['DB_NAME']);
$dataSource->setCharset('utf8mb4');
$dataSource->setUsername($_ENV['DB_USERNAME']);
$dataSource->setPassword($_ENV['DB_PASSWORD']);
$GLOBALS['db'] = \Devinow\Db\PdoDatabase::fromDataSource($dataSource);
unset($dataSource);

?>