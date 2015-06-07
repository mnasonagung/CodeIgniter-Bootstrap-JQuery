<?php

class Evmain_model extends CRUD_model
{
//--------------------------------------------------------------------------
    protected $_table = 'event_main';
    protected $_primary_key = 'event_id';

//--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
    
    public function get_main_amount()
    {
        $event_id = $this->input->post('event_id');
        $parti_type_id = $this->input->post('parti_type_id');
        
        $this->db->from('event_main');
        $this->db->where('event_id',$event_id);
        $this->db->where('parti_type',$parti_type_id);
        $this->db->order_by('parti_type');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[1] = $row['main_pre_rate'];
            }
        }
        return $return;
    }

}
