<?php

ini_set('display_errors', 1);

define('APP_PATH', exec('pwd'));
define('LOGS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR);
define('CONFIG_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR);
define('VIEWS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('ASSETS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR);
define('DOMAIN', '//'.$_SERVER['HTTP_HOST']);

date_default_timezone_set('Europe/Madrid');

require_once __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/app/app.php';
require __DIR__.'/app/controllers.php';

$app->run();