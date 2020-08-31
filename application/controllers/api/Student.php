<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Student extends REST_Controller{

    public $primary_key = 'ID';

    function __construct(){
        parent::__construct();

        $this->load->model('Student_model');
    }

    public function getDataByTeach_get(){

        $criteria = $this->get();

        $db = $this->load->database('nfe1', TRUE);
        $result = $this->Student_model->getDataByTeach($criteria, $db);
        if(empty($result)){
            $db = $this->load->database('nfe2', TRUE);
            $result = $this->Student_model->getDataByTeach($criteria, $db);
            if(empty($result)){
                $db = $this->load->database('nfe3', TRUE);
                $result = $this->Student_model->getDataByTeach($criteria, $db);
            }
        }
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        $criteria = array();
        // $criteria['TeachFirstName'] = $this->get('TeachFirstName');
        // $criteria['TeachLastName'] = $this->get('TeachLastName');
        // $criteria['GroupCode'] = $this->get('GroupCode');
        // $criteria['Semestry'] = $this->get('Semestry');
        $criteria = $this->get();

        $db = $this->load->database('nfe1', TRUE);
        $result = $this->Student_model->getSemestry($criteria, $db);
        if(empty($result)){
            $db = $this->load->database('nfe2', TRUE);
            $result = $this->Student_model->getSemestry($criteria, $db);
            if(empty($result)){
                $db = $this->load->database('nfe3', TRUE);
                $result = $this->Student_model->getSemestry($criteria, $db);
            }
        }
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}