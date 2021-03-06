<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Activity extends REST_Controller
{

    public $primary_key = 'StudentCode';

    public $userType_key = 'UserTypeID';

    function __construct(){
        parent::__construct();
        $this->load->model('Activity_model');
    }

    public function index_get(){
        $input = $this->get();
        $data = $this->security->xss_clean($input);
        
        if($data['isTeacher']){
            $studentID = $data['StudentCode'];
            $userType =  $data['UserType'];
        }else{
            $user_logined = $this->session->userdata('user_logined');
            $studentID = $user_logined['StudentCode'];
            $userType =  $user_logined['UserTypeID'];
        }
        
        $data = array();
        $result = array();

        switch ($userType) {
            case '5':
                $db = $this->load->database('nfe1', TRUE);
                break;
            case '6':
                $db = $this->load->database('nfe2', TRUE);
                break;
            case '7':
                $db = $this->load->database('nfe3', TRUE);
                break;
        }

        $result['resultData'] = $this->Activity_model->getActivity($studentID, $db);

        $sum = 0;
        foreach ($result['resultData'] as $keyResult => $valueResult) {
            $sum += $valueResult['HOUR'];
        }

        $result['sumHour'] = $sum;

        $data['data'] = $result['resultData'];
        $data['hour'] = $result['sumHour'];
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}