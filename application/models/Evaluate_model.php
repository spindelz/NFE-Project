<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate_model extends MY_Model {

	public $table_name = 'Evaluate';

	public $primary_key = 'EvaluateID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByClassID($ClassID){
        $this->db->select('EvaluateID, ClassID, EvaluateDetail');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);
        $this->db->where('ClassID', $ClassID);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}