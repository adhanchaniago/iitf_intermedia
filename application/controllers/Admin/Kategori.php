<?php

class Kategori extends MY_Controller
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

    public function tambah(){

    }

    public function ubah(){

    }

    public function hapus(){

    }

}
