<?php

class Kategori extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->IsLoggedIn()){
            $kat = $this->DataModel->getData('tb_kategori')->result_array();
            $data = array(
                "kategori" => $kat
            );
            $this->load->view('pages/admin/kategori',$data);
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
