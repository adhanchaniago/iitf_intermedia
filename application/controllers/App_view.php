<?php
defined('BASEPATH') or exit('No direct script access allowed');


class App_view extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('bcrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('dropbox');
    }

    public function dash()
    {
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email'),
            'status' => 'true'
        ));

        $koor = null;
        $userdata = $check->row();
        if ($check->num_rows() == 0) {
            $this->session->sess_destroy(); // fix ERROR 400: BAD REQUEST
            redirect('login');
        } else {
            $koorq = $this->db->get_where('tb_koor', array(
                'id_user' => $this->session->userdata('id')
            ));
            $koor = $koorq->row();
        }
        $email = "";
        if($this->session->userdata('email') != "" && $userdata->step_selesai == 5){
            $email = "Dashboard";   
        }else if($this->session->userdata('email') != ""){
            $email = "LANJUTKAN DAFTAR: " . $this->session->userdata('email');
        }

        $pengumuman = $this->DataModel->order_by('tanggal', 'desc');
        $pengumuman = $this->DataModel->getData('tb_pengumuman')->result_array();
        $ket = $this->db->query('SELECT * FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"')->row();
        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
        $jml = $this->DataModel->getWhere('id_pendaftaran', $pendaftaran->id);
        $jml = $this->DataModel->getData('tb_anggota')->result_array();
        $payload['judul'] = "DASHBOARD";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = $email;
        $payload['page'] = "dashboard";
        $payload['koor'] = $koor;
        $payload['lomba'] = $ket;
        $payload['anggota'] = $jml;
        $payload['status_pendaftaran'] = $pendaftaran->status_pendaftaran;
        $payload['pendaftaran'] = $pendaftaran;
        $payload['pengumuman'] = $pengumuman;
        $query = $this->db->query('SELECT b.id, b.tanggal_daftar, b.bukti_bayar,b.status, a.harga, b.nama_team, a.jumlah_anggota, b.id_koor, a.namalomba, a.keterangan FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
        //$query = $this->db->query('SELECT b.id_koor, a.harga FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');

        $payload['lombaI'] = $query->row();
        $payload['pendaftaran'] = $query->row();
        $lomba = $this->DataModel->getData('tb_lomba')->result_array();
        $this->load->view('component/header', $payload);
        $this->load->view('pages/user/user_dashboard');
        $this->load->view('component/ground');
    }
    //HomePage
    public function index()
    {   
        // $userdata = $this->DataModel->select('step_selesai');
        $userdata = $this->DataModel->getWhere('email',$this->session->userdata('email'));
        $userdata = $this->DataModel->getData('tb_user')->row();
        $email = "";
        if($this->session->userdata('email') != "" && $userdata->step_selesai == 5){
            $email = "Dashboard";   
        }else if($this->session->userdata('email') != ""){
            $email = "LANJUTKAN DAFTAR: " . $this->session->userdata('email');
        }
        $payload['judul'] = "HOME";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = $email;
        $payload['page'] = "home";
        $lomba = $this->DataModel->getData('tb_lomba')->result_array();
        $i = 0;
        foreach ($lomba as $key => $val) {
            $lomba[$i]['juara'] = $this->DataModel->getWhere('id_lomba', $val['id']);
            $lomba[$i]['juara'] = $this->DataModel->getData('tb_juara')->result_array();
            $i++;
        }
        $data = array(
            "lomba" => $lomba,
            "judul" => $payload['judul'],
            "email" => $payload['email'],
            "page" => $payload['page'],
        );
        $this->load->view('component/header', $data);
        $this->load->view('src/iitf_index', $data);
        $this->load->view('component/footer');
        $this->load->view('component/ground');
    }

    public function login()
    {
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email')
        ));

        if ($check->num_rows() !== 0) {
            redirect('user');
        }
        $payload['judul'] = "LOGIN";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "login";
        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_login', $payload);
        $this->load->view('component/ground');
        $this->load->view('component/footer');
    }

    // public function getHTM()
    // {
    //     echo $this->DataModel->getHTMPrice();
    // }

    public function regnow_seminar()
    {
        $htm = $this->DataModel->getHTS();
        $price = $this->DataModel->getHTMPrice();
        $this->db->select('*');
        $this->db->from('tb_seminar');
        $this->db->where('htm_status', $htm);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num < 75) { // Kuota Anggota
            $code = $this->DataModel->noDaf();

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $nohp = $this->input->post('notelp');
            $asal = $this->input->post('asal');

            // Verify
            if (!preg_match("/^[a-zA-Z\s']+$/", $nama)) {
                //echo "Kolom Nama Lengkap mengandung karakter yang tidak diizinkan!";
                echo "<script>
                        Swal.fire({
                            title:\"Oops, ada kesalahan!\",
                            html: `Kolom Nama Lengkap mengandung karakter yang tidak diizinkan!`, 
                            type: \"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                return;
            }
            
            if (!preg_match("/^[0-9]+$/", $nohp)) {
                //echo "Kolom Nomor HP/WA mengandung karakter yang tidak diizinkan!";
                echo "<script>
                        Swal.fire({
                            title:\"Oops, ada kesalahan!\",
                            html: `Kolom Nomor HP/WA mengandung karakter yang tidak diizinkan!`, 
                            type: \"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                return;
            }

            if (!preg_match("/^[a-zA-Z\s',.0-9\/]+$/", $alamat)) {
                //echo "Kolom Alamat mengandung karakter yang tidak diizinkan!";
                echo "<script>
                        Swal.fire({
                            title:\"Oops, ada kesalahan!\",
                            html: `Kolom Alamat mengandung karakter yang tidak diizinkan!`, 
                            type: \"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                return;
            }

            if ($asal != "") {
                if (!preg_match("/^[a-zA-Z\s'.0-9\/]+$/", $asal)) {
                    //echo "Kolom Asal Sekolah/Institusi mengandung karakter yang tidak diizinkan!";
                    echo "<script>
                        Swal.fire({
                            title:\"Oops, ada kesalahan!\",
                            html: `Kolom Asal Sekolah/Institusi mengandung karakter yang tidak diizinkan!`, 
                            type: \"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                return;
                }
            }
            
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('notelp', 'Nomor HP/WA', 'trim|required|min_length[5]|max_length[13]');
            
            if ($this->form_validation->run() == TRUE) {
                $eCheck = $this->db->select('email')
                                    ->from("tb_seminar")
                                    ->where("email", $email)
                                    ->get();
                if ($eCheck->num_rows() == 0) {
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
            
                    $data['id_daf'] = $code;
                    $data['nama'] = $nama;
                    $data['htm'] = strtoupper($htm);
                    $data['code'] = $code;
                    $data['biaya'] = $price;
            
                    $message = $this->load->view('emails/seminar_daftar', $data, TRUE);
            
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user']);
                    $this->email->to($email);
                    $this->email->subject('Konfirmasi Pembayaran acara Seminar UI/UX IITF 2019');
                    $this->email->message($message);
            
                    $this->email->send();
                    $this->db->insert('tb_seminar', array(
                        "id_daf" => $code,
                        "nama" => $nama,
                        "alamat" => $alamat,
                        "email" => $email,
                        "notelp" => $nohp,
                        "institusi" => $asal,
                        "status_bayar" => FALSE,
                        "status_ulang" => FALSE,
                        "htm_status" => $htm
                    ));

                    echo $this->load->view('src/iitf_register_seminar_success', $data, TRUE);
                } else {
                    //echo "Email '$email' sudah pernah didaftarkan!";
                    echo "<script>
                        Swal.fire({
                            title:\"Oops, ada kesalahan!\",
                            html: `Email '$email' sudah pernah didaftarkan!`, 
                            type: \"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                }
            } else {
                //echo validation_errors();
                echo "<script>
                    Swal.fire({
                        title:\"Oops, ada kesalahan!\",
                        html: `" . validation_errors() . "`, 
                        type: \"error\"}).then(ok => {
                    //do anything
                    });
                </script>";
                return;
            }
        } else {
            $data['nu'] = "";
            echo $this->load->view('src/iitf_register_seminar_full', $data, TRUE);
        }
    }

    public function showKode()
    {
        echo $this->DataModel->getHTS();
    }

    public function reg_seminar()
    {
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email')
        ));

        if ($check->num_rows() !== 0) {
            redirect('user');
        }
        $payload['judul'] = "PESERTA SEMINAR";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "reg_seminar";
        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_register_seminar', $payload);
        $this->load->view('component/ground');
        $this->load->view('component/footer');
    }

    public function detailLomba()
    {
        $userdata = $this->DataModel->getWhere('email',$this->session->userdata('email'));
        $userdata = $this->DataModel->getData('tb_user')->row();
        $judul = $this->input->get('lomba');
        $email = "";
        if($this->session->userdata('email') != "" && $userdata->step_selesai == 5){
            $email = "Dashboard";   
        }else if($this->session->userdata('email') != ""){
            $email = "LANJUTKAN DAFTAR: " . $this->session->userdata('email');
        }
        $lomba = $this->DataModel->select('tb_lomba.nama,tb_lomba.deskripsi,tb_lomba.harga,tb_lomba.guide_book,tb_lomba.tema,tb_juara.nominal as juara,tb_kategori.nama as kategori,tb_lomba.file_gambar');
        $lomba = $this->DataModel->getWhere('tb_lomba.nama', $judul);
        $lomba = $this->DataModel->getJoin('tb_juara', 'tb_juara.id_lomba = tb_lomba.id', 'inner');
        $lomba = $this->DataModel->getJoin('tb_kategori', 'tb_kategori.id = tb_lomba.id_kategori', 'inner');
        $lomba = $this->DataModel->getData('tb_lomba')->result_array();

        // die(json_encode($lomba));
        $payload['judul'] = "DETAIL LOMBA";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = $email;
        $payload['page'] = "kosong";
        $payload['lomba'] = $lomba;
        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_detail_lomba', $payload);
        $this->load->view('component/ground');
    }
    public function loginProcess()
    {
        $user = $this->input->post('e');
        $pass = $this->input->post('p');

        $query = $this->db->get_where('tb_user', array(
            'email' => $user
        ));

        if ($query->num_rows() !== 0) {
            $result = $query->row();
            if ($result->status != "true") {
                echo  json_encode(array(
                    "success" => false,
                    "msg" => "Anda belum memverifikasi akun, Silahkan cek email anda."
                ));
            } else {
                if ($this->bcrypt->check_password($pass, $result->password)) {
                    # sukses login

                    $array = array(
                        'id' => $result->id,
                        'email' => $result->email
                    );

                    $this->session->set_userdata($array);

                    echo json_encode(array(
                        "success" => true,
                        "msg" => "sukses"
                    ));
                } else {
                    # password salah
                    echo json_encode(array(
                        "success" => false,
                        "msg" => "Password yang anda masukkan salah"
                    ));
                }
            }
        } else {
            # username salah
            echo json_encode(array(
                "success" => false,
                "msg" => "email belum terdaftar"
            ));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

    public function register()
    {
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email')
        ));

        if ($check->num_rows() !== 0) {
            redirect('user');
        }
        $payload['judul'] = "REGISTER";
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));;
        $payload['page'] = "register";
        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_register', $payload);
        $this->load->view('component/ground');
    }

    public function registerProcess()
    {
        $nama = $this->input->post('n');
        $mail = $this->input->post('e');
        $pass = $this->input->post('p');
        $pass2 = $this->input->post('p2');
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 12);

        // die(json_encode(base64_encode($code)));
        // Verify
        if ($nama === "") {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Nama Lengkap Anda!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if ($mail === "") {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Alamat E-Mail Anda!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if ($pass === "") {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Kata Sandi Anda!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if ($pass2 === "") {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan ulang Kata Sandinya!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if (empty(trim($nama))) {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Nama Lengkap Anda!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if (empty(trim($pass))) {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Kata Sandi Anda!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else if (strlen($pass) < 6) {
            echo "<script>
                swal.stopLoading();
                swal.close();
                swal(\"Gagal\", \"Anda wajib memasukkan Kata Sandi minimal 6 karakter!\", {icon:\"error\"}).then(ok => {
                //do anything
                });
            </script>";
            return;
        } else {
            if ($pass != $pass2) {
                echo "<script>
                    swal.stopLoading();
                    swal.close();
                    swal(\"Gagal\", \"Kata Sandi yang Anda masukkan tidak sama, periksa kembali!\", {icon:\"error\"}).then(ok => {
                    //do anything
                    });
                </script>";
                return;
            } else {
                $cekemail = $this->db->select('email')
                    ->from('tb_user')
                    ->where('email', $mail)
                    ->get();
                $cekemail2 = $this->db->select('email')
                    ->from('tb_admin')
                    ->where('email', $mail)
                    ->get();
                if (($cekemail->num_rows() != 0) || ($cekemail2->num_rows() != 0)) {
                    echo "<script>
                        swal.stopLoading();
                        swal.close();
                        swal(\"Gagal\", \"Email $mail sudah pernah didaftarkan!\", {icon:\"error\"}).then(ok => {
                        //do anything
                        });
                    </script>";
                    return;
                }

                $prefixUser = "U-";
                $prefixKoor = "K-";
                $randID = date("YmdHis");
                $idUser = $prefixUser . $randID;
                $idKoor = $prefixKoor . $randID;
                //send verification

                if ($this->send_verification(base64_encode($idUser), $mail, base64_encode($code))) {
                    // User
                    $this->db->insert('tb_user', array(
                        'id' => $idUser,
                        'email' => $mail,
                        'password' => $this->bcrypt->hash_password($pass),
                        'tanggal_reg' => date("Y-m-d"),
                        'code' => $code,
                        'status' => 'false'
                    ));

                    // Koor
                    $this->db->insert('tb_koor', array(
                        'id' => $idKoor,
                        'id_user' => $idUser,
                        'nama' => $nama,
                        'email' => $mail,
                        'no_hp' => '',
                        'institusi' => '',
                        'lampiran_identitas' => ''
                    ));
                    //$this->session->set_flashdata('pesan', '<script type="text/javascript">swal ( "Info" ,  "Akun anda belum diverifikasi, Silahkan cek email untuk memverifikasi akun anda." ,  "warning" )</script>');
                    // $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissable fade show" role="alert">
                    //                         <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                    //                         <span class="alert-inner--text"> Akun anda belum diverifikasi, Silahkan cek email untuk memverifikasi akun anda. </span>
                    //                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    //                         </div>');
                    $uri = base_url('user');
                    echo "<script>
                        swal.stopLoading();
                        swal.close();
                        swal(
                        \"Berhasil\",
                        \"Selamat $nama, Anda berhasil mendaftarkan diri ke Perlombaan IITF 2019! Silahkan cek email untuk aktivasi akun\",
                        {icon:\"success\"}
                        ).then(ok => {
                        window.location.replace(\"$uri\");
                        });
                    </script>";
                    //echo "<script>window.alert(\"Selamat $nama, Anda berhasil mendaftarkan diri ke Perlombaan IITF 2019!\\nKlik OK untuk mulai dialihkan ke halaman selanjutnya.\");window.location.href = \"" . $uri . "\";</script>";
                    return;
                } else {
                    //echo $this->email->print_debugger();
                    // echo "<script>console.log($this->send_verification(base64_encode($idUser),$mail,base64_decode($code)))</script>";
                    //echo "<script>window.alert(\"Gagal mengirimkan verifikasi email error: \")</script>";
                    echo "<script>
                        swal.stopLoading();
                        swal.close();
                        swal(
                        \"Gagal\",
                        \"Ada masalah saat mencoba mengirimkan email verifikasi. Coba lagi nanti.\",
                        {icon:\"success\"}
                        ).then(ok => {
                        
                        });
                    </script>";
                    return;
                }
            }
        }
    }

    private function send_verification($id, $email, $code)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'iitfintermedia@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
            'smtp_pass' => 'intermediaiitf2019', // informasi rahasia ini jangan di gunakan sembarangan
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message =     "
                  <html>
                  <head>
                      <title>Verifikasi Akun anda</title>
                  </head>
                  <body>
                      <h2>Terima kasih sudah Mendaftar.</h2>
                      <p>Akun anda:</p>
                      <p>Email: " . $email . "</p>
                      <p>Silahkan klik link berikut untuk memverifikasi akun anda.</p>
                      <h4><a href='" . base_url() . "user/verification?id=" . $id . "&code=" . $code . "'>Verifikasi Akun Saya</a></h4>
                  </body>
                  </html>
                  ";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Verifikasi akun');
        $this->email->message($message);

        return $this->email->send();
    }

    public function verification()
    {
        $id = $this->input->get('id');
        $code = $this->input->get('code');
        $cek = $this->DataModel->select('email,code');
        $cek = $this->DataModel->getWhere('id', base64_decode($id));
        $cek = $this->DataModel->getData('tb_user')->row();
        // die(json_encode(base64_decode($id)));
        // die(json_encode($cek->code == base64_decode($code)));
        if ($cek->code == base64_decode($code)) {
            $data = array(
                "status" => "true"
            );
            $this->DataModel->getWhere('id', base64_decode($id));
            $this->DataModel->update('tb_user', $data);

            $payload['judul'] = "Verifikasi Akun";
            $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));;
            $payload['page'] = "verifikasi";
            $payload['user'] = $cek;

            $this->load->view('component/header', $payload);
            $this->load->view('src/iitf_verifikasi', $payload);
            $this->load->view('component/ground');
        } else {
            $_SESSION['error_message'] = 'Error message';
            header("location: " . base_url() . 'error.html');
            exit;
        }
    }

    public function timeline()
    {
        $userdata = $this->DataModel->getWhere('email',$this->session->userdata('email'));
        $userdata = $this->DataModel->getData('tb_user')->row();
        $email = "";
        if($this->session->userdata('email') != "" && $userdata->step_selesai == 5){
            $email = "Dashboard";   
        }else if($this->session->userdata('email') != ""){
            $email = "LANJUTKAN DAFTAR: " . $this->session->userdata('email');
        }
        $payload['judul'] = "TIMELINE";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = $email;
        $payload['page'] = "timeline";
        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_timeline', $payload);
        $this->load->view('component/ground');
    }

    public function email_check($str)
    {
        if ($str == '') {
            $this->form_validation->set_message('email_check', 'Anda wajib mengisikan {field} Anda.');
            return FALSE;
        } else {
            $this->db->select('a.email, b.email');
            $this->db->from('tb_user a, tb_admin b');
            $this->db->where('a.email', $str);
            $this->db->or_where('b.email', $str);

            if ($this->db->count_all_results() == 0 || $str == $this->session->userdata('email')) return TRUE;
            else {
                $this->form_validation->set_message('email_check', '{field} "' . $str . '" sudah pernah didaftarkan sebelumnya.');
                return FALSE;
            }
        }
    }

    public function pilihlomba()
    {
        $koorq = $this->db->get_where('tb_koor', array(
            'id_user' => $this->session->userdata('id')
        ));
        $koor = $koorq->row();
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        $idlomba = $this->input->post('lomba');

        $query = $this->db->query('SELECT b.id, b.id_koor, a.namalomba, a.keterangan FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
        $getnumrow = $query->num_rows();

        if ($getnumrow != 0) {
            $result = $query->result_array();

            $this->db->update('tb_pendaftaran', array(
                'id_lomba' => $idlomba
            ), array('id_koor' => $koor->id));

            echo "<script>
                $('#warnings').addClass('notification is-primary');
                $('#warnings').html('Berhasil menyimpan perubahan, silakan tunggu...');
                setTimeout(function() {
                    window.location.href = '".base_url('user')."';
                }, 2500);
            </script>";
        } else {
            $prefix = "P-";
            $randID = date("YmdHis");
            $idl = $prefix . $randID;

            $gets = $this->input->post('id_koor');

            $this->db->insert('tb_pendaftaran', array(
                'id' => $idl,
                'id_koor' => $gets,
                'id_lomba' => $idlomba,
                'status' => 'unactive',
                'tanggal_daftar' => date('Y-m-d')
            ));

            echo "<script>
                $('#warnings').addClass('notification is-primary');
                $('#warnings').html('Berhasil disimpan, silakan tunggu...');
                setTimeout(function() {
                    window.location.href = '".base_url('user')."';
                }, 2500);
            </script>";
        }
        // if ($step_lalu < 2) {
            $cek = $this->DataModel->getWhere('id', $idlomba);
            $cek = $this->DataModel->getData('tb_lomba')->row();
            // echo $cek;
            if ($cek->keterangan == "individu") {
                $this->db->update('tb_user', array(
                    'step_selesai' => 3
                ), array(
                    'id' => $this->session->userdata('id')
                ));
            } else {
                $this->db->update('tb_user', array(
                    'step_selesai' => 2
                ), array(
                    'id' => $this->session->userdata('id')
                ));
            }
        // }
    }

    private function _uploadFile($name)
    {
        if (!file_exists('assets/dump/' . $this->session->userdata('id'))) {
            mkdir('assets/dump/' . $this->session->userdata('id'), 0777, true);
        }
        $config['upload_path'] = 'assets/dump/' . $this->session->userdata('id');
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['file_name'] = $name;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;
        $this->upload->initialize($config);
    }

    private function _uploadSurat($name)
    {
        if (!file_exists('assets/dump/' . $this->session->userdata('id'))) {
            mkdir('assets/dump/' . $this->session->userdata('id'), 0777, true);
        }
        $config['upload_path'] = 'assets/dump/' . $this->session->userdata('id');
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $name;
        $config['overwrite'] = true;
        $config['max_size'] = 2048;
        $this->upload->initialize($config);
    }

    private function _uploadBukti($name)
    {
        if (!file_exists('assets/dump/' . $this->session->userdata('id'))) {
            mkdir('assets/dump/' . $this->session->userdata('id'), 0777, true);
        }
        $config['upload_path'] = 'assets/dump/' . $this->session->userdata('id');
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $name;
        $config['overwrite'] = true;
        $config['max_size'] = 1024;
        $this->upload->initialize($config);
    }

    private function _uploadLomba($name)
    {
        if (!file_exists('assets/dump/' . $this->session->userdata('id'))) {
            mkdir('assets/dump/' . $this->session->userdata('id'), 0777, true);
        }
        $config['upload_path'] = 'assets/dump/' . $this->session->userdata('id');
        $config['allowed_types'] = 'zip|rar';
        $config['file_name'] = $name;
        $config['overwrite'] = true;
        $config['max_size'] = 10480;
        $this->upload->initialize($config);
    }

    public function saveKoor()
    {
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Telepon/WA', 'required');
        // $this->form_validation->set_rules('email', 'E-Mail', 'valid_email|callback_email_check');
        $this->form_validation->set_rules('instansi', 'Asal Instansi', 'required');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nohp = $this->input->post('no_hp');
            $instansi = $this->input->post('instansi');

            if (empty(trim($nama))) {
                // Its empty so throw a validation error
                echo "<script>
                        $('#warnings').addClass('notification is-danger');
                        $('#warnings').html('Nama Lengkap wajib diisi!');
                    </script>";
                return;
            } else if (empty(trim($instansi))) {
                // Its empty so throw a validation error
                echo "<script>
                        $('#warnings').addClass('notification is-danger');
                        $('#warnings').html('Asal Instansi wajib diisi!');
                    </script>";
                return;
            } else {
                if (!empty($_FILES['resume']['name'])) {
                    $path = $_FILES['resume']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = "Foto_Koor-" . $this->session->userdata('id') . "." . $ext;
                    //echo "<script>console.log('" . $filename . "');</script>";
    
                    $this->_uploadFile($filename);
                    if (!$this->upload->do_upload('resume')) {
                        echo "<script>
                                $('#warnings').addClass('notification is-danger');
                                $('#warnings').html('Gagal mengunggah foto: " . $this->upload->display_errors() . "<br>Data tidak dapat disimpan.');
                            </script>";
                    } else {
                        $koorq = $this->db->get_where('tb_koor', array(
                            'id_user' => $this->session->userdata('id')
                        ));
                        $koor = $koorq->row();
                        $userfile = 'assets/dump/' . $this->session->userdata('id') . "/" . $filename;
                        $response = json_decode($this->dropbox->uploadNewFile("/" . $koor->id . "/", $userfile));
    
                        if ($response->http_code == 200) {
                            // die(json_encode($response->response->id));
                            // berhasil upload ke Dropbox
                            // $this->db->update('tb_user', array(
                            //     'email' => $email
                            // ), array(
                            //     'id' => $this->session->userdata('id')
                            // ));
    
                            $this->db->update('tb_koor', array(
                                'nama' => $nama,
                                // 'email' => $email,
                                'no_hp' => $nohp,
                                'institusi' => $instansi,
                                'lampiran_identitas' => $filename
                            ), array(
                                'id_user' => $this->session->userdata('id')
                            ));
    
                            echo "<script>
                                    $('#warnings').addClass('notification is-primary');
                                    $('#warnings').html('Berhasil disimpan dan berhasil mengunggah foto. Silakan tunggu...');
                                    setTimeout(function() {
                                        window.location.href = '".base_url('user')."';
                                    }, 2500);
                                </script>";
    
                            // bebersih data
                            unlink($userfile);
    
                            if ($step_lalu < 1) {
                                $this->db->update('tb_user', array(
                                    'step_selesai' => 1
                                ), array(
                                    'id' => $this->session->userdata('id')
                                ));
                            }
                            $this->load->helper("file");
                            delete_files($path);
                        } else {
                            echo "<script>
                                    $('#warnings').addClass('notification is-primary');
                                    $('#warnings').html('Gagal mengunggah foto: DropboxUploadFileException(" . $response->http_code . ")<br>Data tidak dapat disimpan.');
                                </script>";
                        }
                    }
                } else {
                    if ($step_lalu < 1) {
                        echo "<script>$('#warnings').addClass('notification is-danger');</script>Anda wajib mengunggah foto Anda.";
                    } else {
                        // $this->db->update('tb_user', array(
                        //     'email' => $email
                        // ), array(
                        //     'id' => $this->session->userdata('id')
                        // ));
    
                        $this->db->update('tb_koor', array(
                            'nama' => $nama,
                            // 'email' => $email,
                            'no_hp' => $nohp,
                            'institusi' => $instansi
                        ), array(
                            'id_user' => $this->session->userdata('id')
                        ));
                        echo "<script>
                                $('#warnings').addClass('notification is-primary');
                                $('#warnings').html('Berhasil disimpan. Silakan tunggu...');
                                setTimeout(function() {
                                    window.location.href = '".base_url('user')."';
                                }, 2500);
                            </script>";
                    }
                }
            }
        } else {
            echo "<script>$('#warnings').addClass('notification is-danger');</script>" . validation_errors();
        }
    }

    public function saveTeam()
    {
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        $this->form_validation->set_rules('nama[]', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_hp[]', 'Nomor Telepon/WA', 'required');

        if ($this->form_validation->run() != false) {
            $nama_team = $this->input->post('nama_team');
            $id = $this->input->post('id_anggota');
            $nama = $this->input->post('nama');
            $nohp = $this->input->post('no_hp');
            $koor = $this->DataModel->getWhere('id_user', $this->session->userdata('id'));
            $koor = $this->DataModel->getData('tb_koor')->row();
            $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
            $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
            // die(json_encode($id));
            $data = array(
                "nama_team" => $nama_team,
            );
            $this->DataModel->getWhere('id', $pendaftaran->id);
            $this->DataModel->update('tb_pendaftaran', $data);
            $i = 0;
            $n = 1;
            $dataa = array();
            // die(json_encode($_FILES));
            foreach ($nama as $key => $val) {
                if (!empty($_FILES['identitas' . $n]['name'])) {
                    $path = $_FILES['identitas' . $n]['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = "A-" . $pendaftaran->id . "_" . $i . "." . $ext;

                    $this->_uploadFile($filename);

                    // var_dump($this->upload->do_upload('identitas[]'));
                    if (!$this->upload->do_upload('identitas' . $n)) {
                        echo "error: " . $this->upload->display_errors() . "<br>";
                    } else {
                        $userfile = 'assets/dump/' . $this->session->userdata('id') . "/" . $filename;
                        $response = json_decode($this->dropbox->uploadNewFile("/" . $koor->id . "/", $userfile));
                        // bebersih data
                        unlink($userfile);
                        $dataa = array(
                            "id_pendaftaran" => $pendaftaran->id,
                            "nama" => $val,
                            "no_hp" => $nohp[$i],
                            "lampiran_identitas" => $filename
                        );
                        if (isset($id[$i])) {
                            // echo "update";
                            $this->DataModel->getWhere('id', $id[$i]);
                            $this->DataModel->update('tb_anggota', $dataa);
                        } else {
                            // echo "insert";
                            $this->DataModel->insert('tb_anggota', $dataa);
                        }
                        unset($dataa);
                        echo "<script>$('#warnings').addClass('notification is-success');
                        setTimeout(function(){
                            window.location.href = '".base_url('user')."';
                        }, 2500);
                        </script>Berhasil mengunggah data, silakan tunggu...";
                    }
                } else {
                    // var_dump($id[$i]);
                    // die();
                    if (isset($id[$i])) {
                        $dataa = array(
                            "id_pendaftaran" => $pendaftaran->id,
                            "nama" => $val,
                            "no_hp" => $nohp[$i],
                        );
                        $this->DataModel->getWhere('id', $id[$i]);
                        $this->DataModel->update('tb_anggota', $dataa);
                    } else {
                        echo '<div class="notification is-danger">Anda Belum Mengupload lampiran identitas</div>';
                        return;
                        //redirect('user?step=2', 'refresh');
                        //die();
                        // break;
                        // echo "<script>$('#warnings').addClass('notification is-danger');</script>Anda wajib mengunggah identitas anggota anda.";
                    }
                }
                $i++;
                $n++;
            }
            // die();
            // die(json_encode($dataa));
            if ($step_lalu < 3) {
                $ket = $this->db->query('SELECT a.pre_registration,a.id FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"')->row();
                // die(json_encode($ket));
                // $cek = $this->DataModel->getWhere('id', $ket->id);
                // $cek = $this->DataModel->getData('tb_lomba')->row();
                if ($ket->pre_registration == "true") {
                    $this->db->update('tb_user', array(
                        'step_selesai' => 4
                    ), array(
                        'id' => $this->session->userdata('id')
                    ));
                } else {
                    $this->db->update('tb_user', array(
                        'step_selesai' => 3
                    ), array(
                        'id' => $this->session->userdata('id')
                    ));
                }
                // redirect('user', 'refresh');
            }
            // die();
            redirect('user', 'refresh');
        } else {
            echo "<script>$('#warnings').addClass('notification is-danger');</script>" . validation_errors();
        }
    }

    public function delTeam($id)
    {
        $query = $this->DataModel->delete('id', $id, 'tb_anggota');
        redirect('user?step=2');
    }

    public function pembayaran()
    {
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        $koor = $this->DataModel->getWhere('id_user', $this->session->userdata('id'));
        $koor = $this->DataModel->getData('tb_koor')->row();
        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();

        if (!empty($_FILES['bukti']['name'])) {
            $path = $_FILES['bukti']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = "Bukti_pembayaran-" . $pendaftaran->id . "." . $ext;

            $this->_uploadBukti($filename);
            if (!$this->upload->do_upload('bukti')) {
                echo "<script>$('#warnings').addClass('notification is-danger');</script>Error: " . $this->upload->display_errors() . "<br>";
            } else {
                $userfile = 'assets/dump/' . $this->session->userdata('id') . "/" . $filename;
                $response = json_decode($this->dropbox->uploadNewFile("/" . $koor->id . "/", $userfile));
                // bebersih data
                unlink($userfile);
                $dataa = array(
                    "bukti_bayar" => $filename
                );
                // echo "update";
                $this->DataModel->getWhere('id', $pendaftaran->id);
                $this->DataModel->update('tb_pendaftaran', $dataa);
                // if ($step_lalu < 4) {
                //     $this->db->update('tb_user', array(
                //         'step_selesai' => 4
                //     ), array(
                //         'id' => $this->session->userdata('id')
                //     ));
                //     redirect('user', 'refresh');
                // }
                // die();
                echo "<script>
                        $('#warning').addClass('notification is-primary');
                        $('#warning').html('Berhasil mengunggah bukti pembayaran. Silakan tunggu...');
                        setTimeout(function() {
                            window.location.href = '".base_url('user')."';
                        }, 2500);
                    </script>";
                //redirect('user', 'refresh');
                // unset($data);
            }
        } else {
            echo "<script>$('#warning').addClass('notification is-danger');</script>Anda belum mengunggah bukti pembayaran.";
        }
    }

    public function submission()
    {
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        $koor = $this->DataModel->getWhere('id_user', $this->session->userdata('id'));
        $koor = $this->DataModel->getData('tb_koor')->row();
        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
        $filenameP = "";
        $filenameS = "";
        if (!empty($_FILES['perlombaan']['name'])) {
            $pathP = $_FILES['perlombaan']['name'];
            $extP = pathinfo($pathP, PATHINFO_EXTENSION);
            $filenameP = "File-" . $pendaftaran->id . "." . $extP;
            $this->_uploadLomba($filenameP);
            if (!$this->upload->do_upload('perlombaan')) {
                echo "<script>$('#warnings').addClass('notification is-danger');</script>Error: " . $this->upload->display_errors() . "<br>";
            } else {
                $userfile = 'assets/dump/' . $this->session->userdata('id') . "/" . $filenameP;
                $responseP = json_decode($this->dropbox->uploadNewFile("/" . $koor->id . "/", $userfile));
                // die(json_encode($responseP));
                unlink($userfile);
            }
        }
        if (!empty($_FILES['surat']['name'])) {
            $pathS = $_FILES['surat']['name'];
            $ext = pathinfo($pathS, PATHINFO_EXTENSION);
            $filenameS = "Surat-" . $pendaftaran->id . "." . $ext;
            $this->_uploadSurat($filenameS);
            // bebersih data
            // die(json_encode($responseP));
            if (!$this->upload->do_upload('surat')) {
                echo "<script>$('#warnings').addClass('notification is-danger');</script>Error: " . $this->upload->display_errors() . "<br>";
            } else {
                $userfile = 'assets/dump/' . $this->session->userdata('id') . "/" . $filenameS;
                $response = json_decode($this->dropbox->uploadNewFile("/" . $koor->id . "/", $userfile));
                // bebersih data
                unlink($userfile);
                $dataa = array(
                    "lampiran_file" => $filenameP,
                    "lampiran_surat" => $filenameS
                );
                // echo "update";
                $this->DataModel->getWhere('id', $pendaftaran->id);
                $this->DataModel->update('tb_pendaftaran', $dataa);
                // if ($step_lalu <= 4) {
                    $this->db->update('tb_user', array(
                        'step_selesai' => 5
                    ), array(
                        'id' => $this->session->userdata('id')
                    ));
                    //redirect('user', 'refresh');
                // }
                // die();
                echo "<script>
                            $('#warnings').addClass('notification is-primary');
                            $('#warnings').html('Berhasil mengunggah semua berkas. Silakan tunggu...');
                            setTimeout(function() {
                                window.location.href = '".base_url('user')."';
                            }, 2500);
                        </script>";
            }
        } else {
            echo "<script>$('#warnings').addClass('notification is-danger');</script>Anda belum mengunggah surat pernyataan anda.";
        }
    }

    public function step()
    {
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email'),
            'status' => 'true'
        ));

        $koor = null;
        $userdata = $check->row();
        if ($check->num_rows() == 0) {
            $this->session->sess_destroy(); // fix ERROR 400: BAD REQUEST
            redirect('login');
        } else {
            $koorq = $this->db->get_where('tb_koor', array(
                'id_user' => $this->session->userdata('id')
            ));
            $koor = $koorq->row();
        }
        $ket = $this->db->query('SELECT a.keterangan ,a.pre_registration as pre FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"')->row();
        $pre = $this->db->query('SELECT a.pre_registration FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"')->row();
        // die(json_encode($ket));
        // die(json_encode($ket));
        if ($ket != null) {
            $ket = $ket->keterangan;
            $pre = $pre->pre_registration;
            // $preaaa = $ket->pre;
        } else {
            $ket = null;
            $pre = null;
        }
        // die(json_encode($pre));
        $email = "";
        if ($this->session->userdata('email') != "" && $userdata->step_selesai == 5) {
            $email = "Dashboard";
        } else if ($this->session->userdata('email') != "") {
            $email = "LANJUTKAN DAFTAR: " . $this->session->userdata('email');
        }
        $pendaftaran = $this->DataModel->select('status');
        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
        // die(json_encode($pendaftaran));

        if ($pendaftaran != null) {
            $stat = $pendaftaran->status;
        } else {
            $stat = "";
            // $pre = "";
        }

        $payload['judul'] = "PENDAFTARAN LOMBA";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = $email;
        $payload['emailUser'] = $this->session->userdata('email');
        $payload['page'] = "steps";
        $payload['nama'] = $koor->nama;
        $payload['nohp'] = $koor->no_hp;
        $payload['inst'] = $koor->institusi;
        $payload['lampiran'] = ($koor->lampiran_identitas == "" ? "Pilih berkas foto terlebih dahulu" : $koor->lampiran_identitas);
        $payload['step'] = $userdata->step_selesai;
        $payload['keterangan'] = $ket;
        $payload['pre_regis'] = $pre;
        $payload['status'] = $stat;
        // die(json_encode($payload));
        @$loadstep = $this->input->get('step');
        if (isset($loadstep)) {
            if ($loadstep <= $payload['step']) {
                switch ($this->input->get('step')) {
                    case 0:
                        $this->load->view('component/header', $payload);
                        $this->load->view('pages/user/user_step_koor', $payload);
                        $this->load->view('component/ground');
                        break;
                    case 1:
                        $payload['id_koor'] = $koor->id;
                        $this->db->select('*');
                        $this->db->from('listlomba');
                        $listlomba = $this->db->get()->result_array();
                        $payload['listlomba'] = $listlomba;
                        // $pendaftaran = $this->DataModel->select('bukti_bayar');
                        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
                        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
                        if ($pendaftaran == null) {
                            $pendaftaran = "";
                        } else {
                            $pendaftaran = $pendaftaran->bukti_bayar;
                        }

                        $payload['bukti'] = $pendaftaran;
                        $query = $this->db->query('SELECT b.id_koor, a.namalomba FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                        $getnumrow = $query->num_rows();
                        $payload['lombaterpilih'] = FALSE;
                        if ($getnumrow > 0) {
                            $payload['lombaterpilih'] = $query->row()->namalomba;
                        }
                        // die(json_encode($payload));
                        $this->load->view('component/header', $payload);
                        $this->load->view('pages/user/user_step_pilih_lomba', $payload);
                        $this->load->view('component/ground');
                        break;
                    case 2:
                        $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
                        $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
                        $query = $this->db->query('SELECT b.id_koor, a.jumlah_anggota FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                        $payload['anggota'] = $query->row();
                        $anggota = $this->DataModel->getWhere('id_pendaftaran', $pendaftaran->id);
                        $anggota = $this->DataModel->getData('tb_anggota')->result_array();
                        $payload['langgota'] = $anggota;
                        $payload['pendaftaran'] = $pendaftaran;

                        $this->load->view('component/header', $payload);
                        $this->load->view('pages/user/user_step_team', $payload);
                        $this->load->view('component/ground');
                        break;
                    case 3:
                        $query = $this->db->query('SELECT b.id, b.tanggal_daftar, b.bukti_bayar,b.status, a.harga, b.nama_team, a.jumlah_anggota, b.id_koor, a.namalomba, a.keterangan FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                        //$query = $this->db->query('SELECT b.id_koor, a.harga FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');

                        $payload['lomba'] = $query->row();
                        $payload['pendaftaran'] = $query->row();
                        // die(json_encode($payload));
                        $this->load->view('component/header', $payload);
                        $this->load->view('pages/user/user_step_pembayaran', $payload);
                        $this->load->view('component/ground');
                        break;
                    case 4:
                        $getinfo = $this->db->select('*')
                            ->from('tb_pendaftaran')
                            ->where('id_koor', $koor->id)
                            ->get()
                            ->row();
                        $lomba = $this->DataModel->getWhere("id", $getinfo->id_lomba);
                        $lomba = $this->DataModel->getData("tb_lomba")->row();
                        $payload['lomba'] = $lomba;
                        $payload['submit'] = $getinfo;
                        // die(json_encode($payload));
                        $this->load->view('component/header', $payload);
                        $this->load->view('pages/user/user_step_submission', $payload);
                        $this->load->view('component/ground');
                        break;
                    case 5:
                        redirect('user/dashboard');
                        break;
                }
            } else {
                redirect(base_url('user'), 'refresh');
            }
        } else {
            if ($payload['step'] == 0) {
                // step koor
                $this->load->view('component/header', $payload);
                $this->load->view('pages/user/user_step_koor');
                $this->load->view('component/ground');
            } else if ($payload['step'] == 1) {
                //step 2
                $payload['id_koor'] = $koor->id;
                $this->db->select('*');
                $this->db->from('listlomba');
                $listlomba = $this->db->get()->result_array();
                $payload['listlomba'] = $listlomba;
                // $pendaftaran = $this->DataModel->select('bukti_bayar');
                $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
                $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
                // die(json_encode($pendaftaran));

                if ($pendaftaran == null) {
                    $pendaftaran = "";
                } else {
                    $pendaftaran = $pendaftaran->bukti_bayar;
                }

                $payload['bukti'] = $pendaftaran;
                $query = $this->db->query('SELECT b.id_koor, a.namalomba,a.keterangan FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                $getnumrow = $query->num_rows();
                $payload['lombaterpilih'] = FALSE;
                if ($getnumrow > 0) {
                    $payload['lombaterpilih'] = $query->row()->namalomba;
                }

                $this->load->view('component/header', $payload);
                $this->load->view('pages/user/user_step_pilih_lomba', $payload);
                $this->load->view('component/ground');
            } else if ($payload['step'] == 2) {
                //biodata team
                $pendaftaran = $this->DataModel->getWhere('id_koor', $koor->id);
                $pendaftaran = $this->DataModel->getData('tb_pendaftaran')->row();
                $query = $this->db->query('SELECT b.id_koor, a.jumlah_anggota FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                $payload['anggota'] = $query->row();
                $anggota = $this->DataModel->getWhere('id_pendaftaran', $pendaftaran->id);
                $anggota = $this->DataModel->getData('tb_anggota')->result_array();
                $payload['langgota'] = $anggota;
                $payload['pendaftaran'] = $pendaftaran;
                // die(json_encode($payload));
                $this->load->view('component/header', $payload);
                $this->load->view('pages/user/user_step_team');
                $this->load->view('component/ground');
            } else if ($payload['step'] == 3) {
                //pembayaran
                $query = $this->db->query('SELECT b.id_koor,b.status, b.tanggal_daftar, b.bukti_bayar, b.nama_team, a.jumlah_anggota, a.harga, a.namalomba, b.id FROM listlomba a INNER JOIN tb_pendaftaran b ON a.id = b.id_lomba WHERE b.id_koor = "' . $koor->id . '"');
                $payload['pendaftaran'] = $query->row();
                $payload['lomba'] = $query->row();
                $this->load->view('component/header', $payload);
                $this->load->view('pages/user/user_step_pembayaran', $payload);
                $this->load->view('component/ground');
            } else if ($payload['step'] == 4) {
                //submisi file
                $getinfo = $this->db->select('*')
                    ->from('tb_pendaftaran')
                    ->where('id_koor', $koor->id)
                    ->get()
                    ->row();
                $lomba = $this->DataModel->getWhere("id", $getinfo->id_lomba);
                $lomba = $this->DataModel->getData("tb_lomba")->row();
                $payload['lomba'] = $lomba;
                $payload['submit'] = $getinfo;
                $this->load->view('component/header', $payload);
                $this->load->view('pages/user/user_step_submission', $payload);
                $this->load->view('component/ground');
            } else if ($payload['step'] == 5) {

                redirect('user/dashboard');
                //undefined
            }
        }
    }

    public function lupaPassword()
    {
        $payload['judul'] = "LUPA PASSWORD";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "timeline";

        if ($this->input->post('kirim')) {
            $email = $this->input->post('email');

            $cek = $this->DataModel->getWhere('email', $email);
            $cek = $this->DataModel->getData('tb_user');

            if ($cek->num_rows() != 0) {
                $d = $cek->row();
                $token = $this->generateToken($d->id);
                if ($this->send_reset_pass(base64_encode($d->id), $email, base64_encode($token))) {
                    echo "<script>window.alert(\"Link untuk reset password telah dikirim ke email, Silahkan cek email anda.\")</script>";
                }
            } else {
                echo "<script>window.alert(\"Email yang anda masukkan belum terdaftar!, Silahkan masukkan email yang sudah terdaftar\")</script>";
            }
        }

        $this->load->view('component/header', $payload);
        $this->load->view('src/iitf_forgot_pass', $payload);
        // $this->load->view('component/footer');
        $this->load->view('component/ground');
    }

    public function lupaPasswordProcess()
    {
        $id = $this->input->get('id');
        $token = $this->input->get('token');

        $cek = $this->DataModel->select('token');
        $cek = $this->DataModel->getWhere('id', base64_decode($id));
        $cek = $this->DataModel->getData('tb_user')->row();

        if ($cek->token == base64_decode($token)) {
            $payload['judul'] = "Ubah Password";
            $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));;
            $payload['page'] = "Ubah Password";
            if ($this->input->post('kirim')) {
                $pass = $this->input->post('password');

                $data = array(
                    "password" => $this->bcrypt->hash_password($pass)
                );

                $q = $this->DataModel->getWhere('id', base64_decode($id));
                $q = $this->DataModel->update('tb_user', $data);
                if ($q) {
                    $uri = base_url('user');
                    echo "<script>window.alert(\"Password anda berhasil dirubah silahkan login untuk melanjutkan\\nKlik OK untuk mulai dialihkan ke halaman selanjutnya.\");window.location.href = \"" . $uri . "\";</script>";
                }
            } else {
                $this->load->view('component/header', $payload);
                $this->load->view('src/iitf_ubah_pass', $payload);
                $this->load->view('component/ground');
            }
        } else {
            $_SESSION['error_message'] = 'Error message';
            header("location: " . base_url() . 'error.html');
            exit;
        }
    }

    private function send_reset_pass($id, $email, $token)
    {
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

        $message =     "
                  <html>
                  <head>
                      <title>Reset Password Akun anda</title>
                  </head>
                  <body>
                      <h2>Anda menerima email ini karena ada permintaan untuk memperbaharui password anda.</h2>
                      <p>Akun anda:</p>
                      <p>Email: " . $email . "</p>
                      <p>Silahkan klik link berikut untuk mereset password akun anda.</p>
                      <h4><a href='" . base_url() . "lupa_password/process?id=" . $id . "&token=" . $token . "'>Reset Password Akun Saya</a></h4>
                  </body>
                  </html>
                  ";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message($message);

        return $this->email->send();
    }

    private function generateToken($id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
        );

        $this->DataModel->getWhere('id', $id);
        $this->DataModel->update('tb_user', $string);

        return $token;
    }
}
