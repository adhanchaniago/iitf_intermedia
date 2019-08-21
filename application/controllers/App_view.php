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
        $payload['email'] = "trian@gmail.com";
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
        $payload['email'] = "trian@gail.com";
        $payload['page'] = "login";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_login',$payload);
        $this->load->view('component/ground');
    }
    public function register(){
        
    }

    public function timeline(){
        $payload['judul'] = "TIMELINE";
        $payload['email'] = "trian@gmail.com";
        $payload['page'] = "timeline";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_timeline',$payload);
        $this->load->view('component/ground');
    }

       
}
