<?php


namespace App\services;


use Monolog\ErrorHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class LoggerServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $app)
    {
        $log = new Logger('app_log');

        $handler = new ErrorHandler($log);
        $handler->registerErrorHandler([], false);
        $handler->registerExceptionHandler();
        $handler->registerFatalHandler();

        $app['logger'] = function () use ($app, $log){
            return $log->pushHandler(new RotatingFileHandler(LOGS_PATH.'api-log'));
        };
    }
}