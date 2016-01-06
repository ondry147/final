<?php

class Config
{
    static public $settings = [];

    public static function set($name, $value)
    {
        self::$settings[$name] = $value;
    }

    public static function get($name)
    {
        return isset(self::$settings[$name]) ? self::$settings[$name] : null;
    }
}