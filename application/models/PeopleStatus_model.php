<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeopleStatus_model extends MY_Model {

	public $table_name = 'PeopleStatus';

	public $primary_key = 'PeopleStatusID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll(){
        $this->db->select('PeopleStatusID, PeopleStatusName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}