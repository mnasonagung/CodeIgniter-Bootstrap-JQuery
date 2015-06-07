<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regevent extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $user_id= $this->session->userdata('user_id');
        if (!$user_id) {
            $this->logout();
        }
    }
    
    public function index()
    {
        $this->load->view('userdash/inc/header_view');
        $this->load->view('userdash/regevent_view');
        $this->load->view('userdash/inc/footer_view');
    }
    
    public function logout()
    {
        session_destroy();
        redirect('/');
    }
    
//	public function index()
//	{
//		$this->load->view('registerevent');
//	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
