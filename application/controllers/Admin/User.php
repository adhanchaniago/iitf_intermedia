<?php

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index(){
        if($this->IsLoggedIn()){
            $user = $this->DataModel->getJoin('tb_koor','tb_koor.id_user = tb_user.id','inner');
            $user = $this->DataModel->getData('tb_user')->result_array();
            $data = array(
                "user" => $user
            );
            $this->load->view('pages/admin/user',$data);
        }else{ 
            redirect('admin/home/login');
        }
    }

}
