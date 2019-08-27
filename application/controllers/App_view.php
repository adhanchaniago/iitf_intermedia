<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class App_view extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('bcrypt');
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
        $payload['judul'] = "HOME";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : "LANJUTKAN DAFTAR: " . $this->session->userdata('email'));
        $payload['page'] = "home";
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
       // die(json_encode($pass.$pass2));
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
           if ($pass !== $pass2) {
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

    public function step(){
        $check = $this->db->get_where('tb_user', array(
            'id' => $this->session->userdata('id'),
            'email' => $this->session->userdata('email')
        ));

        $koor = null;
        $userdata = $check->row();
        // if ($check->num_rows() == 0) {
        //     redirect('login');
        // } else {
        //     $koorq = $this->db->get_where('tb_koor', array(
        //         'id_user' => $this->session->userdata('id')
        //     ));
        //     $koor = $koorq->row();
        // }

        $payload['judul'] = "TIMELINE";
        $payload['link'] = ($this->session->userdata('email') == "" ? base_url('login') : base_url('user'));
        $payload['email'] = ($this->session->userdata('email') == "" ? "" : $this->session->userdata('email'));
        $payload['page'] = "steps";
        $payload['nama'] = 'trian';//$koor->nama;
        $payload['nohp'] = '5467';//$koor->no_hp;
        $payload['inst'] = 'amikom';//$koor->institusi;
        
        $payload['step'] = 3;//$userdata->step_selesai;

        if($payload['step'] == 1){
            // step koor
            $this->load->view('component/header',$payload);
            $this->load->view('pages/user/user_step_koor');
            $this->load->view('component/ground');
        }else if($payload['step'] == 2){
            //step 2
            $this->load->view('component/header',$payload);
            $this->load->view('pages/user/user_step_pilih_lomba');
            $this->load->view('component/ground');
        }else if($payload['step'] == 3){
            //biodata team
            $this->load->view('component/header',$payload);
            $this->load->view('pages/user/user_step_team');
            $this->load->view('component/ground');
        }else if($payload['step'] == 4){
            //pembayaran
            $this->load->view('component/header',$payload);
            $this->load->view('pages/user/user_step_pembayaran');
            $this->load->view('component/ground');
        }else if($payload['step'] == 5){
            //submisi file
            $this->load->view('component/header',$payload);
            $this->load->view('pages/user/user_step_submission');
            $this->load->view('component/ground');
        }else{
            //undefined
        }
    }

}
