<?php

class Regevent2 extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('regevent2_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('parti_id', 'Participant Id', 'required');			
		$this->form_validation->set_rules('event_id', 'Event Id', 'required');			
		$this->form_validation->set_rules('event_type', 'Event Type', 'max_length[1]');			
		$this->form_validation->set_rules('parti_type', 'Parti Type', '');			
		$this->form_validation->set_rules('link_id', 'Link Id', '');			
		$this->form_validation->set_rules('main_amount', 'Main Amount', '');			
		$this->form_validation->set_rules('link_amount', 'Link Amount', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
                    $this->load->view('userdash/inc/header_view');
			$this->load->view('regevent2_view');
                    $this->load->view('userdash/inc/footer_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'parti_id' => set_value('parti_id'),
					       	'event_id' => set_value('event_id'),
					       	'event_type' => set_value('event_type'),
					       	'parti_type' => set_value('parti_type'),
					       	'link_id' => set_value('link_id'),
					       	'main_amount' => set_value('main_amount'),
					       	'link_amount' => set_value('link_amount')
						);
					
			// run insert model to write data to db
		
			if ($this->regevent2_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('regevent2/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>