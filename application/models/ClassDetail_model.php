<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassDetail_model extends MY_Model {

	public $table_name = 'ClassDetail';

	public $primary_key = 'ClassDetailID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByClassID($ClassID){
        $this->db->select('ClassDetailID, ClassID, LearningDetail, LearningDate, LearningTime, Remark');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);
        $this->db->where('ClassID', $ClassID);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}