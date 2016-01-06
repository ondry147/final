<?php

class Error extends Controller
{

    public function index()
    {
        $this->view = 'error/404';
        
        $this->make_view();
    }

}