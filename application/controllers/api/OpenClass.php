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
        $db = $this->load->database('nfe1', TRUE);

        // echo "<pre>";print_r ($prov);echo "</pre>";exit;

        $result = $this->OpenClass_model->getProvince($db);

        // echo "<pre>";print_r ($result['province']);echo "</pre>";exit;

        $data['province'] = $result;
        $data['length'] = count($result);

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function amphur_get(){
        $prov = $this->get('Address_Province');
        $db = $this->load->database('nfe1', TRUE);

        // echo "<pre>";print_r ($prov);echo "</pre>";exit;

        $result = $this->OpenClass_model->getAmphur($db,$prov);

        // echo "<pre>";print_r ($result['province']);echo "</pre>";exit;

        $data['amphur'] = $result;
        $data['length'] = count($result);

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function tambon_get(){
        $amphur = $this->get('Address_Amphur');
        $db = $this->load->database('nfe1', TRUE);

        // echo "<pre>";print_r ($prov);echo "</pre>";exit;

        $result = $this->OpenClass_model->getTambon($db,$amphur);

        // echo "<pre>";print_r ($result['province']);echo "</pre>";exit;

        $data['tambon'] = $result;
        $data['length'] = count($result);

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
// --------------------------------------------------
//     public function province_get(){
//         $result = array();
//         $prov = $this->get();
//         $db = $this->load->database('nfe1', TRUE);

//         // echo "<pre>";print_r ($prov);echo "</pre>";exit;

//         $result['province'] = $this->OpenClass_model->getProvince($db);
//         $result['amphur'] = $this->OpenClass_model->getAmphur($db,$prov);
//         $result['tambon'] = $this->OpenClass_model->getTambon($db,$prov);

//         // echo "<pre>";print_r ($result['province']);echo "</pre>";exit;

//         $data['province'] = $result['province'];
//         $data['amphur'] = $result['amphur'];
//         $data['tambon'] = $result['tambon'];
//         $data['length'] = count($result);
//         $data['length-province'] = print_r ($prov);
//         $data['length-amphur'] = count($result['amphur']);
//         $data['length-tambon'] = count($result['tambon']);

//         $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
//     }
}