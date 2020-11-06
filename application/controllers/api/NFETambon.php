<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class NFETambon extends REST_Controller{

    public $primary_key = 'OrganizationID';

    function __construct(){
        parent::__construct();
        $this->load->model('Organization_model');
    }

    public function getData_get(){
        $input = $this->input->get();

        $criteria = array();
        $criteria['isActive'] = $input['isActive'];
        $criteria['OrganizationLavel'] = explode(',', $input['OrganizationLavel']);
        $criteria['Amphur'] = explode(',', $input['Amphur']);

        $result = $this->Organization_model->getDataAll($criteria);
		// echo "<pre>";print_r ($input);echo "</pre>";exit;
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }


}