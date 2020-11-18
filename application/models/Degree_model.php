<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Degree_model extends MY_Model {

	public $is_translation = false;

	public $table_name = 'Degree';

	public function getData($DegreeType){

		$this->db->select('Degree.DegreeID, Degree.DegreeName');

		$this->db->from($this->table_name);

		$this->db->where('Degree.DegreeType', $DegreeType);

		$this->db->order_by('Degree.DegreeID', 'ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}    
}