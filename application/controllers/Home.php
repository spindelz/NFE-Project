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

		$data['isTeacher'] = false;

		$this->render('normal_page', 'Profile', 'Profile/index', FALSE, $data);  
	}

	public function login() {
		$user_logined = $this->session->userdata('user_logined');
		if(isset($user_logined)){
			redirect(SITE.'home');
		}
		echo $user_logined['Username'];
		$this->render('login_page', 'Login', 'Home/login', FALSE, null);
	}
	
	public function logout() {
		session_unset('user_logined');
		redirect(SITE.'home/login');
	}
	
	public function encryptPassword($pass){
		echo $pass_decode = $this->encrypt->encode($pass);
	}
}
