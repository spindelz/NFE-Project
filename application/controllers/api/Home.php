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

        $this->load->model('Student_model');
    }

    public function index_get()
    {
        // $data = array();
        // $limit   = 100;
        // $offset  = 0;
        $StudentID = '6221000628';

        $result = $this->Home_model->getByID($StudentID);

        echo'<pre>';
        print_r $result;
        echo '</pre>';

        exit;

        // $data['data'] = $result;
        // $data['length'] = count($result);
        // $data['debug'] = $this->db->last_query();

        // $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}