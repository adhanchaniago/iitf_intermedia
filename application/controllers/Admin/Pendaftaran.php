<?php

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if($this->IsLoggedIn()){

        }else{ 
            redirect('admin/home/login');
        }
    }

}
