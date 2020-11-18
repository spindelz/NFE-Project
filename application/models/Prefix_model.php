<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prefix_model extends MY_Model {

	public $is_translation = false;

	public $table_name = 'prefix';

	public function getData(){

		$this->db->select('prefix.PrefixID, prefix.PrefixName');

		$this->db->from($this->table_name);

		$this->db->order_by('prefix.PrefixName', 'ASC');

		$result = $this->db->get()->result_array();

		return $result;
	}    
}