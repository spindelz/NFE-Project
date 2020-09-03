<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_model extends MY_Model {

	public $table_name = 'student';

	public $is_translation = false;

	public $table_translation_name = null;
    
    public function getResult($db, $studentID, $SEMESTRY)
    {
        $db->select('grade.SEMESTRY,group.GRP_NAME,
                     group.GRP_ADVIS,grade.SUB_CODE,subject.SUB_CREDIT,subject.SUB_NAME,grade.GRADE'
                    );

        $db->from($this->table_name);

        $db->join('grade','student.STD_CODE = grade.STD_CODE','left');
        $db->join('subject','grade.SUB_CODE = `subject`.SUB_CODE','left');
        $db->join('group','student.GRP_CODE = `group`.GRP_CODE','left');

        $db->where('student.STD_CODE',$studentID);
        
        if(array_key_exists('Semestry', $SEMESTRY) && !empty($SEMESTRY['Semestry'])){
			$db->where('grade.SEMESTRY', $SEMESTRY['Semestry']);
        }

        $db->order_by('grade.SEMESTRY', 'DESC');

		$result = $db->get()->result_array();
        return $result; 
    }

    public function getSemestryResult($db, $studentID){
        $db->select('grade.SEMESTRY');

        $db->from($this->table_name);
        $db->join('grade','student.STD_CODE = grade.STD_CODE','left');

        $db->where('student.STD_CODE',$studentID);
        $db->where('grade.SEMESTRY IS NOT NULL');

        $db->group_by('grade.SEMESTRY');
        $db->order_by('grade.SEMESTRY', 'DESC');

		$result = $db->get()->result_array();
        return $result; 
    }

}