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

}