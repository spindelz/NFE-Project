<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

	public $table_name = 'student';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getActivity($studentID, $db) {

		$db->select('activity.ACTIVITY,activity.SEMESTRY,activity.HOUR');
        $db->from($this->table_name);
        $db->join('activity','student.STD_CODE = activity.STD_CODE','left');
        $db->where('student.ID',$studentID);
        $db->order_by('SEMESTRY','asc');
        $result = $db->get()->result_array();
        return $result;    
	}

}