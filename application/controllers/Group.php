<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->render('normal_page', 'Group', 'Group/index', FALSE, null);
	}
}
