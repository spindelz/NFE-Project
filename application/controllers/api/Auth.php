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
			if($result['UserTypeID'] < 5){
				// $pass_code = is_null($result['Password']) ? '' : $result['Password'];
				$pass_decode = $this->encrypt->decode($result['Password']);
			}else{
				$pass_decode = $result['Password'];
			}
			
			if($data['password'] != $pass_decode){
				$this->response('wrong_password', parent::HTTP_OK);
				return;
			}else{
				/* Set Session */
				// $user_data = $this->Users_model->getByID($result['UserID']);
				unset($result['Password']);
				$userdata = array(
					'user_logined' => array(
						'UserID' => $result['UserID'],
						'Username' => $result['Username'],
						'UserTypeID' => $result['UserTypeID'],
						'UserTypeName' => $result['UserTypeName'],
						'PrefixName' => $result['PrefixName'],
						'FirstName' => @$result['FirstName'],
						'LastName' => @$result['LastName']
					)
				);
				$this->session->set_userdata($userdata);
				$this->response('logined_pass', parent::HTTP_OK);
			}
		}
	}

}