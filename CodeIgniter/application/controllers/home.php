<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        $this->load->view('home/inc/footer_view');
    }
    
    public function register()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/register_view');
        $this->load->view('home/inc/footer_view');
    }
    
//    public function code()
//    {
//        echo hash('sha256','admin'. SALT);
//    }
    public function test()
    {
//        $q = $this->db->get('user');
//        print_r($q->result());

        $result = $this->user_model->get([
            'login'=>'sony',
            'password'=> hash('sha256','admin' . SALT)
        ]);   
        
        print_r($result);
    }
}