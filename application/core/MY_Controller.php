<?php

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function IsLoggedIn()
    {
        $UserIsLoggedIn = $this->session->userdata('loginData');
        if (isset($UserIsLoggedIn)) {
            return true;
        } else {
            return false;
        }
    }
}
