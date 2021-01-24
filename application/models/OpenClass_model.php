<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpenClass_model extends MY_Model {

	public $table_name = 'Class';

	public $primary_key = 'ClassID';

	public $is_translation = false;

	public $table_translation_name = null;

	public function getDetailByClassID($criteria){
		$this->db->select('Class.*');
		$this->db->from($this->table_name);
		$this->db->where($criteria);

		return $this->db->get()->row_array();
	}

	// public function getProvince(){

	// 	$this->db->select('province.ID, province.NAME');

	// 	$this->db->from('province');

	// 	$this->db->order_by('province.NAME','ASC');

	// 	$result = $this->db->get()->result_array();

	// 	return $result;
	// }

	// public function getAmphur($prov){

	// 	$this->db->select('amphur.ID, amphur.NAME');
		
	// 	$this->db->from('amphur');

	// 	if(!empty($prov)){
	// 		$this->db->where('amphur.PROVID', $prov);
	// 	}

	// 	$this->db->order_by('amphur.NAME','ASC');

	// 	$result = $this->db->get()->result_array();

	// 	return $result;
	// }

	// public function getTambon($amphur){

	// 	$this->db->select('tambon.NAME,tambon.POSTCODE');
		
	// 	$this->db->from('tambon');

	// 	if(!empty($amphur)){
	// 		$this->db->where('tambon.AMPHURID', $amphur);
	// 	}

	// 	$this->db->order_by('tambon.NAME','ASC');

	// 	$result = $this->db->get()->result_array();

	// 	return $result;
	// }

    public function countClass($NFETambonID){
		$this->db->select('Class.ClassID, Organization.OrganizationCode');
		$this->db->from($this->table_name);
		$this->db->join('Organization', 'Organization.OrganizationID = Class.NFETambonID', 'left');
		$this->db->where('Class.NFETambonID', $NFETambonID);

		return $this->db->get()->result_array();
	}

	public function get_datatable($criteria){
		$this->db->select('Class.ClassID, Class.CourseName, DATE_FORMAT(Class.UpdatedDate, "%d/%m/%Y %h:%i:%s") as UpdatedDate');
		$this->db->select('Concat(\'กศน. \', Organization.OrganizationNameTH) as NFETambonName');
		$this->db->select('Concat(prefix.PrefixName, \' \', Lecturer.FirstName, \' \', Lecturer.LastName) as LecturerName');
		$this->db->select('users.Username as UserUpdate');

		$this->db->from($this->table_name);

		$this->db->join('Organization', 'Organization.OrganizationID = Class.NFETambonID', 'left');
		$this->db->join('Lecturer', 'Lecturer.LecturerID = Class.LecturerID', 'left');
		$this->db->join('prefix', 'prefix.PrefixID = Lecturer.PrefixID', 'left');
		$this->db->join('users', 'users.UserID = Class.UpdatedBy', 'left');

		if(array_key_exists('NFETambonID', $criteria) && !empty($criteria['NFETambonID'])){
			$this->db->where('Class.NFETambonID', $criteria['NFETambonID']);
		}

		if(array_key_exists('CourseName', $criteria) && !empty($criteria['CourseName'])){
			$this->db->like('Class.CourseName', $criteria['CourseName']);
		}

		if(array_key_exists('LecturerName', $criteria) && !empty($criteria['LecturerName'])){
			$this->db->like('Concat(prefix.PrefixName, \' \', Lecturer.FirstName, \' \', Lecturer.LastName)', $criteria['LecturerName']);
		}
		
		$this->db->where('Class.isActive', 1);

		return $this->db->get()->result_array();
	}

	public function getResultAmountByClassID($ClassID){
		$this->db->select('GradeResult.GradeResultID');

		$this->db->from('GradeResult');

		$this->db->where('GradeResult.ClassID', $ClassID);

		return $this->db->get()->result_array();
	}
	
}