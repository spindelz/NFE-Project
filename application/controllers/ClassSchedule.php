<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassSchedule extends MY_Controller {

	var $allow_permission = TRUE; 

	var $is_authen = FALSE; 

	var $is_translation = TRUE; 

	var $page_id = 8; 

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->render('normal_page', 'ClassSchedule', 'ClassSchedule/index', null);
	}

	public function create() {
		$data['pageName'] = 'เพิ่มแท็กสินค้า';
		$this->render('normal_page', 'ClassScheduleCreate', 'ClassSchedule/form', FALSE, $data);
	}
	
	public function edit($ClassScheduleID = null) {
		$data['ClassScheduleID'] = $ClassScheduleID;
		$data['pageName'] = 'แก้ไขแท็กสินค้า';
		$this->render('normal_page', 'ClassScheduleEdit', 'ClassSchedule/form', FALSE, $data);
    }

}