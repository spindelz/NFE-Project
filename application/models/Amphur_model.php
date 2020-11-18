<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amphur_model extends MY_Model {

	public $is_translation = false;

	public function getAmphur($prov){

		$this->db->select('amphur.ID, amphur.NAME');
		
		$this->db->from('amphur');

		if(!empty($prov)){
			$this->db->where('amphur.PROVID', $prov);
		}

		$this->db->order_by('amphur.NAME','ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}
}