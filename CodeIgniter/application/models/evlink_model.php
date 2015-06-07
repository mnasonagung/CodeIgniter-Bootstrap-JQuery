<?php

class Evlink_model extends CRUD_model
{
//--------------------------------------------------------------------------
    protected $_table = 'event_link';
    protected $_primary_key = 'event_id';

//--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
    
    public function get_link_list()
    {
        $event_id = $this->input->post('event_id');
        $this->db->from('event_link');
        $this->db->where('event_id',$event_id);
        $this->db->order_by('link_id');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['link_id']] = $row['link_desc'];
            }
        }
        return $return;
    }

    public function get_link_amount()
    {
        $event_id = $this->input->post('event_id');
        $link_id = $this->input->post('link_id');
        
        $this->db->from('event_link');
        $this->db->where('event_id',$event_id);
        $this->db->where('link_id',$link_id);
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[1] = $row['link_pre_rate'];
            }
        }
        return $return;
    }
    
}
