<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class OpenClass extends REST_Controller{
    public $primary_key = 'studentID';

    public $userType_key = '';

    function __construct(){
        parent::__construct();
        $this->load->model('OpenClass_model');
    }

    public function index_get(){
        // $input = $this->input->get();
		// echo "<pre>";print_r ($input);echo "</pre>";exit;
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function saveData_post(){
        // $prov = $this->post();
        // echo "<pre>";print_r ($prov);echo "</pre>";exit;
        // $result = $this->OpenClass_model->;
        $result = $this->post();

        $data['data'] = $result;
        $data['length'] = count($result);
        // $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
// 
    }

    public function province_get(){

        $result = $this->OpenClass_model->getProvince();

        $data['province'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function amphur_get(){
        $prov = $this->get('ProvinceID');

        $result = $this->OpenClass_model->getAmphur($prov);
        
        $data['amphur'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function tambon_get(){
        $amphur = $this->get('AmphurID');

        $result = $this->OpenClass_model->getTambon($amphur);

        $data['tambon'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getDetailOpenClass_post(){
        $ClassID = $this->get('ClassID');

        $result = array();//$this->OpenClass_model->getTambon($amphur);

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}