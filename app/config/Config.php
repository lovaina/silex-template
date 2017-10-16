<?php


namespace App\config;


class Config
{

    private static $config = [
        'item' => [
            'value'
        ]
    ];

    public static function obtain($index){
        return isset(self::$config[$index]) ? self::$config[$index] : false;
    }

    public static function all()
    {
        return self::$config;
    }
}