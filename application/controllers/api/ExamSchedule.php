<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ExamSchedule extends REST_Controller
{

    public $primary_key = 'studentID';

    public $userType_key = 'UserTypeID';

    function __construct()
    {
        parent::__construct();

        $this->load->model('ExamSchedule_model');
    }

    public function index_get()
    {
        $user_logined = $this->session->userdata('user_logined');
        $studentID = $user_logined['StudentCode'];
        $userType =  $user_logined['UserTypeID'];
        $isTeacher = $this->get('isTeacher');
        $GroupCode = $this->get('GroupCode');
        $Semestry = $this->get('Semestry');

        $data = array();
        
        if($isTeacher){
            $db = $this->load->database('nfe1', TRUE);
            $result = $this->ExamSchedule_model->getExamScheduleByGroup($GroupCode, $Semestry, $db);
            if(empty($result)){
                $db = $this->load->database('nfe2', TRUE);
                $result = $this->ExamSchedule_model->getExamScheduleByGroup($GroupCode, $Semestry, $db);
                if(empty($result)){
                    $db = $this->load->database('nfe3', TRUE);
                    $result = $this->ExamSchedule_model->getExamScheduleByGroup($GroupCode, $Semestry, $db);
                }
            }
        }else{
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
            $result = $this->ExamSchedule_model->getExamSchedule($studentID,$db);
        }
        
        foreach ($result as $key => &$value) {
            $value['EXAM_DAY'] = is_null($value['EXAM_DAY']) ? '' : $value['EXAM_DAY'];
            $value['EXAM_START'] = is_null($value['EXAM_START']) ? '' : $value['EXAM_START'];
            $value['EXAM_END'] = is_null($value['EXAM_END']) ? '' : $value['EXAM_END'];
            $value['FLD_CODE'] = is_null($value['FLD_CODE']) ? '' : $value['FLD_CODE'];
            $value['FLD_NAME'] = is_null($value['FLD_NAME']) ? '' : $value['FLD_NAME'];
            $value['ROOMNO'] = is_null($value['ROOMNO']) ? '' : $value['ROOMNO'];
            $value['ROOMNAME'] = is_null($value['ROOMNAME']) ? '' : $value['ROOMNAME'];
        }

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
        
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}