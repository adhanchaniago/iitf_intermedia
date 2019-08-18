<?php

class Home extends MY_Controller
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

    public function login(){
        if($this->IsLoggedIn()){
            redirect('admin/home');
        }else{

        }
    }

    public function logout(){

    }

}
