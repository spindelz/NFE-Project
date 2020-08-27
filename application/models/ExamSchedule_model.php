<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamSchedule_model extends MY_Model {

	public $table_name = 'student';

	public $is_translation = false;

	public $table_translation_name = null;
    
    public function getExamSchedule($studentID, $db)
    {
        $db->select('schedule.EXAM_DAY,schedule.EXAM_START,schedule.EXAM_END,
                     grade.SUB_CODE,subject.SUB_NAME,grade.ROOMNO,field.FLD_NAME'
                        );
        $db->from($this->table_name);

        $db->join('grade','student.STD_CODE = grade.STD_CODE','left');
        $db->join('subject','grade.SUB_CODE = `subject`.SUB_CODE','left');
        $db->join('schedule','grade.SUB_CODE = schedule.SUB_CODE AND grade.SEMESTRY = schedule.SEMESTRY','left');
        $db->join('field','grade.FLD_CODE = field.FLD_CODE','left');

        $db->where('student.STD_CODE',$studentID);
        $db->where('schedule.EXAM_DAY IS NOT NULL');

        $db->order_by('schedule.EXAM_DAY' , 'schedule.EXAM_START ' ,'asc' , 'asc');
        
		$result = $db->get()->result_array();
        return $result; 
        
    }

}