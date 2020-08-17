<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function test($STD_CODE){
        return $STD_CODE;
    }

    public function getBirthDate($STD_CODE)
    {
        $this->db->select('student.BIRDAY');
        $this->db->from('student');
		$this->db->where('student.ID',$STD_CODE);
		//$this->db->order_by('SEMESTRY','asc');
		$result = $this->db->get()->result();
        return $result; 
    }

    public function getDataByID($STD_CODE)
    {
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
		$result = $this->db->get()->result_array();
        return $result; 
        
    }
    
    public function getDataProfile()
    {
        // Set session model
        //***********************************************************************
        $userdata = array(
            'user_logined' => array(
                'ID'      => '6221000628',       //$result->ID,
                'PRENAME' => 'พลทหาร',         //$result->PRENAME,
                'NAME'    => 'ปิยะ',             //$result->NAME,
                'SURNAME' => 'ทัพเรือง',          //$result->SURNAME,
                'CARDID'  => '1234567891234',    //$result->CARDID,
                'BIRDAY'  => '23/10/1997',      //$result->BIRDAY,
                'S_SCHOOL'=> 'โรงเรียนวัดวังหิน',    //$result->S_SCHOOL,
                'CTAMBONID'=> 'ชลบุรี',           //$result->CTAMBONID,
                'CURPHONE'=> '0848692764',      //$result->CURPHONE
            )
        );
        $this->session->set_userdata($userdata);

        $user_logined = $this->session->userdata('user_logined');
        //***********************************************************************
            
        $data = array(
            'ID'        => $user_logined['ID'],
            'PRENAME'   => $user_logined['PRENAME'],
            'NAME'      => $user_logined['NAME'],
            'SURNAME'   => $user_logined['SURNAME'],
            'IDCARD'    => $user_logined['IDCARD'],
            'BIRDAY'    => $user_logined['BIRDAY'],
            'S_SCHOOL'  => $user_logined['S_SCHOOL'],
            'CTAMBONID' => $user_logined['CTAMBONID'],
            'CURPHONE'  => $user_logined['CURPHONE'],

        );

        
    }


}