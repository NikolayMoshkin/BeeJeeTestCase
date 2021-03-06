<?php
define("DEBUG", 1); //константа, отвечающая за режим показа/скрытия ошибок
define("ROOT", dirname(__DIR__));
define("WWW", ROOT.'/public');
define("APP", ROOT.'/app');
define("CORE", ROOT.'/vendor/ishop/core');
define("LIBS", ROOT.'/vendor/ishop/core/libs');
define("CACHE", ROOT.'/tmp/cache');
define("CONF", ROOT.'/config');
define("LAYOUT", 'default');  //шаблон по умолчанию

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

//http://ishop 
$app_path = str_replace('/public/index.php','',$app_path);

define("PATH",$app_path);
define("ADMIN",PATH.'/admin');

require_once ROOT.'/vendor/autoload.php'; //подключаем composer