<?php

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('bcrypt');
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $pendaftar = $this->DataModel->getData('tb_pendaftaran')->num_rows();
            $lomba = $this->DataModel->getData('tb_lomba')->num_rows();
            $user = $this->DataModel->getData('tb_user')->num_rows();
            $data = array(
                "pendaftar" => $pendaftar,
                "lomba" => $lomba,
                "user" => $user
            );
            $this->load->view('pages/admin/dashboard', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function profile()
    {
        if ($this->IsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[6]');
                $this->form_validation->set_rules('old_pass', 'Old Password', 'required|min_length[6]');
                $old_p = $this->input->post('old_pass');
                $new_p = $this->input->post('new_pass');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('pages/admin/profile');
                } else {
                    $cek = $this->DataModel->getWhere('id', $this->session->userdata['loginData']['id']);
                    $cek = $this->DataModel->getData('tb_admin')->row();
                    if ($this->bcrypt->check_password($old_p, $cek->password)) {
                        $data = array(
                            "password" => $this->bcrypt->hash_password($new_p)
                        );
                        $this->DataModel->getWhere('id',$cek->id);
                        $this->DataModel->update('tb_admin',$data);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                    <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                    <span class="alert-inner--text"> Ubah Password berhasil </span>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    </div>');
                        $this->load->view('pages/admin/profile');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable fade show" role="alert">
                                                    <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                    <span class="alert-inner--text"> Password Lama Tidak Sama</span>
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    </div>');
                        $this->load->view('pages/admin/profile');
                    }
                }
            } else {
                $this->load->view('pages/admin/profile');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function login()
    {
        if ($this->IsLoggedIn()) {
            redirect('admin/home');
        } else {
            if ($this->input->post('kirim')) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

                $email = $this->input->post('email');
                $pass = $this->input->post('password');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('pages/admin/login');
                } else {
                    $data = array(
                        "email" => $email,
                    );
                    $log = $this->DataModel->Login('tb_admin', $data)->row();
                    if ($log != null) {
                        // if ($this->bcrypt->check_password($pass, $log->password)) {
                        if ($this->bcrypt->check_password($pass, $log->password)) {
                            $account = array(
                                "id" => $log->id,
                                "email" => $log->email,
                                "stat" => true,
                                "role" => 'admin',
                            );
                            $this->session->set_userdata('loginData', $account);
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                        <span class="alert-inner--text"> Selamat Datang ' . $log->email . ' </span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        </div>');
                            redirect('admin/home/index');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable fade show" role="alert">
                                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                                            <span class="alert-inner--text"> Password yang anda masukkan salah</span>
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            </div>');
                            $this->load->view('pages/admin/login');
                        }
                    }
                }
            } else {
                $this->load->view('pages/admin/login');
            }
        }
    }

    public function logout()
    {
        $sess_array = array(
            'email' => '',
        );
        $this->session->unset_userdata('loginData', $sess_array);
        redirect('/admin/home/index', 'refresh');
        exit();
    }
}
