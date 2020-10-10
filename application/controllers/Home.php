 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	var $allow_permission = TRUE;

	var $is_authen = TRUE;

	var $is_translation = TRUE;

	var $page_id = 1;

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
		$site = $this->session->userdata('Site');
		$data['Site'] = (isset($site) || !empty($site) ? $site : 1);

		if(array_search((int)$user_logined['UserTypeID'], array(1,2,3,4,10,11)) > -1){
			$this->render('normal_page', 'Profile', 'Home/index', FALSE, $data);  
		}else{
			$this->render('normal_page', 'Profile', 'Profile/index', FALSE, $data);  
		}
		
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

	public function selectSite($siteID){
		//site = 1: พื้นฐาน, site = 2: ต่อเนื่อง
		$this->session->set_userdata(array('Site' => $siteID));
		redirect(SITE.'Home');
		// echo $this->session->userdata('Site');
	}
	
	public function encryptPassword($pass){
		echo $this->encrypt->encode($pass);
	}
}
