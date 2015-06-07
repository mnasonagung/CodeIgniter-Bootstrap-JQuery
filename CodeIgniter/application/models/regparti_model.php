<?php

class Regparti_model extends CRUD_model
{
//--------------------------------------------------------------------------
    protected $_table = 'reg_parti';
    protected $_primary_key = 'reg_id';

//--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
    }
}
