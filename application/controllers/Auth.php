<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	var $allow_permission = FALSE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->render('normal_page', 'Home', 'home', TRUE, null);
	}
	
	public function login() {
		$this->render('login_page', 'Login', 'login', TRUE,  null);
    }
}