<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Lecturer extends REST_Controller{

    public $primary_key = 'LecturerID';

    function __construct(){
        parent::__construct();
        $this->load->model('Lecturer_model');
    }

    public function getData_get(){
        $input = $this->input->get();

        $criteria = array();

        $result = $this->Lecturer_model->getDataAll($criteria);
		
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function save_post(){
        $input = $this->input->post();
        echo '<pre>'; print_r($input); echo '</pre>'; die();
        $result = $this->Lecturer_model->insert($input);
		
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}