<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer_model extends MY_Model {

	public $table_name = 'Lecturer';

	public $primary_key = 'LecturerID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll($criteria){
        $this->db->select('Lecturer.LecturerID, CONCAT(prefix.PrefixName, \' \', Lecturer.FirstName, \' \', Lecturer.LastName) as LecturerName');
        $this->db->from($this->table_name);
        $this->db->join('prefix', 'prefix.PrefixID = Lecturer.PrefixID AND prefix.isActive = 1', 'left');

        $this->db->where('Lecturer.isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}