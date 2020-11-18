<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends MY_Model {

	public $is_translation = false;

	public function getProvince(){

		$this->db->select('province.ID, province.NAME');

		$this->db->from('province');

		$this->db->order_by('province.NAME','ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}    
}