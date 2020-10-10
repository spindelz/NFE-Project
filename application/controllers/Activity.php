<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	var $page_id = 2;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$user_logined = $this->session->userdata('user_logined');
		$data['isTeacher'] = false;
		$this->render('normal_page', 'Activity', 'Activity/index', FALSE, $data);  
	}
	
	public function printData() {

		$this->render('blank_page', 'Activity', 'Activity/print', FALSE);  
	}
}
