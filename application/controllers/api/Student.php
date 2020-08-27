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

        $db1 = $this->load->database('nfe1', TRUE);
        $result = $this->Student_model->getDataByTeach($criteria, $db1);
        if(empty($result)){
            $db2 = $this->load->database('nfe2', TRUE);
            $result = $this->Student_model->getDataByTeach($criteria, $db2);
            if(empty($result)){
                $db3 = $this->load->database('nfe3', TRUE);
                $result = $this->Student_model->getDataByTeach($criteria, $db3);
            }
        }
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db1->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        $TeachFirstName = $this->get('TeachFirstName');
        $TeachLastName = $this->get('TeachLastName');

        $db1 = $this->load->database('nfe1', TRUE);
        $result = $this->Student_model->getSemestry($TeachFirstName, $TeachLastName, $db1);
        if(empty($result)){
            $db2 = $this->load->database('nfe2', TRUE);
            $result = $this->Student_model->getSemestry($TeachFirstName, $TeachLastName, $db2);
            if(empty($result)){
                $db3 = $this->load->database('nfe3', TRUE);
                $result = $this->Student_model->getSemestry($TeachFirstName, $TeachLastName, $db3);
            }
        }
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db1->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}