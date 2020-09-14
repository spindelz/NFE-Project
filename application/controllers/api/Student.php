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
        $UserType = 5;
        if(empty($result)){
            $db = $this->load->database('nfe2', TRUE);
            $result = $this->Student_model->getDataByTeach($criteria, $db);
            $UserType = 6;
            if(empty($result)){
                $db = $this->load->database('nfe3', TRUE);
                $result = $this->Student_model->getDataByTeach($criteria, $db);
                $UserType = 7;
            }
        }
        foreach ($result as $key => &$value) {
            $value['UserType'] = $UserType;
        }
        $data['data'] = $result;
        $data['length'] = count($result);
        $data['debug'] = $db->last_query();
 
        $this->response(empty($data) ? '' : $data, parent::HTTP_OK);
    }

    public function getSemestry_get(){
        $criteria = array();
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

    public function saveStudentImage_post(){
        $csrf_token_name = $this->config->item('csrf_token_name');

		$input = $this->post();

		$data = $this->security->xss_clean($input);
		
		$target_dir  = "assets/img/StudentImage/";
		
		$uploadOk = false;
		
		$response = array( 
			'status' => 0, 
			'message' => 'อัพโหลดไฟล์รูปภาพไม่สำเร็จ กรุณาลองใหม่อีกครั้ง' 
		);

		if(!empty($_FILES["StudentImage"]["name"])){ 
			$images = $_FILES["StudentImage"]["tmp_name"];
			$img_name = $_FILES["StudentImage"]["name"];
			$tmp = explode('.', basename($img_name));
			$file_name = md5($tmp[0]).'.'.$tmp[1];
			$exp = $tmp[1];
			$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'bmp'); 
			
			try{
				$target_file = $target_dir . $file_name;
				if (file_exists($target_file)) {
					$response['message'] = 'ขออภัย ไฟล์รูปนี้มีอยู่ในระบบแล้ว';
					$response['status'] = 2;
					$this->response($response, parent::HTTP_BAD_REQUEST);
					return false;
				}
				if(!in_array($exp, $allowTypes)){ 
					$response['message'] = 'ไฟล์ที่อัพโหลดควรเป็นไฟล์รูปภาพ (JPG, JPEG, PNG, GIF, BMP)'; 
					$response['status'] = 3;
					$this->response($response, parent::HTTP_BAD_REQUEST);
					return false;
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
				$uploadOk = true;
			}catch(Exception $ex){
				$this->response($response, parent::HTTP_BAD_REQUEST);
				return false;
			}

			if($uploadOk){
				$checkHasImage = $this->Student_model->getStudentImage($data['StudentCode']);
				$user_logined = $this->session->userdata('user_logined');
				if(!$checkHasImage){
					$entity = array(
						'StudentCode' => $data['StudentCode'], 
						'ImageName' => $file_name,
						'ImageRotate' => $data['ImageRotate'],
						'isActive' => 1, 
						'CreatedDate' => date('Y-m-d h:i:s'),
						'CreatedBy' => $user_logined['UserID'],
						'UpdatedDate' => date('Y-m-d h:i:s'),
						'UpdatedBy' => $user_logined['UserID'],
					);
					$id = $this->Student_model->saveStudentImage($entity);
				}
				$this->response($response, parent::HTTP_OK);
			}
		}
	}
	
	public function updateStudentImage_post(){
        $csrf_token_name = $this->config->item('csrf_token_name');

		$input = $this->post();
		
		$data = $this->security->xss_clean($input);
		
		$target_dir = "assets/img/StudentImage/";
		
		$uploadOk = true;

		if(!empty($_FILES["StudentImage"]["name"])){ 
			$images = $_FILES["StudentImage"]["tmp_name"];
			$img_name = $_FILES["StudentImage"]["name"];
			$tmp = explode('.', basename($img_name));
			$file_name = md5($tmp[0]).'.'.$tmp[1];
			$exp = $tmp[1];
			$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'bmp'); 
			
			try{
				$target_file = $target_dir . $file_name;
				if (file_exists($target_file)) {
					$response['message'] = 'ขออภัย ไฟล์รูปนี้มีอยู่ในระบบแล้ว';
					$response['status'] = 2;
					$this->response($response, parent::HTTP_BAD_REQUEST);
					return false;
				}
				if(!in_array($exp, $allowTypes)){ 
					$response['message'] = 'ไฟล์ที่อัพโหลดควรเป็นไฟล์รูปภาพ (JPG, JPEG, PNG, GIF, BMP)'; 
					$response['status'] = 3;
					$this->response($response, parent::HTTP_BAD_REQUEST);
					return false;
				}

				if(file_exists($target_dir.$data['oldImage'])){
					rename($target_dir.$data['oldImage'], $target_dir.'old_'.$data['oldImage']);
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
				$uploadOk = true;
			}catch(Exception $ex){
				$response = array( 
					'status' => 0, 
					'message' => 'อัพโหลดไฟล์รูปภาพไม่สำเร็จ กรุณาลองใหม่อีกครั้ง' 
				);
				$this->response($response, parent::HTTP_BAD_REQUEST);
				return false;
			}
			
		}

		if($uploadOk){
			$user_logined = $this->session->userdata('user_logined');
			$entity = array(
				'ImageRotate' => $data['ImageRotate'],
				'UpdatedDate' => date('Y-m-d h:i:s'),
				'UpdatedBy' => $user_logined['UserID'],
			);
			$result = $this->Student_model->updateStudentImage($entity, array('StudentCode' => $data['StudentCode']));
			if($result){
				$this->response($response, parent::HTTP_OK);
			}else{
				$response = array( 
					'status' => 4, 
					'message' => 'แก้ไขไฟล์รูปภาพไม่สำเร็จ' 
				);
				$this->response($response, parent::HTTP_OK);
			}
		}
    }
}