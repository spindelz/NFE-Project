<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class CareerType extends REST_Controller{

    public $primary_key = 'CareerTypeID';

    function __construct(){
        parent::__construct();
        $this->load->model('CareerType_model');
    }

    public function getData_get(){
        $input = $this->input->get();

        $criteria = array();

        $result = $this->CareerType_model->getDataAll($criteria);
		
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }


}