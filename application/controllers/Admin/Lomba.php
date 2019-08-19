<?php

class Lomba extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $lomba = $this->DataModel->select('tb_kategori.nama as nama_kategori,tb_lomba.nama,tb_lomba.id,tb_lomba.guide_book');
            $lomba = $this->DataModel->getJoin('tb_kategori', 'tb_lomba.id_kategori = tb_kategori.id', 'inner');
            $lomba = $this->DataModel->getData('tb_lomba')->result_array();
            $data = array(
                "lomba" => $lomba
            );
            $this->load->view('pages/admin/lomba', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->IsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $id = "L-" . date("dmys");
                $id_k = $this->input->post('id_k');
                $nama = $this->input->post('nama');
                $desk = $this->input->post('des');
                $n_gb = str_replace(' ', '_', $nama) . "IITF2019";
                $harga = $this->input->post('harga');
                if (!empty($_FILES['gb']['name'])) {
                    $this->_uploadFile($n_gb);
                    if (!$this->upload->do_upload('gb')) {
                        $data = array(
                            "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                        );
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                        <span class="alert-inner--text"> ' . $this->upload->display_errors() . '</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        </div>');
                        $this->load->view('pages/admin/tambah_lomba', $data);
                        // var_dump($this->upload->display_errors());
                    } else {
                        $eks = substr(strrchr($_FILES['gb']['name'], '.'), 1);
                        $data = array(
                            "id" => $id,
                            "id_kategori" => $id_k,
                            "nama" => $nama,
                            "deskripsi" => $desk,
                            "guide_book" => $n_gb . "." . $eks,
                            "harga" => $harga
                        );
                        $this->DataModel->insert('tb_lomba', $data);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                        <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    </div>');
                        redirect('admin/lomba');
                    }
                }
            } else {
                $data = array(
                    "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                );
                $this->load->view('pages/admin/tambah_lomba', $data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah($id)
    {
        if ($this->IsLoggedIn()) {
            $lomba = $this->DataModel->getWhere('id', $id);
            $lomba = $this->DataModel->getData('tb_lomba')->row();
            if ($this->input->post('kirim')) {
                $id_k = $this->input->post('id_k');
                $nama = $this->input->post('nama');
                $desk = $this->input->post('des');
                $harga = $this->input->post('harga');
                if (!empty($_FILES['gb']['name'])) {
                    $n_gb = str_replace(' ', '_', $nama) . "IITF2019";
                    $path = "assets/Guide_book/" . $lomba->guide_book;
                    unlink(FCPATH . $path);
                    $this->_uploadFile($n_gb);
                    if (!$this->upload->do_upload('gb')) {
                        $data = array(
                            "lomba" => $lomba,
                            "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                        );
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                        <span class="alert-inner--text"> ' . $this->upload->display_errors() . '</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        </div>');
                        $this->load->view('pages/admin/tambah_lomba', $data);
                    } else {
                        $eks = substr(strrchr($_FILES['gb']['name'], '.'), 1);
                        $data = array(
                            "id_kategori" => $id_k,
                            "nama" => $nama,
                            "deskripsi" => $desk,
                            "guide_book" => $n_gb . "." . $eks,
                            "harga" => $harga
                        );
                        $this->DataModel->getWhere('id', $id);
                        $this->DataModel->update('tb_lomba', $data);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                        <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    </div>');
                        redirect('admin/lomba');
                    }
                } else {
                    $data = array(
                        "id_kategori" => $id_k,
                        "nama" => $nama,
                        "deskripsi" => $desk,
                        "harga" => $harga
                    );
                    $this->DataModel->getWhere('id', $id);
                    $this->DataModel->update('tb_lomba', $data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                    <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                    <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                </div>');
                    redirect('admin/lomba');
                }
            } else {
                $data = array(
                    "lomba" => $lomba,
                    "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                );
                $this->load->view('pages/admin/ubah_lomba', $data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            $gb = $this->input->post('gb');
            $path = "assets/Guide_book/" . $gb;
            unlink(FCPATH . $path);
            $q = $this->DataModel->delete('id',$id,'tb_lomba');
            if($q){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                <span class="alert-inner--text"> Hapus Data Berhasil </span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>');
                redirect('admin/lomba');
            }
        }else{
            redirect('admin/home/login');
        }
    }

    private function _uploadFile($name)
    {
        $config['upload_path'] = 'assets/Guide_book/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $name;
        $this->upload->initialize($config);
    }
}
