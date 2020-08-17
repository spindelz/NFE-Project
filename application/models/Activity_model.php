<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function test($STD_CODE){
        return $STD_CODE;
    }

    public function getActivity($STD_CODE) {
		// $this->_setColumnSelect();
        // $this->db->select('s.PRENAME,s.NAME,s.SURNAME,s.ID,s.IDCARD,s.BIRDAY,s.CURPHONE,s.S_SCHOOL,s.CURADDR');
        // $this->db->from('student as s');
        // $this->dv->join('tambon as t');
        // $this->db->join('province as p');
		// $this->db->where('ID',$STD_CODE);
		// //$this->db->order_by('SEMESTRY','asc');
		// $results = $this->db->get()->result_array();
        // return $results; 

		$this->db->select('activity.ACTIVITY,activity.SEMESTRY,activity.HOUR');
        $this->db->from('activity');
		$this->db->where('STD_CODE',$STD_CODE);
		$this->db->order_by('SEMESTRY','asc');
        // $this->db->like('tag.[Column1]');
		$results = $this->db->get()->result_array();
		return $results;  
	}

    public function getDataByID($STD_CODE)
    {
		// $this->db->select('prefix.PrefixName');
		// $this->_setFrom();
		// $this->db->join('user_type', 'user_type.UserTypeID = users.UserTypeID', 'left');
		// $this->db->join('prefix', 'prefix.PrefixID = users.PrefixID', 'left');
		
		// if(!empty($input['username']) && !empty($input['password'])){
		// 	$this->db->where('Username', $input['username']);
		// 	$this->db->where('Password', $input['password']);
		// }
		
		// $query = $this->db->get()->row_array();
		// unset($query['Password']);
        // return $query;

        // $this->_setColumnSelect();
        $this->db->select('student.PRENAME,student.NAME,student.SURNAME,student.ID,
                            student.CARDID,student.BIRDAY,student.CURPHONE,student.S_SCHOOL,
                            student.CURADDR,student.CTAMBONID,student.CZIPCODE as Zipcode ,
                            tambon.NAME as Tambon,amphur.NAME as Amphur,province.NAME as Province'
                        );
        $this->db->from('student');
        $this->db->join('tambon','student.CTAMBONID = tambon.ID','left');
        $this->db->join('amphur','tambon.AMPHURID = amphur.ID','left');
        $this->db->join('province','amphur.PROVID = province.ID','left');
		$this->db->where('student.ID',$STD_CODE);
		//$this->db->order_by('SEMESTRY','asc');
		$results = $this->db->get()->result_array();
        return $results; 
        
    }
    

}