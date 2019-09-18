<?php

class Pengumuman extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
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
        if($this->IsLoggedIn()){
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $judul = $this->input->post('judul');
            $des = $this->input->post('deskripsi');
            if ($this->form_validation->run() == FALSE) {
                redirect('admin/kategori');
            } else {
                $data = array(
                    "judul" => $judul,
                    "deskripsi" => $des,
                    "tanggal" => date("Y-m-d H:i:s")
                );
                $this->DataModel->insert('tb_pengumuman', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                </div>');
                redirect('admin/pengumuman');
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function ubah(){
        if($this->IsLoggedIn()){
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required');
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $des = $this->input->post('deskripsi');
            if ($this->form_validation->run() == FALSE) {
                redirect('admin/kategori');
            } else {
                $data = array(
                    "judul" => $judul,
                    "deskripsi" => $des,
                    "tanggal" => date("Y-m-d H:i:s")
                );
                $this->DataModel->getWhere('id',$id);
                $this->DataModel->update('tb_pengumuman', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                </div>');
                redirect('admin/pengumuman');
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function hapus(){
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            $q = $this->DataModel->delete('id', $id, 'tb_pengumuman');
            if ($q) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Hapus Data Berhasil </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
                redirect('admin/pengumuman');
            }
        }else{
            redirect('admin/home/login');
        }
    }

}
