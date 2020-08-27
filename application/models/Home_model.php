<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByID($studentID,$db)
    {
        $db->select('student.PRENAME,student.NAME,student.SURNAME,student.ID,
                            student.CARDID,student.BIRDAY,student.CURPHONE,student.S_SCHOOL,
                            student.CURADDR,student.CTAMBONID,student.CZIPCODE as Zipcode ,student.S_PROVINCE,
                            tambon.NAME as Tambon,amphur.NAME as Amphur,province.NAME as Province'
                        );

        $db->from($this->table_name);

        $db->join('tambon','student.CTAMBONID = tambon.ID','left');
        $db->join('amphur','tambon.AMPHURID = amphur.ID','left');
        $db->join('province','amphur.PROVID = province.ID','left');

        $db->where('student.STD_CODE',$studentID);
        
		$result = $db->get()->row_array();
        return $result; 
        
    }

}