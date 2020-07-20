<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller {

	public $default_language = null;

	public $primary_key = 'UserID';

	function __construct() {
		parent::__construct();

		$this->load->model('Users_model');
	}

	public function login_post(){

		$input = $this->post();
		$data = $this->security->xss_clean($input);
		// echo '<pre>'; print_r($data); echo '</pre>'; die();

		if(empty($data['username'])){
			$this->response('error_request', parent::HTTP_OK);
			return;
		}

		$result = $this->Users_model->checkUsername($data['username']);
		// echo '<pre>'; print_r($result); echo '</pre>'; die();
		if(empty($result)){
			$this->response('not_found_username', parent::HTTP_OK);
			return;
		}else{
			$pass_code = is_null($result['Password']) ? '' : $result['Password'];
			$pass_decode = $this->encrypt->decode($result['Password']);
			if($data['password'] != $pass_decode){
				$this->response('wrong_password', parent::HTTP_OK);
				return;
			}else{
				/* Set Session */
				$user_data = $this->Users_model->getByID($result['UserID']);
				$userdata = array(
					'user_logined' => array(
						'UserID' => $user_data['UserID'],
						'Username' => $user_data['Username'],
						'UserTypeID' => $user_data['UserTypeID'],
						'UserTypeName' => $user_data['UserTypeName'],
						'PrefixName' => $user_data['PrefixName'],
						'FirstName' => @$user_data['FirstName'],
						'LastName' => @$user_data['LastName']
					)
				);
				$this->session->set_userdata($userdata);
				$this->response('logined_pass', parent::HTTP_OK);
			}
		}
	}

}