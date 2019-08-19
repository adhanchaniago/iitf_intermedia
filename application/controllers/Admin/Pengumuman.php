<?php

class Pengumuman extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index(){
        if($this->IsLoggedIn()){
            $peng = $this->DataModel->getData('tb_pengumuman')->result_array();
            $data = array(
                "pengumuman" => $peng
            );
            $this->load->view('pages/admin/pengumuman',$data);
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
