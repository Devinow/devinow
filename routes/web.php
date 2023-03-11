<?php

$router->get('/','Index@index') && ($matched = true);

$router->get('/app/','Index@index') && ($matched = true);

?>