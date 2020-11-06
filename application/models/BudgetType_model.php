<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BudgetType_model extends MY_Model {

	public $table_name = 'BudgetType';

	public $primary_key = 'BudgetTypeID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll($criteria){
        $this->db->select('BudgetTypeID, BudgetTypeName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}