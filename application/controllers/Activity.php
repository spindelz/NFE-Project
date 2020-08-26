<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {

		if(!isset($user_logined)){
			redirect(SITE.'home/login');
        }

		$this->render('normal_page', 'Activity', 'Activity/index', FALSE);  
    }
}
