<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenClass_model extends MY_Model {

	public $is_translation = false;

	public function getProvince(){

		$this->db->select('province.ID, province.NAME');

		$this->db->from('province');

		$this->db->order_by('province.NAME','ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}

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

	public function getTambon($amphur){

		$db->select('tambon.NAME,tambon.POSTCODE');
		
		$this->db->from('tambon');

		if(!empty($amphur)){
			$this->db->where('tambon.AMPHURID', $amphur);
		}

		$this->db->order_by('tambon.NAME','ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}

    
}