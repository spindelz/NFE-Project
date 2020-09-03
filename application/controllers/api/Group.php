<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Group extends REST_Controller{

    public $primary_key = 'GRP_CODE';

    function __construct(){
        parent::__construct();

        $this->load->model('Group_model');
    }

    public function getDataByTeach_get(){

        $criteria = $this->get();

        echo '<pre>';
        print_r($criteria);
        echo '</>';exit;

        $db1 = $this->load->database('nfe1', TRUE);
        $result = $this->Group_model->getDataByTeach($criteria, $db1);
        if(empty($result)){
            $db2 = $this->load->database('nfe2', TRUE);
            $result = $this->Group_model->getDataByTeach($criteria, $db2);
            if(empty($result)){
                $db3 = $this->load->database('nfe3', TRUE);
                $result = $this->Group_model->getDataByTeach($criteria, $db3);
            }
        }
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db1->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        // $TeachFirstName = $this->get('TeachFirstName');
        // $TeachLastName = $this->get('TeachLastName');

        $db1 = $this->load->database('nfe1', TRUE);
        $result = $this->Group_model->getSemestry( $db1);
        if(empty($result)){
            $db2 = $this->load->database('nfe2', TRUE);
            $result = $this->Group_model->getSemestry( $db2);
            if(empty($result)){
                $db3 = $this->load->database('nfe3', TRUE);
                $result = $this->Group_model->getSemestry( $db3);
            }
        }
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db1->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}