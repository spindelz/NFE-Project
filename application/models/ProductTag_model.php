<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductTag_model extends MY_Model {

	public $table_name = 'tag';

	public $primary_key = 'TagID';

	public $is_translation = false;

	public $table_translation_name = null;

	private function _get_datatables_query($criteria = array()) {
		$this->_setFrom();

		if (array_key_exists('keyword', $criteria) && !empty($criteria['keyword'])) {
			$this->db->like('tag.[Column1]', $criteria['keyword']);
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

	public function get_datatable(){
		$this->_setColumnSelect();
		$this->db->select('users.FirstName as UpdatedBy');
		$this->_setFrom();
		$this->db->where($this->table_name.'.isActive', 1);
		$this->db->join('users', 'users.UserID = tag.UpdatedBy', 'left');

		$results = $this->db->get()->result_array();
		return $results;
	}

	public function getByFilter($criteria){
		$this->_setColumnSelect();
		$this->_setFrom();

		if(array_key_exists('ProductTagName', $criteria) && !empty($criteria['ProductTagName'])){
			$this->db->like('tag.TagName', $criteria['ProductTagName']);
		}
		
		$result = $this->db->get()->result_array();

		// if ($convert_display) {
			// $this->display_data_format($result);
		// }

		return $result;
	}

}