<?php

define('BASE_PATH', realpath(__DIR__.'/../'));

require_once __DIR__.'/../core/loader.php';

$dotEnv = Dotenv\Dotenv::createImmutable(BASE_PATH);

$dotEnv->load();

?>