<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class App_view extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('bcrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    //HomePage
    public function index()
    {
        $payload['judul'] = "HOME";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "home";
        $lomba = $this->DataModel->getData('tb_lomba')->result_array();
        $i=0;
        foreach($lomba as $key => $val){
            $lomba[$i]['juara'] = $this->DataModel->getWhere('id_lomba',$val['id']);
            $lomba[$i]['juara'] = $this->DataModel->getData('tb_juara')->result_array();
            $i++;
        }
        $data = array(
            "lomba" => $lomba,
            "judul" => $payload['judul'],
            "email" => $payload['email'],
            "page" => $payload['page'],
        );
        $this->load->view('component/header',$data);
        $this->load->view('src/iitf_index',$data);     
        $this->load->view('component/footer');
        $this->load->view('component/ground');
    }

    public function login(){
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
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_login',$payload);
        $this->load->view('component/ground');
    }

    public function detailLomba(){
        $judul = $this->input->get('lomba');

        $lomba = $this->DataModel->select('tb_lomba.nama,tb_lomba.deskripsi,tb_lomba.harga,tb_lomba.guide_book,tb_lomba.tema,tb_juara.nominal as juara,tb_kategori.nama as kategori');
        $lomba = $this->DataModel->getWhere('tb_lomba.nama',$judul);
        $lomba = $this->DataModel->getJoin('tb_juara','tb_juara.id_lomba = tb_lomba.id','inner');
        $lomba = $this->DataModel->getJoin('tb_kategori','tb_kategori.id = tb_lomba.id_kategori','inner');
        $lomba = $this->DataModel->getData('tb_lomba')->result_array();
        
        // die(json_encode($lomba));
        $payload['judul'] = "HOME";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "home";
        $payload['lomba'] = $lomba;
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_detail_lomba');
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
                echo "<script>window.alert(\"Akun anda belum terverifikasi, Silahkan cek email anda  \");</script>";
            } else {
                if ($this->bcrypt->check_password($pass, $result->password)) {
                    # sukses login

                    $array = array(
                        'id' => $result->id,
                        'email' => $result->email
                    );

                    $this->session->set_userdata($array);

                    echo "<script>location.href = '" . base_url() . "user';</script>";
                } else {
                    # password salah
                    echo "<font color=\"red\">Password yang Anda masukkan salah!</font>";
                }
            }
        } else {
            # username salah
            echo "<font color=\"red\">Email '" . $user . "' belum terdaftar!</font>";
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
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_register',$payload);
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
            echo "<font color=\"red\">Anda wajib memasukkan Nama Pendaftar!</font>";
            return;
        } else if ($mail === "") {
            echo "<font color=\"red\">Anda wajib memasukkan Alamat E-Mail!</font>";
            return;
        } else if ($pass === "") {
            echo "<font color=\"red\">Anda wajib memasukkan Kata Sandi!</font>";
            return;
        } else if ($pass2 === "") {
            echo "<font color=\"red\">Anda wajib memasukkan ulang Kata Sandinya!</font>";
            return;
        } else {
            if ($pass != $pass2) {
                echo "<font color=\"red\">Kata Sandi yang Anda masukkan tidak sama, periksa kembali!</font>";
                return;
            } else {
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
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Akun anda belum diverifikasi, Silahkan cek email untuk memverifikasi akun anda. </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
                    $uri = base_url('user');
                    // die(json_encode($this->session->flashdata('pesan')));
                    echo "<script>window.alert(\"Selamat $nama, Anda berhasil mendaftarkan diri ke Perlombaan IITF 2019!\\nKlik OK untuk mulai dialihkan ke halaman selanjutnya.\");window.location.href = \"" . $uri . "\";</script>";
                    // return;
                } else {
                    echo $this->email->print_debugger();
                    // echo "<script>console.log($this->send_verification(base64_encode($idUser),$mail,base64_decode($code)))</script>";
                    echo "<script>window.alert(\"Gagal mengirimkan verifikasi email error: \")</script>";
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
        // die(json_encode($cek));
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
        $payload['judul'] = "TIMELINE";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "timeline";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_timeline',$payload);
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

    public function stepSave()
    {
        $step_skrg = $this->input->post('stepnow');
        $step_simpan = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id')
        ))->row();
        $step_lalu = $step_simpan->step_selesai;

        switch ($step_skrg) {
            case 0:
                $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('no_hp', 'Nomor Telepon/WA', 'required');
                $this->form_validation->set_rules('email', 'E-Mail', 'valid_email|callback_email_check');
                $this->form_validation->set_rules('instansi', 'Asal Instansi', 'required');

                if($this->form_validation->run() != false){
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $nohp = $this->input->post('no_hp');
                    $instansi = $this->input->post('instansi');

                    $this->db->update('tb_user', array(
                        'email' => $email
                    ), array(
                        'id' => $this->session->userdata('id')
                    ));
                    
                    $this->db->update('tb_koor', array(
                        'nama' => $nama,
                        'email' => $email,
                        'no_hp' => $nohp,
                        'institusi' => $instansi
                    ), array(
                        'id_user' => $this->session->userdata('id')
                    ));
                    
                    echo "<script>
                        $('#warnings').addClass('notification is-primary');
                        $('#warnings').html('Berhasil disimpan, silakan tunggu...');
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    </script>";
                    if ($step_skrg < 1) {
                        $this->db->update('tb_user', array(
                            'step_selesai' => 1
                        ), array(
                            'id' => $this->session->userdata('id')
                        ));
                        
                    }
                }else{
                    echo "<script>$('#warnings').addClass('notification is-danger');</script>" . validation_errors();
                }

                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
        }
    }

    public function step(){
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email'),
            'status' => 'true'
        ));

        $koor = null;
        $userdata = $check->row();
        if ($check->num_rows() == 0) {
            redirect('login');
        } else {
            $koorq = $this->db->get_where('tb_koor', array(
                'id_user' => $this->session->userdata('id')
            ));
            $koor = $koorq->row();
        }

        $payload['judul'] = "TIMELINE";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));
        $payload['page'] = "steps";
        $payload['nama'] = $koor->nama;
        $payload['nohp'] = $koor->no_hp;
        $payload['inst'] = $koor->institusi;
        $payload['step'] = $userdata->step_selesai;

        @$loadstep = $this->input->get('step');
        if (isset($loadstep)) {
            if ($loadstep <= $payload['step']) {
                switch ($this->input->get('step')) {
                    case 0:
                        $this->load->view('component/header',$payload);
                        $this->load->view('pages/user/user_step_koor');
                        $this->load->view('component/ground');
                        break;
                    case 1:
                        $this->load->view('component/header',$payload);
                        $this->load->view('pages/user/user_step_pilih_lomba');
                        $this->load->view('component/ground');
                        break;
                    case 2:
                        $this->load->view('component/header',$payload);
                        $this->load->view('pages/user/user_step_team');
                        $this->load->view('component/ground');
                        break;
                    case 3:
                        $this->load->view('component/header',$payload);
                        $this->load->view('pages/user/user_step_pembayaran');
                        $this->load->view('component/ground');
                        break;
                    case 4:
                        $this->load->view('component/header',$payload);
                        $this->load->view('pages/user/user_step_submission');
                        $this->load->view('component/ground');
                        break;
                }
            } else {
                redirect(base_url('user'),'refresh');
            }
        } else {
            if($payload['step'] == 0){
                // step koor
                $this->load->view('component/header',$payload);
                $this->load->view('pages/user/user_step_koor');
                $this->load->view('component/ground');
            }else if($payload['step'] == 1){
                //step 2
    
                $this->load->view('component/header',$payload);
                $this->load->view('pages/user/user_step_pilih_lomba');
                $this->load->view('component/ground');
            }else if($payload['step'] == 2){
                //biodata team
                $this->load->view('component/header',$payload);
                $this->load->view('pages/user/user_step_team');
                $this->load->view('component/ground');
            }else if($payload['step'] == 3){
                //pembayaran
                $this->load->view('component/header',$payload);
                $this->load->view('pages/user/user_step_pembayaran');
                $this->load->view('component/ground');
            }else if($payload['step'] == 4){
                //submisi file
                $this->load->view('component/header',$payload);
                $this->load->view('pages/user/user_step_submission');
                $this->load->view('component/ground');
            }else{
                //undefined
            }
        }
    }

    public function lupaPassword()
    {
        $payload['judul'] = "TIMELINE";
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

    public function lupaPasswordProcess(){
        $id = $this->input->get('id');
        $token = $this->input->get('token');

        $cek = $this->DataModel->select('token');
        $cek = $this->DataModel->getWhere('id', base64_decode($id));
        $cek = $this->DataModel->getData('tb_user')->row();

        if($cek->token == base64_decode($token)){
            $payload['judul'] = "Ubah Password";
            $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));;
            $payload['page'] = "Ubah Password";
            if($this->input->post('kirim')){
                $pass = $this->input->post('password');

                $data = array(
                    "password" => $this->bcrypt->hash_password($pass)
                );

                $q = $this->DataModel->getWhere('id',base64_decode($id));
                $q = $this->DataModel->update('tb_user',$data);
                if($q){
                    $uri = base_url('user');
                    echo "<script>window.alert(\"Password anda berhasil dirubah silahkan login untuk melanjutkan\\nKlik OK untuk mulai dialihkan ke halaman selanjutnya.\");window.location.href = \"" . $uri . "\";</script>";
                }

            }else{
                $this->load->view('component/header', $payload);
                $this->load->view('src/iitf_ubah_pass', $payload);
                $this->load->view('component/ground');
            }
        }else{
            $_SESSION['error_message'] = 'Error message';
            header("location: " . base_url() . 'error.html');
            exit;
        }

    }

    private function send_reset_pass($id, $email, $token)
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
            'token'=> $token,  
        ); 

        $this->DataModel->getWhere('id',$id);
        $this->DataModel->update('tb_user',$string);

        return $token;  
    }
}
