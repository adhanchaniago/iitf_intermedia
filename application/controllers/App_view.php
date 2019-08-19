<?php
defined('BASEPATH') OR exit ('No direct script access allowed');


class App_view extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    //HomePage
    public function index()
    {  
      
        $payload['judul'] = "HOME";
        $payload['email'] = "trian@gmail.com";
        $payload['page'] = "home";
        $this->load->view('component/header',$payload);
        $this->load->view('src/iitf_index',$payload);     
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
