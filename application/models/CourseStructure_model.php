<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseStructure_model extends MY_Model {

	public $table_name = 'CourseStructure';

	public $primary_key = 'CourseStructureID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByClassID($ClassID){
        $this->db->select('CourseStructureID, ClassID, Topic, Objective, Content, LearningProcess, TheoryTime, PracticeTime');
        $this->db->from($this->table_name);

        $this->db->where('isActive', 1);
        $this->db->where('ClassID', $ClassID);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}