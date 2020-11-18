<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambon_model extends MY_Model {

	public $is_translation = false;

	public function getTambon($amphur){

		$this->db->select('tambon.ID, tambon.NAME,tambon.POSTCODE');
		
		$this->db->from('tambon');

		if(!empty($amphur)){
			$this->db->where('tambon.AMPHURID', $amphur);
		}

		$this->db->order_by('tambon.NAME','ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}
}