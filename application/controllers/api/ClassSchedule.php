<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ClassSchedule extends REST_Controller
{

    public $primary_key = 'StudentCode';

    public $userType_key = 'UserTypeID';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ClassSchedule_model');
    }

    public function getData_get()
    {
        $user_logined = $this->session->userdata('user_logined');
        $studentID = $user_logined['StudentCode'];
        $userType =  $user_logined['UserTypeID'];
        $data = array();
        $SEMESTRY = $this->get();

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

        $result = $this->ClassSchedule_model->getClassSchedule($studentID,$db,$SEMESTRY);

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        $user_logined = $this->session->userdata('user_logined');
        $studentID = $user_logined['StudentCode'];
        $userType =  $user_logined['UserTypeID'];
        $data = array();
        
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

        $result = $this->ClassSchedule_model->getSemestry($studentID, $db);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}