<?php

class Controller
{

    protected $model;
    protected $view;

    protected function make_view($data = [])
    {
        //extract($data);
        require_once(ROOT.DS.'app'.DS.'views'.DS.$this->view.'.php');
    }

}