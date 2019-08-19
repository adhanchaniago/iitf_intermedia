<?php

class Kategori extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $kat = $this->DataModel->getData('tb_kategori')->result_array();
            $data = array(
                "kategori" => $kat
            );
            $this->load->view('pages/admin/kategori', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $nama = $this->input->post('nama');
        $des = $this->input->post('deskripsi');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/kategori');
        } else {
            $data = array(
                "nama" => $nama,
                "deskripsi" => $des
            );
            $this->DataModel->insert('tb_kategori', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
            redirect('admin/kategori');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $des = $this->input->post('deskripsi');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/kategori');
        } else {
            $data = array(
                "nama" => $nama,
                "deskripsi" => $des
            );
            $this->DataModel->getWhere('id', $id);
            $this->DataModel->update('tb_kategori', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Ubah Data Berhasil </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
            redirect('admin/kategori');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $q = $this->DataModel->delete('id', $id, 'tb_kategori');
        if ($q) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
            <span class="alert-inner--text"> Hapus Data Berhasil </span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>');
            redirect('admin/kategori');
        }
    }
}
