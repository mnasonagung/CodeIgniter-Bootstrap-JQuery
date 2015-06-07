<?php
class Regevent extends CI_Controller {
    private $custom_errors = array();
    function __construct()
    {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->database();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->model('regevent_model');
            $this->load->model('parti_model');
            $this->load->model('event_model');
            $this->load->model('evmain_model');
            $this->load->model('evlink_model');
    }	
    function index()
    {			
            $data['event_list'] = $this->event_model->get_event_list();
            //$data['link_list'] = $this->evlink_model->get_link_list();
            
            $data['participant'] = $this->parti_model->get([
                                        'user_id' => $this->session->userdata('user_id')
                                    ]);

            $this->form_validation->set_rules('parti_id', 'Participant Id', 'required|max_length[255]');			
            $this->form_validation->set_rules('event_id', 'event_id', 'required|max_length[255]');			
            $this->form_validation->set_rules('main_flag', 'main_flag', 'max_length[1]');			
            $this->form_validation->set_rules('link_flag', 'link_flag', 'max_length[1]');			
            $this->form_validation->set_rules('parti_type', 'Parti Type', 'max_length[255]');			
            $this->form_validation->set_rules('link_id', 'Link Id', 'max_length[255]');			
            $this->form_validation->set_rules('main_amount', 'main_amount', 'max_length[10]');			
            $this->form_validation->set_rules('link_amount', 'link_amount', 'max_length[10]');

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                    $this->load->view('userdash/inc/header_view');
                    $this->load->view('userdash/regevent_view', $data);
                    $this->load->view('userdash/inc/footer_view');
            }
            else // passed validation proceed to post success logic
            {
                    // build array for the model

                    $form_data = array(
                                            'parti_id' => @$this->input->post('parti_id'),
                                            'event_id' => @$this->input->post('event_id'),
                                            'main_flag' => @$this->input->post('main_flag'),
                                            'link_flag' => @$this->input->post('link_flag'),
                                            'parti_type' => @$this->input->post('parti_type_id'),
                                            'link_id' => @$this->input->post('link_id'),
                                            'main_amount' => @$this->input->post('main_amount'),
                                            'link_amount' => @$this->input->post('link_amount')
                                            );

                    // run insert model to write data to db

                    if ($this->regevent_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
                    {
                            redirect('regevent/success');   // or whatever logic needs to occur
                    }
                    else
                    {
                    echo 'An error occurred saving your information. Please try again later';
                    // Or whatever error handling is necessary
                    }
            }
    }
    
    public  function select_link()
    {    
        $data['link_list'] = $this->evlink_model->get_link_list();
        $this->load->view('userdash/select_link_view',$data);
    }

    public  function get_main_amt()
    {    
        $data['main_amount'] = $this->evmain_model->get_main_amount();
        $this->load->view('userdash/main_amt_view',$data);
    }

    public  function get_link_amt()
    {    
        $data['link_amount'] = $this->evlink_model->get_link_amount();
        $this->load->view('userdash/link_amt_view',$data);
    }
    
    public  function check_file($field,$field_value)
    {
            if(isset($this->custom_errors[$field_value]))
            {
                    $this->form_validation->set_message('check_file', $this->custom_errors[$field_value]);
                    unset($this->custom_errors[$field_value]);
                    return FALSE;
            }
            return TRUE;
    }
    function upload_file($config,$fieldname)
    {
            $this->load->library('upload');
            $this->upload->initialize($config);
            $this->upload->do_upload($fieldname);
            $error = $this->upload->display_errors();
            if(empty($error))
            {
                    $data = $this->upload->data();
                    $this->$fieldname = $data['file_name'];
            }
            else
            {
                    $this->custom_errors[$fieldname] = $error;
            }
    }

    function success()
    {
            $this->load->view('userdash/inc/header_view');
            $this->load->view('userdash/inc/footer_view');
//            $this->load->view("header");
//            $this->load->view("success");
//            $this->load->view("footer");
    }
}
?>