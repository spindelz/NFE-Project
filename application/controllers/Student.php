<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	var $allow_permission = TRUE; 

	var $is_authen = TRUE; 

	var $is_translation = TRUE; 

	var $page_id = 8;

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$user_logined = $this->session->userdata('user_logined');
        $data['TeachFirstName'] = $user_logined['FirstName'];
        $data['TeachLastName'] = $user_logined['LastName'];
		$this->render('normal_page', 'Student', 'Student/index', FALSE, $data);
	}

	public function profile(){
		$data['isTeacher'] = true;
		$data['StudentCode'] = $this->input->get('st');
		$data['UserType'] = $this->input->get('u');
		$this->render('normal_page', 'Profile', 'Profile/index', FALSE, $data);
	}

	public function activity(){
		$data['isTeacher'] = true;
		$data['StudentCode'] = $this->input->get('st');
		$data['UserType'] = $this->input->get('u');
		$this->render('normal_page', 'Activity', 'Activity/index', FALSE, $data);
	}

	public function result(){
		$data['isTeacher'] = true;
		$data['StudentCode'] = $this->input->get('st');
		$data['UserType'] = $this->input->get('u');
		$this->render('normal_page', 'Result', 'Result/index', FALSE, $data);
	}
}