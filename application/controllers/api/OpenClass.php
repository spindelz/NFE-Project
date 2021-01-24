<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class OpenClass extends REST_Controller{
    public $primary_key = 'ClassID';

    public $userType_key = '';

    function __construct(){
        parent::__construct();
        $this->load->model('OpenClass_model');
        $this->load->model('CourseStructure_model');
        $this->load->model('ClassDetail_model');
        $this->load->model('LearningMaterial_model');
        $this->load->model('Evaluate_model');
        $this->load->model('CriteriaComplete_model');
        $this->load->model('Organization_model');
    }

    public function list_post(){
        $criteria = $this->post();
        // echo '<pre>'; print_r($criteria); echo '</pre>'; die();
        $list = $this->OpenClass_model->get_datatable($criteria);

        foreach ($list as $key => &$value) {
            $resultList = $this->OpenClass_model->getResultAmountByClassID($value['ClassID']);
            $value['ResultAmount'] = count($resultList);
        }

        $data['data'] = $list;
        $data['length'] = count($list);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function saveData_post(){
        $input = $this->post();

        $ClassDays = $input['ClassDays'];
        $input['ClassDays'] = implode(',', $input['ClassDays']);

        $this->OpenClass_model->validation_field($input, false);

        $CourseStructure = $input['CourseStructure'];
        unset($input['CourseStructure']);
        $ClassDetail = $input['ClassDetail'];
        unset($input['ClassDetail']);
        $LearningMaterial = $input['LearningMaterial'];
        unset($input['LearningMaterial']);
        $Evaluate = $input['Evaluate'];
        unset($input['Evaluate']);
        $CriteriaComplete = $input['CriteriaComplete'];
        unset($input['CriteriaComplete']);

        if($input['isExtendTime'] == 0){
            unset($input['HourAmount']);
            unset($input['DayAmount']);
            unset($input['ExtendDateStart']);
            unset($input['ExtendDateEnd']);
            unset($input['ExtendTimeStart']);
            unset($input['ExtendTimeEnd']);
        }

        if(!empty($_FILES["PlaceImage"]["name"])){
            $res = $this->uploadImage($_FILES["PlaceImage"]);
            if($res['status'] == 1){
                $input['PlaceImage'] = $res['file_name'];
                $result = true;
            }else{
                $result = false;
            }
        }else{
            $result = false;
            $data['message'] = 'กรุณาแนบไฟล์รูปสถานที่จัดกิจกรรม';
        }

        if($result){
            $input['GroupCode'] = $this->getGroupCode($input['NFETambonID']);
            // echo '<pre>'; print_r($input['GroupCode']); echo '</pre>'; die();
            $ClassID = $this->OpenClass_model->insert($input);
            if($ClassID){
                foreach ($CourseStructure as $CourseStructureKey => $CourseStructureValue) {
                    $CourseStructureValue['ClassID'] = $ClassID;
                    $result = $this->CourseStructure_model->insert($CourseStructureValue);
                    if(!$result){ break; }
                }
            }

            if($result){
                foreach ($ClassDetail as $ClassDetailKey => $ClassDetailValue) {
                    $ClassDetailValue['ClassID'] = $ClassID;
                    $result = $this->ClassDetail_model->insert($ClassDetailValue);
                    if(!$result){ break; }
                }
            }

            if($result){
                foreach ($LearningMaterial as $LearningMaterialKey => $LearningMaterialValue) {
                    $LearningMaterialValue['ClassID'] = $ClassID;
                    $result = $this->LearningMaterial_model->insert($LearningMaterialValue);
                    if(!$result){ break; }
                }
            }

            if($result){
                foreach ($Evaluate as $EvaluateKey => $EvaluateValue) {
                    $EvaluateValue['ClassID'] = $ClassID;
                    $result = $this->Evaluate_model->insert($EvaluateValue);
                    if(!$result){ break; }
                }
            }

            if($result){
                foreach ($CriteriaComplete as $CriteriaCompleteKey => $CriteriaCompleteValue) {
                    $CriteriaCompleteValue['ClassID'] = $ClassID;
                    $result = $this->CriteriaComplete_model->insert($CriteriaCompleteValue);
                    if(!$result){ break; }
                }
            }
        }
        
        // echo '<pre>'; print_r($CourseStructure); echo '</pre>'; die();

        $data['data'] = $result ? 'true': 'false';
        $data['id'] = $ClassID;
        if($result){
            $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
        }else{
            $this->response(empty($data) ? '' : $data, parent::HTTP_BAD_REQUEST);
        }
        
    }

    // public function province_get(){

    //     $result = $this->OpenClass_model->getProvince();

    //     $data['province'] = $result;
    //     $data['length'] = count($result);
    //     $data['debug'] = $this->db->last_query();

    //     $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    // }

    // public function amphur_get(){
    //     $prov = $this->get('ProvinceID');

    //     $result = $this->OpenClass_model->getAmphur($prov);
        
    //     $data['amphur'] = $result;
    //     $data['length'] = count($result);
    //     $data['debug'] = $this->db->last_query();

    //     $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    // }

    // public function tambon_get(){
    //     $amphur = $this->get('AmphurID');

    //     $result = $this->OpenClass_model->getTambon($amphur);

    //     $data['tambon'] = $result;
    //     $data['length'] = count($result);
    //     $data['debug'] = $this->db->last_query();

    //     $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    // }

    public function getDetailOpenClass_post(){
        $input = $this->post();
        
        $result = $this->OpenClass_model->getDetailByClassID($input);
        
        if($result){
            $result['PlaceProvince'] = $result['ProvinceID'];
            $result['PlaceAmphur'] = $result['AmphurID'];
            $result['PlaceTambon'] = $result['TambonID'];
    
            unset($result['ProvinceID']);
            unset($result['Amphur']);
            unset($result['TambonID']);
    
            $result['CourseStructure'] = $this->CourseStructure_model->getDataByClassID($input['ClassID']);
            $result['ClassDetail'] = $this->ClassDetail_model->getDataByClassID($input['ClassID']);
            $result['LearningMaterial'] = $this->LearningMaterial_model->getDataByClassID($input['ClassID']);
            $result['Evaluate'] = $this->Evaluate_model->getDataByClassID($input['ClassID']);
            $result['CriteriaComplete'] = $this->CriteriaComplete_model->getDataByClassID($input['ClassID']);
        }

        $data['data'] = $result;
        $data['debug'] = $this->db->last_query(); 

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function uploadImage($file){
        // echo $file['name']; die();
        $target_dir  = "assets/img/PlaceImage/";
		
		$response = array( 
			'status' => 0, 
			'message' => 'อัพโหลดไฟล์รูปภาพไม่สำเร็จ กรุณาลองใหม่อีกครั้ง' 
		);

		$images = $file["tmp_name"];
        $img_name = $file["name"];
        $tmp = explode('.', basename($img_name));
        $file_name = md5($tmp[0]).'.'.$tmp[1];
        $exp = $tmp[1];
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'bmp'); 
        
        try{
            $target_file = $target_dir . $file_name;
            if (file_exists($target_file)) {
                $response['message'] = 'ขออภัย ไฟล์รูปนี้มีอยู่ในระบบแล้ว';
                $response['status'] = 2;
                
                return $response;
            }
            if(!in_array($exp, $allowTypes)){ 
                $response['message'] = 'ไฟล์ที่อัพโหลดควรเป็นไฟล์รูปภาพ (JPG, JPEG, PNG, GIF, BMP)'; 
                $response['status'] = 3;
                
                return $response;
            }

            copy($images, $target_file);
            $width = 1024;
            $size = GetimageSize($images);
            $height = round($width*$size[1]/$size[0]);

            switch ($exp) {
                case 'jpg':
                case 'jpeg':
                    $images_orig = ImageCreateFromJPEG($images);
                    $photoX = ImagesX($images_orig);
                    $photoY = ImagesY($images_orig);
                    $images_fin = ImageCreateTrueColor($width, $height);
                    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                    ImageJPEG($images_fin, $target_file);
                    break;
                case 'png':
                    $images_orig = ImageCreateFromPNG($images);
                    $photoX = ImagesX($images_orig);
                    $photoY = ImagesY($images_orig);
                    $images_fin = ImageCreateTrueColor($width, $height);
                    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                    ImagePNG($images_fin, $target_file);
                    break;
                case 'gif':
                    $images_orig = ImageCreateFromGIF($images);
                    $photoX = ImagesX($images_orig);
                    $photoY = ImagesY($images_orig);
                    $images_fin = ImageCreateTrueColor($width, $height);
                    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                    ImageGIF($images_fin, $target_file);
                    break;
                case 'bmp':
                    $images_orig = ImageCreateFromBMP($images);
                    $photoX = ImagesX($images_orig);
                    $photoY = ImagesY($images_orig);
                    $images_fin = ImageCreateTrueColor($width, $height);
                    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                    ImageBMP($images_fin, $target_file);
                    break;
            }
            
            ImageDestroy($images_orig);
            ImageDestroy($images_fin);

            $response['message'] = 'อัพโหลดไฟล์รูปภาพสำเร็จ'; 
            $response['status'] = 1;
            $response['file_name'] = $file_name;

            return $response;
        }catch(Exception $ex){
            return $response;
        }
    }

    public function getNFETambon_get(){

        $criteria = array();
        $criteria['Amphur'] = $this->config->item('NFE_AmphurID');

        $result = $this->Organization_model->getDataAll($criteria);
        
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $this->db->last_query();

        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getGroupCode($NFETambonID){
        $listClass = $this->OpenClass_model->countClass($NFETambonID);
        $OrganizationCode = '';
        $strCount = '';
        if(count($listClass) > 1){
            $OrganizationCode = $listClass[0]['OrganizationCode'];
        }else{
            $Organization = $this->Organization_model->getOrganizationCode($NFETambonID);
            $OrganizationCode = $Organization['OrganizationCode'];
            
        }

        $numStr = count(strval(count($listClass)));
        $strCount = strval(count($listClass) + 1);
        $strZero = '';
        if($numStr < 3){
            for($i = 0; $i < 3 - $numStr; $i++){
                $strZero .= '0';
            }
        }
        $strCount = $strZero.$strCount;
        $strGroupCode = $OrganizationCode.date('Y').$strCount;
        
        return $strGroupCode;
    }
}