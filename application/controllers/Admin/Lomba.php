<?php

class Lomba extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->IsLoggedIn()){
            $lomba = $this->DataModel->select('tb_kategori.nama as nama_kategori,tb_lomba.nama,tb_lomba.id');
            $lomba = $this->DataModel->getJoin('tb_kategori','tb_lomba.id_kategori = tb_kategori.id','inner');
            $lomba = $this->DataModel->getData('tb_lomba')->result_array();
            $data = array(
                "lomba" => $lomba
            );
            $this->load->view('pages/admin/lomba',$data);
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
