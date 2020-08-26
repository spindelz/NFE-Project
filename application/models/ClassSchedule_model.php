<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassSchedule_model extends MY_Model {

    public $table_name = 'student';

    public $is_translation = false;

    public $table_translation_name = null;

    public function getClassSchedule($studentID, $db)
    {

        $db->select('grade.SEMESTRY,grade.SUB_CODE,subject.SUB_NAME,group.GRP_NAME,
                     group.GRP_ADVIS,group.GRP_MEET');

        $db->from($this->table_name);

        $db->join('grade','student.STD_CODE = grade.STD_CODE','left');
        $db->join('subject','grade.SUB_CODE = `subject`.SUB_CODE','left');
        $db->join('group','student.GRP_CODE = `group`.GRP_CODE','left');

        $db->where('student.ID',$studentID);
        $db->order_by('grade.SEMESTRY','DESC');
        
        $result = $db->get()->result_array();
        return $result; 
        
    }

    public function getSemestry($studentID,$db){
        $db->select('grade.SEMESTRY');

        $db->from($this->table_name);
        $db->join('grade','student.STD_CODE = grade.STD_CODE','left');

        $db->where('student.ID',$studentID);
        $db->where('grade.SEMESTRY IS NOT NULL');

        $db->group_by('grade.SEMESTRY');
        $db->order_by('grade.SEMESTRY', 'DESC');

        $result = $db->get()->result_array();
        return $result; 
    }

}