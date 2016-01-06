<?php

mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Prague');

function auto_load_class($class)
{
    $controller = ROOT.DS.'app'.DS.'controllers'.DS.$class.'.controller.php';
    $core = ROOT.DS.'app'.DS.'core'.DS.$class.'.php';
    $models = ROOT.DS.'app'.DS.'models'.DS.str_replace('_model', '', $class).'.model.php';
    if(file_exists($controller))
    {
        require_once($controller);
    } elseif(file_exists($core)) {
        require_once($core);
    } elseif(file_exists($models)) {
        require_once($models);
    } else {
        throw new Exception('Class was not found: '.$controller.' | '.$core);
    }
}

spl_autoload_register('auto_load_class');

require_once(ROOT.DS.'app'.DS.'config.php');

function redirect($url)
{
    header('Location: '.Config::get('url').$url.'/');
}