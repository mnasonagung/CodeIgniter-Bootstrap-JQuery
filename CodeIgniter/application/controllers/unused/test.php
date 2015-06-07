<?php

class Test extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('regparti_model');
    }
    
    public function index()
    {
        $this->output->enable_profiler(true);
    }
   
    public function test_get()
    {
        $data = $this->regparti_model->get([
            'parti_id' =>2,
            'event_id' =>1
            ]);
        print_r($data[0]['reg_id']);
        
        $this->output->enable_profiler(true);
    }

    public function test_insert()
    {
        $result = $this->user_model->insert([
            'login' => 'Jethro'
        ]);
        print_r($result);
    }
    
    public function test_update()
    {
        $result = $this->user_model->update([
            'login' => 'Peggy'
        ],3);
        print_r($result);
    }
    
    public function test_delete($user_id)
    {
        $result = $this->user_model->delete($user_id);
        print_r($result);
    }
}