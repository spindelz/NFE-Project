<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CareerType_model extends MY_Model {

	public $table_name = 'CareerType';

	public $primary_key = 'CareerTypeID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll($criteria){
        $this->db->select('CareerTypeID, CareerTypeName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}