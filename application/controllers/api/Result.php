<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Result extends REST_Controller
{

    public $primary_key = 'studentID';

    public $userType_key = 'UserTypeID';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Result_model');
    }

    public function getData_get()
    {
        $data = array();
        // $studentID = $this->get($this->primary_key);
        // $userType =  $this->get($this->userType_key);
        $studentID = '6221000066';
        $userType = '5';

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
        
        $result = $this->Result_model->getResult($studentID,$db);

        $sumGrade = 0;
        $sumUnit = 0;
        foreach ($result as $keyResult => $valueResult) {
            $sumGrade += ($valueResult['GRADE']*$valueResult['SUB_CREDIT']);
            $sumUnit += $valueResult['SUB_CREDIT'];
        }
        
        $result['gradeAverage'] = $sumGrade/$sumUnit;

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        $data = array();
        // $studentID = $this->get($this->primary_key);
        // $userType =  $this->get($this->userType_key);
        $userType = '5';
        $studentID = '6221000066';
        
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

        $result = $this->Result_model->getSemestryResult($studentID, $db);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}