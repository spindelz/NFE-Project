<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {

	public $table_name = 'users';

	public $primary_key = 'UserID';

	public $is_translation = false;

	public $table_translation_name = null;

	private function _get_datatables_query($criteria = array()) {
		$this->_setFrom();

		if (array_key_exists('keyword', $criteria) && !empty($criteria['keyword'])) {
			$this->db->like('users.[Column1]', $criteria['keyword']);
		}
	}

	public function get_datatables($criteria){
		$this->_get_datatables_query($criteria);

		$this->db->select('*');

		$this->db->order_by($this->primary_key, 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function count_filtered($criteria){
		$this->_get_datatables_query($criteria);
		$results = $this->db->count_all_results();
		return $results;
	}

	public function count_all(){
		$this->_get_datatables_query();
		return $this->db->count_all_results();
	}

	public function checkUsername($username){
		$this->db->select('users.UserID, users.Username, users.Password, users.UserTypeID, user_type.UserTypeName, prefix.PrefixName, users.FirstName, users.LastName');
		$this->_setFrom();
		$this->db->join('user_type', 'user_type.UserTypeID = users.UserTypeID', 'left');
		$this->db->join('prefix', 'prefix.PrefixID = users.PrefixID', 'left');
		$this->db->where('Username', $username);
		$result = $this->db->get()->row_array();
		if(!empty($result)){
			return $result;
		}

		$db1 = $this->load->database('nfe1', TRUE);
		$db1->select('student.ID as UserID, student.CARDID as Username, student.CARDID AS Password, student.STD_CODE as StudentCode, student.CARDID as PersonalID, \'5\' as UserTypeID, \'ประถมศึกษา\' as UserTypeName, student.PRENAME as PrefixName, student.NAME as FirstName, student.SURNAME as LastName');
		$db1->from('student');
		$db1->where('CARDID', $username);
		$result = $db1->get()->row_array();
		if(!empty($result)){
			return $result;
		}

		$db2 = $this->load->database('nfe2', TRUE);
		$db2->select('student.ID as UserID, student.CARDID as Username, student.CARDID AS Password, student.STD_CODE as StudentCode, student.CARDID as PersonalID, \'6\' as UserTypeID, \'มัธยมศึกษาตอนต้น\' as UserTypeName, student.PRENAME as PrefixName, student.NAME as FirstName, student.SURNAME as LastName');
		$db2->from('student');
		$db2->where('CARDID', $username);
		$result = $db2->get()->row_array();
		if(!empty($result)){
			return $result;
		}

		$db3 = $this->load->database('nfe3', TRUE);
		$db3->select('student.ID as UserID, student.CARDID as Username, student.CARDID AS Password, student.STD_CODE as StudentCode, student.CARDID as PersonalID, \'7\' as UserTypeID, \'มัธยมศึกษาตอนปลาย\' as UserTypeName, student.PRENAME as PrefixName, student.NAME as FirstName, student.SURNAME as LastName');
		$db3->from('student');
		$db3->where('CARDID', $username);
		$result = $db3->get()->row_array();
		if(!empty($result)){
			return $result;
		}

		return array();
	}

	public function getByID($UserID){
		$this->_setColumnSelect();
		$this->db->select('user_type.UserTypeNameTH as UserTypeName');
		$this->db->select('prefix.PrefixName');
		$this->_setFrom();
		$this->db->join('user_type', 'user_type.UserTypeID = users.UserTypeID', 'left');
		$this->db->join('prefix', 'prefix.PrefixID = users.PrefixID', 'left');
		
		if(!empty($input['username']) && !empty($input['password'])){
			$this->db->where('Username', $input['username']);
			$this->db->where('Password', $input['password']);
		}
		
		$query = $this->db->get()->row_array();
		unset($query['Password']);
		return $query;
	}

}