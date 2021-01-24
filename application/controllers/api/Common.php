<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Common extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Province_model');
        $this->load->model('Amphur_model');
        $this->load->model('Tambon_model');
        $this->load->model('Prefix_model');
        $this->load->model('LecturerType_model');
        $this->load->model('Degree_model');
        $this->load->model('Career_model');
        $this->load->model('GroupTarget_model');
        $this->load->model('InterestBy_model');
        $this->load->model('PeopleStatus_model');
        
    }

    public function province_get(){

        $result = $this->Province_model->getProvince();

        $data['province'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function amphur_get(){
        $prov = $this->get('ProvinceID');

        $result = $this->Amphur_model->getAmphur($prov);
        
        $data['amphur'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function tambon_get(){
        $amphur = $this->get('AmphurID');

        $result = $this->Tambon_model->getTambon($amphur);

        $data['tambon'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function prefix_get(){
        $result = $this->Prefix_model->getData();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function lecturerType_get(){
        $result = $this->LecturerType_model->getData();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function degree_get(){
        $DegreeType = $this->get('DegreeType');

        $result = $this->Degree_model->getData($DegreeType);

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function career_get(){
        $result = $this->Career_model->getDataAll();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function GroupTarget_get(){
        $result = $this->GroupTarget_model->getDataAll();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function InterestBy_get(){
        $result = $this->InterestBy_model->getDataAll();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function PeopleStatus_get(){
        $result = $this->PeopleStatus_model->getDataAll();

        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }
}