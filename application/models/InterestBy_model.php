<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InterestBy_model extends MY_Model {

	public $table_name = 'InterestedBy';

	public $primary_key = 'InterestByID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll(){
        $this->db->select('InterestedByID, InterestedByName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}