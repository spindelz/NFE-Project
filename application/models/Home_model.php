<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataHeader()
    {
        /* set session model (test session) */
        //************************************************************************
        $userdata_header = array(
            'data_header' => array(
                'ID'      => '6221000628',      //$result->ID,
                'PRENAME' => 'พลทหาร',         //$result->PRENAME,
                'NAME'    => 'ปิยะ',             //$result->NAME,
                'SURNAME' => 'ทัพเรือง'          //$result->SURNAME,
            )
        );
        $this->session->set_userdata($userdata_header);

        $data_header = $this->session->userdata('data_header');
        return $data_header;

        //*************************************************************************** */
    }

    public function test($STD_CODE){
        return $STD_CODE;
    }

    public function getAge($getDate){

		//date in dd/mm/yyyy format; or it can be in other formats as well

		$getDate = $birthDate;
		
		//explode the date to get month, day and year
		
		$birthDate = explode("/", $birthDate);
		
		//get age from date or birthdate
		// ปรับเปลี่ยนการคำนวณ ว/ด/ป โดนยการเปลี่ยนตำแหน่ง Array birthDate[0=day,1=month,2=year]

        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
		// echo "Age is:" . $age;
		return $age;
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
        $this->db->select('student.PRENAME,s.NAME,s.SURNAME,s.ID,s.CARDID,s.BIRDAY,s.CURPHONE,s.S_SCHOOL,s.CURADDR,s.CTAMBONID,s.CZIPCODE');
        $this->db->from('student as s');
        //$this->dv->join('tambon as t','s.CTAMBONID = t.ID','full');
        // $this->db->join('province as p');
		$this->db->where('ID',$STD_CODE);
		//$this->db->order_by('SEMESTRY','asc');
		$results = $this->db->get()->result_array();
        return $results; 
        
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