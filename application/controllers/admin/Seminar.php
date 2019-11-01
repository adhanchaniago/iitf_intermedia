<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $pendaftar = $this->db->query("SELECT * FROM tb_seminar ORDER BY id_daf ASC")->result_array();
            $data = array(
                "pendaftar" => $pendaftar
            );
            $this->load->view('pages/admin/seminar',$data);
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function bayar()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->get('id');
            $getInfo = $this->db->select('*')->from("tb_seminar")->where("id_daf", $id)->get()->row();
            
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                            'smtp_crypto' => 'tls',
                            'smtp_port' => '587',
                
                'smtp_user' => 'iitfintermedia@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
                'smtp_pass' => 'intermediaiitf2019', // informasi rahasia ini jangan di gunakan sembarangan
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $htm = $getInfo->htm_status;
            $biaya = 0;
            switch ($htm) {
                case "presale":
                    $biaya = 30000;
                    break;
                case "sale":
                    $biaya = 35000;
                    break;
                case "ots":
                    $biaya = 40000;
                    break;
                case "anggota":
                    $biaya = 25000;
                    break;
            }
    
            $data['id_daf'] = $id;
            $data['nama'] = $getInfo->nama;
            $data['alamat'] = $getInfo->alamat;
            $data['emailnya'] = $getInfo->email;
            $data['nohp'] = $getInfo->notelp;
            $data['htm'] = $htm;
            $data['biaya'] = $biaya;
    
            $message = $this->load->view('emails/seminar_bukti', $data, TRUE);
    
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($getInfo->email);
            $this->email->subject('Selamat, Anda Berhasil Menjadi Peserta Seminar UI/UX!');
            $this->email->message($message);
    
            $this->email->send();
            $this->db->update('tb_seminar', array(
                "status_bayar" => TRUE
            ), array("id_daf" => $id));
            redirect('admin/seminar','refresh');
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        $htm = $this->DataModel->getHTS();
        $price = $this->DataModel->getHTMPrice();
        $this->db->select('*');
        $this->db->from('tb_seminar');
        //$this->db->where('htm_status', $htm);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num < 100) { // Kuota Anggota
            $code = $this->DataModel->noDaf();

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $nohp = $this->input->post('notelp');
            $asal = $this->input->post('asal');
            $anggota = $this->input->post('anggota');
            
            // echo ($anggota == TRUE ? "True" : "False");
            // return;
            
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('notelp', 'Nomor HP/WA', 'trim|required|min_length[5]|max_length[13]');
            
            if ($this->form_validation->run() == TRUE) {
                // Verify
                if (!preg_match("/^[a-zA-Z\s']+$/", $nama)) {
                    //echo "Kolom Nama Lengkap mengandung karakter yang tidak diizinkan!";
                    echo "<script>alert(\"Kolom Nama Lengkap mengandung karakter yang tidak diizinkan!\");</script>";
                    return;
                }
                
                if (!preg_match("/^[0-9]+$/", $nohp)) {
                    //echo "Kolom Nomor HP/WA mengandung karakter yang tidak diizinkan!";
                    echo "<script>alert(\"Kolom Nomor HP/WA mengandung karakter yang tidak diizinkan!\");</script>";
                    return;
                }

                if (!preg_match("/^[a-zA-Z\s',.0-9\/]+$/", $alamat)) {
                    //echo "Kolom Alamat mengandung karakter yang tidak diizinkan!";
                    echo "<script>alert(\"Kolom Alamat mengandung karakter yang tidak diizinkan!\");</script>";
                    return;
                }

                if ($asal != "") {
                    if (!preg_match("/^[a-zA-Z\s'.0-9\/]+$/", $asal)) {
                        //echo "Kolom Asal Sekolah/Institusi mengandung karakter yang tidak diizinkan!";
                        echo "<script>alert(\"Kolom Asal Sekolah/Institusi mengandung karakter yang tidak diizinkan!\");
                        </script>";
                    return;
                    }
                }
                $eCheck = $this->db->select('email')
                                    ->from("tb_seminar")
                                    ->where("email", $email)
                                    ->get();
                if ($eCheck->num_rows() == 0) {
                    $this->db->insert('tb_seminar', array(
                        "id_daf" => $code,
                        "nama" => $nama,
                        "alamat" => $alamat,
                        "email" => $email,
                        "notelp" => $nohp,
                        "institusi" => $asal,
                        "status_bayar" => FALSE,
                        "status_ulang" => FALSE,
                        "htm_status" => ($anggota == TRUE ? "anggota" : $htm)
                    ));

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                <span class="alert-inner--text"> Tambah Data Berhasil </span>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                </div>');
                    echo "<script>location.reload();</script>";
                } else {
                    //echo "Email '$email' sudah pernah didaftarkan!";
                    echo "Email '$email' sudah pernah didaftarkan!";
                }
            } else {
                //echo validation_errors();
                echo validation_errors();
                return;
            }
        } else {
            echo "<script>alert(\"Kuota sudah penuh!!!\");</script>";
        }
    }

    public function export()
    {
        if ($this->IsLoggedIn()) {
            $employee_data = $this->db->query("SELECT * FROM tb_seminar WHERE status_bayar = 1")->result();
            $data['row'] = $employee_data;
            $this->load->view('pages/admin/excel_seminar', $data, FALSE);
        } else {
            redirect('admin/home/login');
        }
    }

    public function daftarulang()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->get('id');
            $cek_bayar = $this->db->select('id_daf, status_bayar, htm_status, tgl_daftar')
                                    ->from("tb_seminar")
                                    ->where("id_daf", $id)
                                    ->get()->row();
            
            if ($cek_bayar->status_bayar == TRUE) {
                $getInfo = $this->db->select('*')->from("tb_seminar")->where("id_daf", $id)->get()->row();
            
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                            'smtp_crypto' => 'tls',
                            'smtp_port' => '587',
                    
                    'smtp_user' => 'iitfintermedia@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
                    'smtp_pass' => 'intermediaiitf2019', // informasi rahasia ini jangan di gunakan sembarangan
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
        
                $data['id_daf'] = $id;
                $data['nama'] = $getInfo->nama;
                $data['emailnya'] = $getInfo->email;
                $data['nohp'] = $getInfo->notelp;
        
                $message = $this->load->view('emails/seminar_hadir', $data, TRUE);
        
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user']);
                $this->email->to($getInfo->email);
                $this->email->subject('Terimakasih sudah berpartisipasi, ' . $getInfo->nama . '!');
                $this->email->message($message);
        
                $this->email->send();
                $this->db->update('tb_seminar', array(
                    "status_ulang" => TRUE
                ), array("id_daf" => $id));
                echo "<script>location.reload();</script>";
            } else {
                $htm = strtoupper($cek_bayar->htm_status);
                $tgl = $cek_bayar->tgl_daftar;
                echo "<script>alert(\"Pendaftar dengan ID '$id' belum lunas membayar HTM!!!\\nDia daftar pada periode $htm pada $tgl\");</script>";
            }
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function delete()
    {
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            $q = $this->DataModel->delete('id_daf', $id, 'tb_seminar');
            if ($q) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Hapus Data "' . $id . '" Berhasil </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
                redirect('admin/seminar');
            }
        }else{
            redirect('admin/home/login');
        }
        
    }
}

/* End of file Seminar.php */
