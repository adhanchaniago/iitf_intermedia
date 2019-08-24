<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class App_view extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    //HomePage
    public function index()
    {  
        $payload['judul'] = "HOME";
        $payload['email'] = ($this->session->userdata('email') == "" ? "LOGIN" : $this->session->userdata('email'));
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
        $payload['judul'] = "LOGIN";
        $payload['email'] = ($this->session->userdata('email') == "" ? "DAFTAR" : $this->session->userdata('email'));;
        $payload['page'] = "login";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_login',$payload);
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
            if (base64_encode($pass) == $result->password) {
                # sukses login
                
                $array = array(
                    'email' => $result->email
                );
                
                $this->session->set_userdata( $array );

                echo "<script>location.href = '" . base_url() . "';</script>";
                
            } else {
                # password salah
                echo "<font color=\"red\">Password yang Anda masukkan salah!</font>";
            }
        } else {
            # username salah
            echo "<font color=\"red\">Email '" . $user . "' belum terdaftar!</font>";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(),'refresh');
    }

    public function register(){
        $payload['judul'] = "REGISTER";
        $payload['email'] = ($this->session->userdata('email') == "" ? "LOGIN" : $this->session->userdata('email'));;
        $payload['page'] = "register";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_register',$payload);
        $this->load->view('component/ground');
    }

    public function timeline(){
        $payload['judul'] = "TIMELINE";
        $payload['email'] = ($this->session->userdata('email') == "" ? "LOGIN" : $this->session->userdata('email'));;
        $payload['page'] = "timeline";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_timeline',$payload);
        $this->load->view('component/ground');
    }

    public function step(){
        $payload['judul'] = "TIMELINE";
        $payload['email'] = ($this->session->userdata('email') == "" ? "LOGIN" : $this->session->userdata('email'));;
        $payload['page'] = "login";
        $this->load->view('component/header',$payload);
        $this->load->view('pages/user/user_step');
        $this->load->view('component/ground');
        $step = 0;
        if($step == 1){
            // step 1
        }else if($step == 2){
            //step 2
        }
    }

}
