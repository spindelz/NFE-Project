<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamSchedule extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	var $page_id = 4;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		$this->render('normal_page', 'ExamSchedule', 'ExamSchedule/index', FALSE);  
	}
	
	public function printData() {

		$this->render('blank_page', 'ExamSchedule', 'ExamSchedule/print', FALSE);  

	}
}
