<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends MY_Model {

	public $table_name = 'group';

	public $primary_key = 'GRP_CODE';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByTeach($criteria, $db){
        $db->select('group.GRP_CODE, group.GRP_NAME, group.GRP_FIELD, group.GRP_MEET');
        $db->select('grade.SEMESTRY');
        $db->select('field.FLD_NAME');

        $db->from($this->table_name);
        $db->join('field', 'field.FLD_CODE = group.GRP_FIELD', 'left');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');

        $db->where('grade.SEMESTRY IS NOT NULL');

        if(array_key_exists('TeachFirstName', $criteria) && !empty($criteria['TeachFirstName'])){
			$db->like('group.GRP_ADVIS', $criteria['TeachFirstName']);
        }
        
        if(array_key_exists('TeachLastName', $criteria) && !empty($criteria['TeachLastName'])){
			$db->like('group.GRP_ADVIS', $criteria['TeachLastName']);
        }

        if(array_key_exists('Semestry', $criteria) && !empty($criteria['Semestry'])){
			$db->where('grade.SEMESTRY', $criteria['Semestry']);
        }
        
        if(array_key_exists('GroupName', $criteria) && !empty($criteria['GroupName'])){
			$db->like('group.GRP_NAME', $criteria['GroupName']);
        }

        $db->group_by('group.GRP_CODE, group.GRP_NAME, group.GRP_FIELD, group.GRP_MEET, grade.SEMESTRY');
        $db->order_by('group.GRP_CODE', 'ASC');
        $db->order_by('grade.SEMESTRY', 'DESC');

		$result = $db->get()->result();
        return $result; 
    }

    public function getSemestry($TeachFirstName, $TeachLastName, $db){
        $db->select('grade.SEMESTRY');

        $db->from($this->table_name);
        $db->join('field', 'field.FLD_CODE = group.GRP_FIELD', 'left');
        $db->join('grade', 'grade.GRP_CODE = group.GRP_CODE', 'left');

        $db->where('grade.SEMESTRY IS NOT NULL');

        $db->group_by('grade.SEMESTRY');
        $db->order_by('grade.SEMESTRY', 'DESC');

        $result = $db->get()->result();
        return $result; 
    }
}