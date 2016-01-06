<?php

Config::set('sub_folder', '/test/final'); // If your website is in sub folder. Leave empty [ '' ] if you don't have one.
//Config::set('url', filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL).Config::get('sub_folder'));
Config::set('url', 'http://localhost/test/final/');

//Router
Config::set('default_controller', 'home');
Config::set('default_action', 'index');
//Router