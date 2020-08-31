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

    public function getExamScheduleByGroup($GRP_CODE, $Semestry, $db){
        $db->select('group.GRP_CODE, group.GRP_NAME');
        $db->select('schedule.EXAM_DAY, schedule.EXAM_START, schedule.EXAM_END');
        $db->select('subject.SUB_CODE, subject.SUB_NAME');
        $db->select('field.FLD_CODE, field.FLD_NAME, room.ROOMNO, room.ROOMNAME');

        $db->from('group');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');
        $db->join('subject', 'subject.SUB_CODE = grade.SUB_CODE', 'left');
        $db->join('schedule', 'schedule.SEMESTRY = grade.SEMESTRY AND schedule.SUB_CODE = grade.SUB_CODE', 'left');
        $db->join('field', 'field.FLD_CODE = grade.FLD_CODE', 'left');
        $db->join('room', 'room.FLD_CODE = grade.FLD_CODE AND room.ROOMNO = grade.ROOMNO', 'left');

        $db->where('group.GRP_CODE', $GRP_CODE);
        $db->where('grade.SEMESTRY', $Semestry);

        $db->group_by('group.GRP_CODE, subject.SUB_CODE');
        $db->order_by('schedule.EXAM_DAY, schedule.EXAM_START', 'ASC');

        $result = $db->get()->result_array();
        return $result; 
    }
}