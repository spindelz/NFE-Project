<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer_model extends MY_Model {

	public $table_name = 'Lecturer';

	public $primary_key = 'LecturerID';

	public $is_translation = false;

	public $table_translation_name = null;

    public function getDataAll($criteria){
        $this->db->select('Lecturer.LecturerID, CONCAT(prefix.PrefixName, \' \', Lecturer.FirstName, \' \', Lecturer.LastName) as LecturerName');
        $this->db->select('(CASE WHEN Lecturer.LecturerTypeID = 4 THEN Lecturer.LecturerTypeOther ELSE LecturerType.LecturerTypeName END) as LecturerType');
        $this->db->select('IFNULL(Lecturer.PhoneNumber, \'\') as PhoneNumber, IFNULL(Lecturer.RegisterDate, \'\') as RegisterDate, users.Username as CreatedBy');
        $this->db->select('(CASE WHEN Lecturer.isActive = 1 THEN \'ใช้งาน\' ELSE \'ไม่ได้ใช้งาน\' END) as Status');
        $this->db->from($this->table_name);
        $this->db->join('prefix', 'prefix.PrefixID = Lecturer.PrefixID AND prefix.isActive = 1', 'left');
        $this->db->join('LecturerType', 'LecturerType.LecturerTypeID = Lecturer.LecturerTypeID AND LecturerType.isActive = 1', 'left');
        $this->db->join('users', 'users.UserID = Lecturer.UpdatedBy AND users.isActive = 1', 'left');

        $this->db->where('Lecturer.isActive', 1);

		$result = $this->db->get()->result_array();
        return $result; 
    }
}