<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupTarget_model extends MY_Model {

	public $table_name = 'GroupTarget';

	public $primary_key = 'GroupTargetID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll(){
        $this->db->select('GroupTargetID, GroupTargetName');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}