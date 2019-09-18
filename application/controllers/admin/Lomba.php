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
                $tema = $this->input->post('tema');
                $ket = $this->input->post('keterangan');
                $jml = $this->input->post('jumlah');
                $lam = $this->input->post('lampiran');
                $n_gb = str_replace(' ', '_', $nama) . "IITF2019";
                $n_g =  "G-" . $id;
                $harga = $this->input->post('harga');
                $nl = $this->input->post('nama_lomba');
                $nom = $this->input->post('nominal');
                $pre = $this->input->post('pre');
                if ($ket == "individu") {
                    $jml = 0;
                }
                if (!empty($_FILES['gb']['name'])) {
                    $this->_uploadFile($n_gb, "zip|rar");
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
                        if (!empty($_FILES['gambar']['name'])) {
                            $this->_uploadFile($n_g, "JPG|jpg|png");
                            if (!$this->upload->do_upload('gambar')) {
                                $data = array(
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
                                $eksG = substr(strrchr($_FILES['gambar']['name'], '.'), 1);
                                $data = array(
                                    "id" => $id,
                                    "id_kategori" => $id_k,
                                    "nama" => $nama,
                                    "tema" => $tema,
                                    "keterangan" => $ket,
                                    "jumlah_anggota" => $jml,
                                    "deskripsi" => $desk,
                                    "lampiran" => $lam,
                                    "pre_registration" => $pre,
                                    "guide_book" => $n_gb . "." . $eks,
                                    "file_gambar" => $n_g . "." . $eksG,
                                    "harga" => $harga
                                );
                                $this->DataModel->insert('tb_lomba', $data);
                                $a = 0;
                                // die(json_encode($nom));
                                foreach ($nl as $key => $val) {
                                    // echo $val . "  ". $nom[$a] . "<br>";
                                    $dataa = array(
                                        "id_lomba" => $id,
                                        "nama" => $val,
                                        "nominal" => $nom[$a]
                                    );
                                    $this->DataModel->insert('tb_juara', $dataa);
                                    $a++;
                                }
                                // die();
                                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                        <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    </div>');
                                redirect('admin/lomba');
                            }
                        } else {
                            $data = array(
                                "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                            );
                            $this->load->view('pages/admin/tambah_lomba', $data);
                        }
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
            $lomba = $this->DataModel->select('tb_lomba.nama,tb_lomba.deskripsi,tb_lomba.harga,tb_lomba.id_kategori,tb_juara.nama as nama_lomba,tb_juara.nominal, tb_lomba.tema,tb_lomba.keterangan,tb_lomba.jumlah_anggota,tb_lomba.lampiran,tb_lomba.guide_book,tb_lomba.pre_registration');
            $lomba = $this->DataModel->getWhere('id', $id);
            $lomba = $this->DataModel->getJoin('tb_juara', 'tb_juara.id_lomba = tb_lomba.id', 'inner');
            $lomba = $this->DataModel->getData('tb_lomba')->result_array();
            // die(json_encode($lomba));
            if ($this->input->post('kirim')) {
                $id_k = $this->input->post('id_k');
                $nama = $this->input->post('nama');
                $desk = $this->input->post('des');
                $tema = $this->input->post('tema');
                $ket = $this->input->post('keterangan');
                $jml = $this->input->post('jumlah');
                $lam = $this->input->post('lampiran');
                $pre = $this->input->post('pre');
                $harga = $this->input->post('harga');
                $nl = $this->input->post('nama_lomba');
                $nom = $this->input->post('nominal');
                if ($ket == "individu") {
                    $jml = 0;
                }
                if (!empty($_FILES['gb']['name'])) {
                    $n_gb = str_replace(' ', '_', $nama) . "IITF2019";
                    $path = "assets/Guide_book/" . $lomba[0]['guide_book'];
                    if(file_exists($path)){
                        unlink(FCPATH . $path);
                    }
                    $this->_uploadFile($n_gb, "zip|rar");
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
                        $this->load->view('pages/admin/ubah_lomba', $data);
                    } else {
                        $eks = substr(strrchr($_FILES['gb']['name'], '.'), 1);
                        $data = array(
                            "id_kategori" => $id_k,
                            "nama" => $nama,
                            "tema" => $tema,
                            "deskripsi" => $desk,
                            "lampiran" => $lam,
                            "keterangan" => $ket,
                            "pre_registration" => $pre,
                            "jumlah_anggota" => $jml,
                            "guide_book" => $n_gb . "." . $eks,
                            "harga" => $harga
                        );
                        $this->DataModel->getWhere('id', $id);
                        $this->DataModel->update('tb_lomba', $data);
                        // $a=0;
                        // foreach($nl as $key => $val){
                        //     $dataa = array(
                        //         "nama" => $val,
                        //         "nominal" => $nom[$a]
                        //     );
                        //     $this->DataModel->getWhere('id_lomba', $id);
                        //     $this->DataModel->update('tb_juara', $data);
                        //     $a++;
                        // }
                    }
                } 
                
                if (!empty($_FILES['gambar']['name'])) {
                    $n_g =  "G-" . $id;
                    $path = "assets/Guide_book/" . $lomba->file_gambar;
                    if (file_exists($path)) {
                        unlink(FCPATH . $path);
                    }
                    $this->_uploadFile($n_g, "JPG|jpg|png");
                    if (!$this->upload->do_upload('gambar')) {
                        $data = array(
                            "lomba" => $lomba,
                            "kategori" => $this->DataModel->getData('tb_kategori')->result_array()
                        );
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                        <span class="alert-inner--text"> ' . $this->upload->display_errors() . '</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        </div>');
                        $this->load->view('pages/admin/ubah_lomba', $data);
                    } else {
                        $eksG = substr(strrchr($_FILES['gambar']['name'], '.'), 1);
                        $data = array(
                            "id_kategori" => $id_k,
                            "nama" => $nama,
                            "tema" => $tema,
                            "deskripsi" => $desk,
                            "lampiran" => $lam,
                            "keterangan" => $ket,
                            "pre_registration" => $pre,
                            "jumlah_anggota" => $jml,
                            "file_gambar" => $n_g . "." . $eksG,
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
                        "tema" => $tema,
                        "lampiran" => $lam,
                        "pre_registration" => $pre,
                        "keterangan" => $ket,
                        "jumlah_anggota" => $jml,
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
        if ($this->IsLoggedIn()) {
            $id = $this->input->post('id');
            $gb = $this->input->post('gb');
            $path = "assets/Guide_book/" . $gb;
            unlink(FCPATH . $path);

            $q = $this->DataModel->delete('id_lomba', $id, 'tb_juara');
            $q = $this->DataModel->delete('id', $id, 'tb_lomba');
            if ($q) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                <span class="alert-inner--text"> Hapus Data Berhasil </span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>');
                redirect('admin/lomba');
            }
        } else {
            redirect('admin/home/login');
        }
    }
    

    private function _uploadFile($name, $eks)
    {
        $config['upload_path'] = 'assets/Guide_book/';
        $config['allowed_types'] = $eks;
        $config['file_name'] = $name;
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }
}
