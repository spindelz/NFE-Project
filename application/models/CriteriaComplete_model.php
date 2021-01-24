<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CriteriaComplete_model extends MY_Model {

	public $table_name = 'CriteriaComplete';

	public $primary_key = 'CriteriaCompleteID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByClassID($ClassID){
        $this->db->select('CriteriaCompleteID, ClassID, CriteriaCompleteName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);
        $this->db->where('ClassID', $ClassID);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}