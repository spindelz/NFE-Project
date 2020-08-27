<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Home extends REST_Controller
{

    public $primary_key = 'studentID';

    public $userType_key = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index_get()
    {
        $user_logined = $this->session->userdata('user_logined');
        $data = array();
        $studentID = $user_logined['StudentCode'];
        $userType =  $user_logined['UserTypeID'];
        // $studentID =  $this->get($this->primary_key);
        // $userType =  $this->get($this->userType_key);
        // $studentID = '6221000066';
        // $userType = '5';

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
            default:
                break;
        }
        $result = $this->Home_model->getDataByID($studentID,$db);

        $getDate = $result['BIRDAY'];
        $result['Age'] = $this->getAge($getDate);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getAge($getDate){
        
        //date in dd/mm/yyyy format; or it can be in other formats as well

        $birthDate = $getDate;
        
        //explode the date to get month, day and year
        
        $birthDate = explode("/", $birthDate);
        
        //get age from date or birthdate
        // ปรับเปลี่ยนการคำนวณ ว/ด/ป โดนยการเปลี่ยนตำแหน่ง Array birthDate[0=day,1=month,2=year]

        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        // echo "Age is:" . $age;
        // $age = 15;
		return $age;
    }
}