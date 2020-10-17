<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenClass_model extends MY_Model {

	public $is_translation = false;

	public function getProvince($db){

		$db->select('NAME');

		$db->from('province');

		// if($prov != NULL){
		// 	$db->where('NAME', $prov);
		// }

		$db->order_by('NAME','ASC');

		$result = $db->get()->result_array();

		return $result;
	}

	public function getAmphur($db,$prov){

		$db->select('amphur.NAME');
		
		$db->from('amphur');

		if(!empty($prov)){
			$db->join('province','amphur.PROVID = province.ID','left');
			$db->where('province.NAME', $prov);
		}

		$db->order_by('NAME','ASC');

		$result = $db->get()->result_array();

		return $result;
	}

	public function getTambon($db,$amphur){

		$db->select('tambon.NAME');
		
		$db->from('tambon');

		if(!empty($amphur)){
			$db->join('amphur','tambon.AMPHURID = amphur.ID');
			$db->where('amphur.NAME', $amphur);
		}

		$db->order_by('NAME','ASC');

		$result = $db->get()->result_array();

		return $result;
	}

    
}