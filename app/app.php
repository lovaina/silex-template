<?php

use App\services\LoggerServiceProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\VarDumperServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new ServiceControllerServiceProvider());
$app->register(new LoggerServiceProvider());
$app->register(new VarDumperServiceProvider());
return $app;