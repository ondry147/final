<?php

class Home_model
{

    public function get_birthday($year)
    {
        return date('Y') - $year;
    }

}