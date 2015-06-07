<?php

class Parti_model extends CRUD_model
{
//--------------------------------------------------------------------------
    protected $_table = 'participant';
    protected $_primary_key = 'parti_id';

//--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
}
