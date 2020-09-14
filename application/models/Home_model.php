<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public $table_name = 'student';

	public $primary_key = 'ID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataByID($criteria, $db){
        
        $db->select('student.PRENAME,student.NAME,student.SURNAME,student.ID,
                            student.CARDID,student.BIRDAY,student.CURPHONE,student.S_SCHOOL,
                            student.CURADDR,student.TAMBONID,student.CZIPCODE as Zipcode ,student.S_PROVINCE,
                            tambon.NAME as Tambon,amphur.NAME as Amphur,province.NAME as Province');

        $db->select('CONCAT(CASE WHEN ISNULL(student.CURADDR) THEN \'-\' ELSE student.CURADDR END
            , \' ต.\', CASE WHEN ISNULL(tambon.NAME) THEN \'-\' ELSE tambon.NAME END
            , \' อ.\', CASE WHEN ISNULL(amphur.NAME) THEN \'-\' ELSE amphur.NAME END
            , \' จ.\', CASE WHEN ISNULL(province.NAME) THEN \'-\' ELSE province.NAME END
            , \' \', student.CZIPCODE) as StudentAddress');

        $db->from($this->table_name);

        $db->join('tambon','student.CTAMBONID = tambon.ID','left');
        $db->join('amphur','tambon.AMPHURID = amphur.ID','left');
        $db->join('province','amphur.PROVID = province.ID','left');

        if(array_key_exists('StudentCode', $criteria) && !empty($criteria['StudentCode'])){
			$db->where('student.STD_CODE', $criteria['StudentCode']);
        }
        
		$result = $db->get()->row_array();
        return $result; 
        
    }

}