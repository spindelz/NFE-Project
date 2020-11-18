<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LecturerType_model extends MY_Model {

	public $is_translation = false;

	public $table_name = 'LecturerType';

	public function getData(){

		$this->db->select('LecturerType.LecturerTypeID, LecturerType.LecturerTypeName');

		$this->db->from($this->table_name);

		$this->db->order_by('LecturerType.LecturerTypeID', 'ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}    
}