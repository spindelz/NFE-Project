<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByTeach($criteria, $db){
        $db->select('group.GRP_CODE, group.GRP_NAME');
        $db->select('grade.SEMESTRY');
        $db->select('student.STD_CODE, student.CARDID, CONCAT(student.PRENAME, \' \', student.NAME, \' \', student.SURNAME) as StudentName');

        $db->from('group');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');
        $db->join($this->table_name, $this->table_name . '.STD_CODE = grade.STD_CODE', 'left');

        $db->where('grade.SEMESTRY IS NOT NULL');

        if(array_key_exists('TeachFirstName', $criteria) && !empty($criteria['TeachFirstName'])){
			$db->like('group.GRP_ADVIS', $criteria['TeachFirstName']);
        }
        
        if(array_key_exists('TeachLastName', $criteria) && !empty($criteria['TeachLastName'])){
			$db->like('group.GRP_ADVIS', $criteria['TeachLastName']);
        }
        
        if(array_key_exists('GroupName', $criteria) && !empty($criteria['GroupName'])){
			$db->like('group.GRP_NAME', $criteria['GroupName']);
        }

        if(array_key_exists('Semestry', $criteria) && !empty($criteria['Semestry'])){
			$db->where('grade.SEMESTRY', $criteria['Semestry']);
        }

        if(array_key_exists('StudentName', $criteria) && !empty($criteria['StudentName'])){
            $db->group_start();
            $db->like('student.NAME', $criteria['StudentName']);
            $db->or_like('student.SURNAME', $criteria['StudentName']);
            $db->group_end();
        }

        if(array_key_exists('StudentCode', $criteria) && !empty($criteria['StudentCode'])){
			$db->like('student.STD_CODE', $criteria['StudentCode']);
        }

        if(array_key_exists('PersonalID', $criteria) && !empty($criteria['PersonalID'])){
			$db->like('student.CARDID', $criteria['PersonalID']);
        }

        $db->group_by('group.GRP_CODE, group.GRP_NAME, grade.SEMESTRY, student.STD_CODE');
        $db->order_by('group.GRP_CODE', 'ASC');
        $db->order_by('grade.SEMESTRY', 'DESC');
        $db->order_by('student.NAME', 'ASC');
        $db->order_by('student.SURNAME', 'ASC');

		$result = $db->get()->result_array();
        return $result; 
    }

    public function getSemestry($TeachFirstName, $TeachLastName, $db){
        $db->select('grade.SEMESTRY');

        $db->from('group');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');

        $db->where('grade.SEMESTRY IS NOT NULL');
        $db->like('group.GRP_ADVIS', $TeachFirstName);
        $db->like('group.GRP_ADVIS', $TeachLastName);

        $db->group_by('grade.SEMESTRY');
        $db->order_by('grade.SEMESTRY', 'DESC');

        $result = $db->get()->result_array();
        return $result; 
    }
}