<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Activity extends REST_Controller
{

    public $primary_key = 'STD_CODE';

    function __construct()
    {
        parent::__construct();

        $this->load->model('Activity_model');
    }

    public function index_get()
    {
        $STD_CODE = '12200100015211000013';
        // $user_data = $this->session->userdata('data_activity');
        // $STD_CODE = $user_data['STD_CODE'];

        $result = $this->Activity_model->getActivity($STD_CODE);
        $result['totalHour'] ='2';

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSumHour($getHour){

        $STD_CODE = '12200100015211000013';
        $result = $this->Activity_model->getActivity($STD_CODE);
        
        $sum = 0;

        foreach ($result as $keyResult => $valueResult) {
            $sum += $valueResult['HOUR'];
        }
        $dataResult = array(
            'ActivityData' => $result,
            'SumHour' => $sum
        );

        return $dataResult;
	}
}