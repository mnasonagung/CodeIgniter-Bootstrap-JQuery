<?php

class Event_model extends CRUD_model
{
//--------------------------------------------------------------------------
    protected $_table = 'event_info';
    protected $_primary_key = 'event_id';

//--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
    
    public function get_event_list()
    {
        $this->db->from('event_info');
        $this->db->order_by('event_id');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            $return[0]= '-Select Event-';
            foreach($result->result_array() as $row) {
                
                $return[$row['event_id']] = $row['event_name'] . " | " . $row['venue'];
            }
        }
        return $return;
    }

}
