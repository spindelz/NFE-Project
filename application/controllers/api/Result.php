<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Result extends REST_Controller
{

    public $primary_key = 'StudentCode';

    public $userType_key = 'UserTypeID';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Result_model');
    }

    public function getData_get()
    {
        $user_logined = $this->session->userdata('user_logined');
        $studentID = $user_logined['StudentCode'];
        $userType =  $user_logined['UserTypeID'];

        $data = array();
        $result = array(); 
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
        
        $result['resultData'] = $this->Result_model->getResult($db, $studentID ,$SEMESTRY);

        $sumGrade = 0;
        $sumUnit = 0;
        foreach ($result['resultData'] as $keyResult => $valueResult) {
            $sumGrade += ($valueResult['GRADE']*$valueResult['SUB_CREDIT']);
            $sumUnit += $valueResult['SUB_CREDIT'];
        }
        
        $result['gradeAverage'] = round(($sumGrade/$sumUnit) , 2);

        $data['data'] = $result['resultData'];
        $data['gpa']  = $result['gradeAverage'];
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

        $result = $this->Result_model->getSemestryResult($db, $studentID);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}