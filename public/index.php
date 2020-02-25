<?php

use ishop\App;


require_once dirname(__DIR__).'/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';


$app = new App;


// debug($app::$app->getProperties());

// echo "Строка запроса: {$_SERVER['QUERY_STRING']}";
// echo "<br>Стартовая страница: ".PATH.'<br>';

// throw new Exception('Страница не найдена', 404);