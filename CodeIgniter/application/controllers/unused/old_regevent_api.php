<?php

class Regevent_api extends CI_Controller
{
    //--------------------------------------------------------------------------
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('regparti_model');        
        $this->load->model('regevent_model');        
    }

    //--------------------------------------------------------------------------
    private function _require_login() 
    {
        if ($this->session->userdata('user_id') == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => 'You are not authorized']));
        }
        return false;
    }

    //--------------------------------------------------------------------------
    public function get_parti($id = NULL)
    {
        $this->_require_login();
        
        if ($id != NULL) {
            $result = $this->parti_model->get([
                'parti_id' => $id,
                'user_id' => $this->session->userdata('user_id')
            ]);
        } else {
            $result = $this->parti_model->get([
                'user_id' => $this->session->userdata('user_id')
            ]);
        }
        
        $this->output->set_output(json_encode($result));
    }

    //--------------------------------------------------------------------------
    public function get_event($id = NULL)
    {
        $this->_require_login();
        
        if ($id != NULL) {
            $result = $this->event_model->get([
                'event_id' => $id,
                'user_id' => $this->session->userdata('user_id')
            ]);
        } else {
            $result = $this->event_model->get();
        }
        
        $this->output->set_output(json_encode($result));
    }
   
    //--------------------------------------------------------------------------
    public function create_regparti()
    {
        $this->_require_login();

        $result = $this->regparti_model->insert([
            'parti_id' => $this->input->post('parti_id'),
            'event_id' => $this->input->post('event_id'),
            'ins_user' => $this->session->userdata('user_id')
        ]);
        
        if ($result) {
            //Get fresh entry for DOM
            $this->output->set_output(json_encode([
                'result' => 1,
                'data' => $result
            ]));
            
            $result_ev = $this->regevent_model->insert([
                'reg_id' => $result,
                'line_id' => $this->input->post('line_id'),
                'event_type' => $this->input->post('event_type'),
                'event_type_id' => $this->input->post('event_type_id'),
                'reg_date' => $this->load->helper('date'),
                'sponsor_id' => $this->input->post('sponsor_id'),
                'ins_user' => $this->session->userdata('user_id')
            ]);
            
            return false;
        }
        
        $this->output->set_output(json_encode([
            'result' => 0,
            'error' => 'Could not insert record'
        ]));
    }

}