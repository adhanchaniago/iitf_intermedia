<?php

class Pendaftaran extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index(){
        if($this->IsLoggedIn()){
            $pendaftar = $this->DataModel->select('tb_lomba.nama as nama_lomba,tb_koor.nama as nama_koor,tb_pendaftaran.status,tb_pendaftaran.bukti_bayar');
            $pendaftar = $this->DataModel->getJoin('tb_lomba','tb_pendaftaran.id_lomba = tb_lomba.id','inner');
            $pendaftar = $this->DataModel->getJoin('tb_koor','tb_koor.id = tb_pendaftaran.id_koor','inner');
            $pendaftar = $this->DataModel->getData('tb_pendaftaran')->result_array();
            $data = array(
                "pendaftar" => $pendaftar
            );
            $this->load->view('pages/admin/pendaftaran',$data);
        }else{ 
            redirect('admin/home/login');
        }
    }

}
