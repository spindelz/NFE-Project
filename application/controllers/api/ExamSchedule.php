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
        $data = array();
        // $studentID = $this->get($this->primary_key);
        // $userType =  $this->get($this->userType_key);
        $studentID = '6112000470';
        $userType = '6';

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
        $samester = $this->input->post('');

        $result = $this->ExamSchedule_model->getExamSchedule($studentID,$db);

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
        
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}