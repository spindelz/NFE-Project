<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends MY_Model {

	public $table_name = 'subject';

	public $primary_key = 'SUB_CODE';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByTeach($criteria, $db){
        $db->select('group.GRP_CODE, group.GRP_NAME');
        $db->select('grade.SEMESTRY');
        $db->select('subject.SUB_CODE, subject.SUB_NAME');

        $db->from('group');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');
        $db->join($this->table_name, $this->table_name . '.SUB_CODE = grade.SUB_CODE', 'left');

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
        
        if(array_key_exists('GroupCode', $criteria) && !empty($criteria['GroupCode'])){
			$db->where('group.GRP_CODE', $criteria['GroupCode']);
        }

        if(array_key_exists('SubjectKeyword', $criteria) && !empty($criteria['SubjectKeyword'])){
            $db->group_start();
            $db->like('subject.SUB_CODE', $criteria['SubjectKeyword']);
            $db->or_like('subject.SUB_NAME', $criteria['SubjectKeyword']);
            $db->group_end();
        }

        $db->group_by('subject.SUB_CODE, group.GRP_CODE, group.GRP_NAME, grade.SEMESTRY');
        $db->order_by('group.GRP_CODE', 'ASC');
        $db->order_by('grade.SEMESTRY', 'DESC');
        $db->order_by('subject.SUB_NAME', 'ASC');

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