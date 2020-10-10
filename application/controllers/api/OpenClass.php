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
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}