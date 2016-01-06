<?php

class App
{
    protected $controller;
    protected $action;
    protected $params;

    public function __construct()
    {
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->params = [];

        $this->parse_url(filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL));
    }

    public function parse_url($uri)
    {
        if(mb_strlen(Config::get('sub_folder')) > 0)
        {
            $uri = str_replace(Config::get('sub_folder'), '', $uri);
        }
        $uri = strtolower(trim($uri, '/'));

        $pieces =  (mb_strlen($uri) > 0) ? explode('/', $uri) : [];

        if(isset($pieces[0]))
        {
            $controller = ROOT.DS.'app'.DS.'controllers'.DS.$pieces[0].'.controller.php';
            if(file_exists($controller))
            {
                if(!isset($pieces[1]) AND !method_exists(new $pieces[0], Config::get('default_action')))
                {
                    redirect('error');
                } else {
                    $this->controller = $pieces[0];
                    unset($pieces[0]);
                }
            }
        }

        if(isset($pieces[1]))
        {
            if(method_exists(new $this->controller, $pieces[1]))
            {
                $this->action = $pieces[1];
                unset($pieces[1]);
            } elseif(method_exists(new $this->controller, Config::get('default_action')) == false) {
                redirect('error');
            }
        }

        $this->params = array_values($pieces);
        call_user_func_array([new $this->controller, $this->action], $this->params);


        /*
        var_dump($this->controller);
        var_dump($this->action);
        var_dump($this->params);
        */
    }

}