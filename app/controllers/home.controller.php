<?php

class Home extends Controller
{
    public $birthday;

    public function index()
    {
        $this->model = new Home_model();
        $this->view = 'home/index';

        $this->birthday = $this->model->get_birthday(1995);
        $this->make_view(['birthday' => $this->birthday]);
    }

    public function hello()
    {
        $this->model = new Home_model();
        $this->view = 'home/hello';

        $this->make_view();
    }

}