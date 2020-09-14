<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintData extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$user_logined = $this->session->userdata('user_logined');

		if(!isset($user_logined)){
			redirect(SITE.'home/login');
		}
		
		$page_name = $_GET['page_name'];
		$content = $_GET['content'];
		$data['checkPrint'] = '1';

		$this->render('blank_page', $page_name, $content, FALSE, $data);  
	}
}