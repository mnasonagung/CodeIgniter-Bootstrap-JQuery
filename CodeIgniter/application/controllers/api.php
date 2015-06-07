<?php

class Api extends CI_Controller
{
    //--------------------------------------------------------------------------
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');        
//        $this->load->model('todo_model');        
//        $this->load->model('note_model');        
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
    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        
        $result = $this->user_model->get([
            'login'=>$login,
            'password'=> hash('sha256',$password . SALT)
        ]);
        
       
        $this->output->set_content_type('application_json');
        
        if ($result) {
            $this->session->set_userdata(['user_id' => $result[0]['user_id']]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        $this->output->set_output(json_encode(['result' => 0]));
    }

    //--------------------------------------------------------------------------
    public function register()
    {
        $this->output->set_content_type('application_json');
        
        $this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[16]|is_unique[user.email]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[16]|matches[confirm_password]');
        $this->form_validation->set_rules('user_type','User_Type','required');
        
        if ($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
//            $this->output->set_output(json_encode(['result' => 0, 'data' => validation_errors()]));
            return false;
        }
        $login = $this->input->post('login');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $user_type = $this->input->post('user_type');
        
        $user_id = $this->user_model->insert([
            'login'=>$login,
            'password'=> hash('sha256',$password . SALT),
            'email' => $email,           
            'user_type' => $user_type,           
        ]);
        
        if ($user_id) {
            $this->session->set_userdata(['user_id' => $user_id]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        
        $this->output->set_output(json_encode(['result' => 0, 'error' => 'User not created']));
    }
    
    //--------------------------------------------------------------------------
    public function get_todo($id = NULL)
    {
        $this->_require_login();
        
        if ($id != NULL) {
            $result = $this->todo_model->get([
                'todo_id' => $id,
                'user_id' => $this->session->userdata('user_id')
            ]);
        } else {
            $result = $this->todo_model->get([
                'user_id' => $this->session->userdata('user_id')
            ]);
        }
        
        $this->output->set_output(json_encode($result));
    }
    //--------------------------------------------------------------------------
    public function create_todo()
    {
        $this->_require_login();
        
        $this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');
        
        if ($this->form_validation->run()==false) {
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => $this->form_validation->error_array()
            ]));
            return false;
        }
        
        $result = $this->todo_model->insert([
            'content' => $this->input->post('content'),
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
    public function update_todo()
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
    public function delete_todo()
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

    //--------------------------------------------------------------------------
    public function create_note()
    {
        $this->_require_login();
        
        $this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
        $this->form_validation->set_rules('content', 'Content', 'required|max_length[255]');
        
        if ($this->form_validation->run()==false) {
            $this->output->set_output(json_encode([
                'result' => 0,
                'error' => $this->form_validation->error_array()
            ]));
            return false;
        }
        
        $result = $this->note_model->insert([
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
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
    public function get_note($id = NULL)
    {
        $this->_require_login();
        
        if ($id != NULL) {
            $result = $this->note_model->get([
                'note_id' => $id,
                'user_id' => $this->session->userdata('user_id')
            ]);
        } else {
            $result = $this->note_model->get([
                'user_id' => $this->session->userdata('user_id')
            ]);
        }
        
        $this->output->set_output(json_encode($result));
    }

    //--------------------------------------------------------------------------
    public function update_note()
    {
        $this->_require_login();
        $note_id = $this->input->post('note_id');
        
        $result = $this->note_model->update([
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ], $note_id);
        
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }
        
        $this->output->set_output(json_encode(['result' => 0]));
        return false;

    }

    //--------------------------------------------------------------------------
    public function delete_note()
    {
        $this->_require_login();
        $note_id = $this->input->post('note_id');
    }
    
}