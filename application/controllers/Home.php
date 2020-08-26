 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index() {
		$user_logined = $this->session->userdata('user_logined');

		if(!isset($user_logined)){
			redirect(SITE.'home/login');
		}

		$this->render('normal_page', 'Home', 'Home/index', FALSE);  
	}

	public function login() {
		$user_logined = $this->session->userdata('user_logined');
		if(isset($user_logined)){
			redirect(SITE.'home');
		}
		echo $user_logined['Username'];
		$this->render('login_page', 'Login', 'home/login', FALSE, null);
	}
	
	public function logout() {
		session_unset('user_logined');
		redirect(SITE.'home/login');
	}

	public function test_session(){
		/* set session model (test session) */
		//************************************************************************
		$data = array(
			'user_logined' => array(
				'ID'      => '6221000628',      //$result->ID,
				'PRENAME' => 'พลทหาร',         //$result->PRENAME,
				'NAME'    => 'ปิยะ',             //$result->NAME,
				'SURNAME' => 'ทัพเรือง'       ,   //$result->SURNAME,
				'CARDID'  => '1234567891234'
			)
		);
		$this->session->set_userdata($data);

		// $data_header = $this->session->userdata('data_header');

		//*************************************************************************** */
	}
	
	public function encryptPassword($pass){
		echo $pass_decode = $this->encrypt->encode($pass);
	}
}
