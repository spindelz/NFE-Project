<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Home extends REST_Controller
{

    public $primary_key = 'ID';

    function __construct()
    {
        parent::__construct();

        $this->load->model('Home_model');
    }

    public function index_get()
    {
        // $STD_CODE =  $this->get($this->primary_key);
        $STD_CODE = '6221000628';

        $result = $this->Home_model->getDataByID($STD_CODE);

        // $getDate = '23/10/1997';
        $getDate = $this->Home_model->getBirthDate($STD_CODE);
        $result['GetDate'] = $getDate;
        // $result['Age'] = $this->getAge($getDate);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

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
		return $age;
	}
}