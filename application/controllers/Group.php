<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	var $page_id = 5;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
        $user_logined = $this->session->userdata('user_logined');
        $data['TeachFirstName'] = $user_logined['FirstName'];
        $data['TeachLastName'] = $user_logined['LastName'];
		$this->render('normal_page', 'Group', 'Group/index', FALSE, $data);
	}

	public function examSchedule($GroupCode) {
        // $user_logined = $this->session->userdata('user_logined');
        // $data['TeachFirstName'] = $user_logined['FirstName'];
		// $data['TeachLastName'] = $user_logined['LastName'];
		$data['isTeacher'] = 1;
		$data['GroupCode'] = $GroupCode;
		$data['Semestry'] = $this->input->get('s');
		
		$this->render('normal_page', 'ExamSchedule', 'ExamSchedule/index', FALSE, $data);
	}

	public function student($GroupCode) {
        // $user_logined = $this->session->userdata('user_logined');
        // $data['TeachFirstName'] = $user_logined['FirstName'];
		// $data['TeachLastName'] = $user_logined['LastName'];
		$data['GroupCode'] = $GroupCode;
		$data['Semestry'] = $this->input->get('s');
		
		$this->render('normal_page', 'Student', 'Student/index', FALSE, $data);
	}

	public function subject($GroupCode) {
        // $user_logined = $this->session->userdata('user_logined');
        // $data['TeachFirstName'] = $user_logined['FirstName'];
		// $data['TeachLastName'] = $user_logined['LastName'];
		$data['GroupCode'] = $GroupCode;
		$data['Semestry'] = $this->input->get('s');
		
		$this->render('normal_page', 'Student', 'Subject/index', FALSE, $data);
	}
}
