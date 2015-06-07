<?php

class Parti_api extends CI_Controller
{
    //--------------------------------------------------------------------------
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('parti_model');        
        $this->load->model('event_model');        
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
    public function create_parti()
    {
        $this->_require_login();
        
        $this->form_validation->set_rules('parti_name', 'Content', 'required|max_length[255]');
        $this->form_validation->set_rules('title', 'title', 'required|max_length[50]');
        $this->form_validation->set_rules('parti_type', 'parti_type', 'required|max_length[5]');
        $this->form_validation->set_rules('email', 'email', 'required|max_length[50]');
        $this->form_validation->set_rules('phone', 'phone', 'required|max_length[50]');
        //$this->form_validation->set_rules('institution', 'institution', 'required|max_length[50]');
        
        if ($this->form_validation->run()==false) {
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => $this->form_validation->error_array()
            ]));
            return false;
        }
        
        $result = $this->parti_model->insert([
            'parti_name' => $this->input->post('parti_name'),
            'title' => $this->input->post('title'),
            'parti_type' => $this->input->post('parti_type'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'user_id' => $this->session->userdata('user_id')
        ]);
        
        if ($result) {
            //Get fresh entry for DOM
            $this->output->set_output(json_encode([
                'result' => 1,
                'data' => $result
            ]));
            return false;
        }
        
        $this->output->set_output(json_encode([
            'result' => 0,
            'error' => 'Could not insert record'
        ]));
    }
    
    //--------------------------------------------------------------------------
    public function update_parti()
    {
        $this->_require_login();
        $todo_id = $this->input->post('todo_id');
        $completed = $this->input->post('completed');
        
        $result = $this->todo_model->update([
            'completed' => $completed
        ], $todo_id);
        
        $result = $this->db->affected_rows();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        
        $this->output->set_output(json_encode(['result' => 0]));
        return false;
    }
    
    //--------------------------------------------------------------------------
    public function delete_parti()
    {
        $this->_require_login();

        $result = $this->todo_model->delete([
            'todo_id' => $this->input->post('todo_id'),
            'user_id' => $this->session->userdata('user_id')
        ]);
        
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        
        $this->output->set_output(json_encode([
            'result' => 0,
            'message' => 'Could not delete'
        ]));
    }

}