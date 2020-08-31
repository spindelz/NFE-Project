<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	var $page_id = 6;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
        $user_logined = $this->session->userdata('user_logined');
        $data['TeachFirstName'] = $user_logined['FirstName'];
        $data['TeachLastName'] = $user_logined['LastName'];
		$this->render('normal_page', 'Subject', 'Subject/index', FALSE, $data);
	}
}
